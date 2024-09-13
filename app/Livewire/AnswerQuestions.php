<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use RealRashid\SweetAlert\Facades\Alert;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AnswerQuestions extends Component{
    use LivewireAlert;
    public $question;
    public $answer;
    public $dex = 0;

    public function mount(){
        $questions = Cache::get('questions');       
        $this->question=($questions[$this->dex]);
        $this->question->question = str_replace('RATE', session('rate'), $this->question->question);          
    }
    public function submitForm(){
        $questions = Cache::get('questions');
        $review =  Review::find( session('reviewID')); 
        $currAns = updateAnswers($review->answers, $this->dex, strip_tags($this->answer) ); 
        $review->update(['answers' => $currAns]);
        
       $this->dex++;
       if(($this->dex) <= 2):
        $this->question =  $this->question=($questions[$this->dex]);      
      //  $this->answer = '';  
    else:  
        // $this->alert('success', 'Finished! good job.', [
        //     'position' => 'top'
        // ]);  
        Alert::success('Congratulations! You&apos;re almost done', 'Now our AI will generate a review for you to post on Google');      
        return redirect('doReview');
    endif;

    }

    public function render()
    {
        return view('livewire.answer-questions');
    }
}
