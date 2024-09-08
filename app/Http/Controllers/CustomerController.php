<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    
    public function logout(Request $request){
        $request->session()->flush();
        $request->session()->regenerateToken();
        return redirect('/home')->with('alert-info', 'You are now logged out.'); 
    }
}
