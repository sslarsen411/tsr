<?php

namespace App\Livewire;

use Livewire\Component;

class RatingStars extends Component{

    public $rating = 0;
       public function render()    {
        ray($this->rating);

        return view('livewire.rating-stars');
    }
}
