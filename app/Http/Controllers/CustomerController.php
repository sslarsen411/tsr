<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CustomerController extends Controller{
    public function initialize(Request $request){    
        if(getCustomerByEmail($request, session('location.users_id'), $request->email)){ 
            return redirect('/rate');
        }else{
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
        return redirect('/home')->with('alert-info', 'You are now logged out.'); 
    }
}
