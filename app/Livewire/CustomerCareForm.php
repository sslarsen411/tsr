<?php

namespace App\Livewire;

use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class CustomerCareForm extends Component{
    use LivewireAlert;
    public $concerns;
    public $ckCallMe = false;
    public $phone;
    protected $rules = [
        'concerns' => 'required|min:6',
        'phone' => 'phone:US|min:9',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function submitForm(){
    
        if($this->ckCallMe){
            if($this->phone === NULL){
            
              $this->alert('error', 'No phone number entered', ['position' => 'top', ]);
            return view('livewire.customer-care-form');
            }
        }
        // UPDATE Review
        // Send email to co_email
        Alert::html('We hear you', '<h3 class="text-xl text-balance mb-5"> '. session('location.company'). ' has been notified about your concerns</h3> 
                 <p class="text-balance">They will contact you shortly. A conformation email has been sent to ' . session('cust.email') . '.</p>', 'success')
                 ->showConfirmButton('OK', '#3085d6');

        return redirect('/home');



     }
    public function render()
    {
        
    //    if($this->phone){
    //     //$phone = new PhoneNumber($this->phone, 'US');
    //    $phone = $this->phone->formatE164();
    //    }
      
       // $concerns = $this->concerns;
        return view('livewire.customer-care-form');
    }
}
