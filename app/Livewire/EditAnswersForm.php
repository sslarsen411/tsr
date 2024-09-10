<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;

class EditAnswersForm extends Component
{
    public $answers = [];
    public $reviewID;

    
    public $rev;
    public $review;

    public function submitForm(){
        $ans = $this->answers;
        //$clean = array_map(strip_tags($this->answers));
        $ans = array_map( 'strip_tags', $ans );
        // foreach($this->answers as $answer){
        //     $answer = strip_tags($answer);
        // }
        ray($ans);
       // $doody = serialize($this->answers);

      // $ans = Review::where('id', $this->reviewID)->pluck('answers');

      //  ray($ans);
    }
    public function render()
    {
       
        return view('livewire.edit-answers-form');
    }
}
