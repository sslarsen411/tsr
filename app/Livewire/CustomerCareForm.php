<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class CustomerCareForm extends Component{
    use LivewireAlert;
    public $concerns;
    public $ckCallMe = false;
    public $phone;
    public $review;
    protected $rules = [
        'concerns' => 'required|min:6',
        'phone' => 'phone:US|min:9',
    ];

    protected $messages = [
        'concerns.required' => 'Please type something',
        'phone.phone' => 'Enter a valid phone number',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function submitForm(){    
        $this->validate();
        if($this->ckCallMe){
            if($this->phone === NULL){            
              $this->alert('error', 'No phone number entered', ['position' => 'top', ]);
            return view('livewire.customer-care-form');
            }
        }
        $this->review =  Review::find( session('reviewID')); 
        $this->review->update(['review' => $this->concerns, 'status' => 'Negative']); 
        // Send email to co_email
        Alert::html('We hear you', '<h3 class="text-xl text-balance mb-5"> '. session('location.company'). ' has been notified about your concerns</h3> 
                 <p class="text-balance">They will contact you shortly. A conformation email has been sent to ' . session('cust.email') . '.</p>', 'success')
                 ->showConfirmButton('OK', '#3085d6');
        return redirect('/home');
     }
    public function render(){
        return view('livewire.customer-care-form');
    }
}
