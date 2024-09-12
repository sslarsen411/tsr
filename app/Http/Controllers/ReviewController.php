<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Customer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ReviewController extends Controller{
 
   
    public function startQuestions(){
        $firstQ = Question::find(1);
        $firstQ->question = str_replace('RATE', Cache::get('review')->rate->rate, $firstQ->question);       
        return view('pages.question', ['question' => $firstQ]);
    }   

    public function handleQuestion(Request $request){
        $review =  Cache::get('review');        
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
}
