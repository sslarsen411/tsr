<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EditAnswersForm extends Component
{
    use LivewireAlert;
    public $answers = [];
    public $review;    
    public $rev;

    public function mount(){        
        $this->review =  Review::find( session('reviewID')); 
        $this->answers = unserialize($this->review->answers);
    }
  
    public function submitForm(){   
        // VALIDATE ANSWER     
        $this->review->update(['answers' => serialize(array_map( 'strip_tags', $this->answers ))]);
        $this->alert('success', 'Your answer was successfully updated', [
            'position' => 'center'
        ]);
    }
    public function render(){     
        return view('livewire.edit-answers-form');
    }
}
