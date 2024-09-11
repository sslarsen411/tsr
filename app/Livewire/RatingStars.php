<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class RatingStars extends Component{

    public $rating = 0;
    public function submitForm(){    
        $newReview  = Review::create([
            'customer_id' => session('cust.id'),
            'location_id' => session('locID'),
            'rate' => $this->rating,
            'status' => 'Started'
        ]);
        session()->put('rate', $this->rating);
        session()->put('reviewID', $newReview->id);
        if($this->rating < session('location.min_rate')){            
           alert()->question('It looks like you have concerns', 'Please let us know how we can improve your experience')->showDenyButton=false;
            return redirect('/care');
        }
        return redirect('/instr');       
    }
       public function render()    {
        return view('livewire.rating-stars');
    }
}
