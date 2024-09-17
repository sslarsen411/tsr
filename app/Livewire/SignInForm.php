<?php

namespace App\Livewire;

use App\Models\Visitor;
use Livewire\Component;
use App\Models\Customer;
use App\Rules\Name;

class SignInForm extends Component{

    #[Validate] 
    public $first_name;
    public $last_name;
    public $email;
         
        protected function rules()
        {
            return [
                'first_name' => ['required', 'max:45', new Name],                
                'last_name' => ['required', 'max:45', new Name],
                'email' => 'required|email',
            ];
        }

    public function mount() {
        if (session('email')) {
	    $this->email = session('email');
        }
    }
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    public function submitForm(){
   //     ray($this);
        $validated = $this->validate();
       

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
        session()->forget('email'); 
        //ray(session()->all());
        Visitor::where('id', session('visitorID'))
            ->update(['customer_id' => $newCustomer->id]);
        return redirect('/rate');            
    }
    public function render(){
        return view('livewire.sign-in-form');
    }
}