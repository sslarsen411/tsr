<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
class CustomerController extends Controller{
    public function initialize(Request $request){    
        if(getCustomerByEmail($request, session('location.users_id'), $request->email)){ 
            return redirect('/rate');
        }else{
            Alert::html('Well, this is embarrassing!', '<h3 class="text-xl text-balance mb-5">' . session('location.company') . ' forgot to tell us about you!</h3> 
                 <p class="text-balance">Please sign in with your name and email or with Google.</p>', 'warning')->showConfirmButton('OK', '#3085d6');;
            return redirect('/register')->with('email', $request->email);
        }
    }
    public function register(Request $request){      
        $rules = [
            'email' => 'required|email',
            'first_name' => 'required|string|max:45',
            'last_name' => 'required|string|max:45',
            'users_id' => 'required',
            'location_id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->first());
           return redirect('register')->withErrors($validator)->withInput();
        }else{
            $newCustomer = Customer::create($validator->validated());  
            $newCustomer->update(['state' => 'Visited', 'how_added' => 'twoshakes']);          
            $request->session()->put('cust', $newCustomer); 
            Visitor::where('id', session('visitorID'))
                ->update(['customer_id' => $newCustomer->id]);
            return redirect('/rate');            
        }          
    }    
    public function logout(Request $request){
        $request->session()->flush();
        $request->session()->regenerateToken();
        Alert::info('Logged Out', 'You are now logged out');
        return redirect('/home');
    }
}
