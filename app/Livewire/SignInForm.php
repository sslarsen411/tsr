<?php

namespace App\Livewire;

use App\Models\Visitor;
use Livewire\Component;
use App\Models\Customer;

class SignInForm extends Component
{
    public $first_name;
    public $last_name;
    public $email;

    protected $rules = [
        'first_name' => 'required|alpha|max:45',
        'last_name' => 'required|alpha|max:45',
        'email' => 'required|email',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm(){
    
   // ray(session()->all());
    $newCustomer = Customer::create([
        'users_id' => session('location.users_id'),
        'location_id' => session('locID'),
        'first_name' => $this->first_name,
        'last_name' => $this->last_name ,
        'email' => $this->email ,
        'state' => 'Visited',
        'how_added' => 'twoshakes',
    ]);  
        session()->put('cust', $newCustomer); 
        Visitor::where('id', session('visitorID'))
            ->update(['customer_id' => $newCustomer->id]);
        return redirect('/rate');            
    }
    public function render()
    {
        return view('livewire.sign-in-form');
    }
}