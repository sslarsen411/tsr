<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Customer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ReviewController extends Controller{
/* Initialize a review */
public function create(Request $request)    {
        $newReview  = Review::create([
            'customer_id' => $request->customerID,
            'location_id' => $request->locID ,
            'rate' => $request->rate,
            'status' => 'Started'
        ]);
        $request->session()->put('rate', $request->rate);
        $request->session()->put('reviewID', $newReview->id);
        if($request->rate < session('location')->min_rate){
            return redirect('/care');
        }
        return redirect('/instr');
    }
   
    public function startQuestions(){
        $firstQ = Question::find(1);
        $firstQ->question = str_replace('RATE', session('rate'), $firstQ->question);       
        return view('pages.question', ['question' => $firstQ]);
    }   

    public function handleQuestion(Request $request){
        $review =  Review::find( session('reviewID'));        
    /* Add current answer to the answer array */
        $ans = updateAnswers($review->answers, $request->question_no, strip_tags($request->answer) ); 
        $review->update(['answers' => $ans]);    
    /* Get the next question */         
        if(($request->question_no + 1) <= 8):
            $qArr = Cache::remember('questions', 600, function () {          
                return Question::all();
             });            
             $currentQuestion = $qArr[$request->question_no];                  
            return view('pages.question', ['question' => $currentQuestion]);        
        else:           
            return view('pages.doReview', ['review'=> $review]);
        endif;
    }  

    public function goToEdit(Request $request){
        $question = Question::find($request->key);
        return view('pages.editAnswer', ['answer'=> $request->all(), 'question' => $question->title]);
    }

    public function composeReview(){ 
        $review = Cache::get('review', function () {
            return Review::find( session('reviewID'));
        });       
        // send $review->answers to ChatGPT, return string to $composedReview
        $composedReview = 'blah, blah, blah';
        //Customer::where('id',  session('cust.id'))->update(['status' => 'Completed']);
        $review->update(['review' =>  $composedReview, 'status' => 'Completed']);
        return view('pages.finish',['review' => $composedReview]);
    }
    public function doCare(Request $request){
// LOOKUP phone
        $ph = NULL;
        if($request->has('ckCallMe')){
            if($request->phone === NULL){
                $request->session()->put('ckbox','checked');
                $request->session()->put('concerns', $request->concerns);
                return back()->with('error', session('cust.first_name') . ', enter your phone number or uncheck the box.');  
            }
            $ph = toE164( $request->phone );   
            Customer::find(session('cust.id'))->update(['phone' => $ph]);
        }else{
            $request->session()->forget('ckbox');
            $request->session()->forget('concerns');
        }
        $review = strip_tags($request->concerns);       
      //  Review::find( session('reviewID'))->update(['review' =>  $review, ]);
    /* TODO send emails */

        return back()->with('info', session('cust.first_name') . ', thank you for your feedback.');  
    }   
}
