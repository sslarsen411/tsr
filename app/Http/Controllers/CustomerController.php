<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class CustomerController extends Controller{
    public function initialize(Request $request){    
        if(getCustomerByEmail($request, session('location.users_id'), $request->email)){ 
            return redirect('/rate');
        }else{
            session()->put('email', $request->email);
            Alert::html('Well, this is embarrassing!', '<h3 class="text-xl text-balance mb-5">' . session('location.company') . ' didn&apos;t tell us about you!</h3> 
                 <p class="text-balance">Please sign in with your name and email or with Google.</p>', 'warning')->showConfirmButton('OK', '#3085d6');
            return redirect('/register')->with('email', $request->email);
        }
    }
    public function logout(Request $request){
        $request->session()->flush();
        $request->session()->regenerateToken();
        Alert::info('Logged Out', 'You are now logged out');
        return redirect('/home');
    }
}
