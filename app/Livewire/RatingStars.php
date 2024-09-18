<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use RealRashid\SweetAlert\Facades\Alert;

class RatingStars extends Component{

    public $rating=0;    
    public $isDisabled = true;
    protected function rules() {
      return [
          'rating' => 'required',
      ];
  }

  public function updated($propertyName)
  {
      $this->validateOnly($propertyName);
      $this->rating > 0 ?  $this->isDisabled = false :  $this->isDisabled = true;
  } 

    public function submitForm(){
      $this->validate();
        $newReview  = Review::create([
            'customer_id' => session('cust.id'),
            'location_id' => session('locID'),
            'rate' => $this->rating,
            'status' => 'Started'
        ]);
        session()->put('rate', $this->rating);
        session()->put('reviewID', $newReview->id);

        if($this->rating < session('location.min_rate')){            
           alert()->info('What happened?', 'Tell us what happened and how we can improve your experience');
            return redirect('/care');
        }
        return redirect('/instr');       
    }
       public function render()    {
        return view('livewire.rating-stars');
    }
}
