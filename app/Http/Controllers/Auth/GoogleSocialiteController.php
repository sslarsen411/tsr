<?php
// https://fajarwz.com/blog/create-login-with-google-oauth-using-laravel-socialite/
namespace App\Http\Controllers\Auth;

use in;
use Exception;
use App\Models\Visitor;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class GoogleSocialiteController extends Controller{
    public function redirectToGoogle()    {
        return Socialite::driver('google')->redirect();
    }
    public function handleCallback(Request $request){
        try {
            // get user data from Google
            $user = Socialite::driver('google')->user();            
            // find user in the database where the social id is the same with the id provided by Google            
            if (!getCustomerByEmail($request, session('location.client_id'), $request->email)):  // Customer not in clients DB                                    
                $newUser = Customer::create([
                    'users_id' => session('location.users_id'),
                    'location_id' => session('locID'),
                    'oauth_provider' => 'google',
                    'oauth_uid' => $user['id'],
                    'first_name' => $user['given_name'],
                    'last_name' => $user['family_name'],
                    'email' => $user['email'],
                ]); 
                $newUser->update(['state' => 'Visited', 'how_added' => 'twoshakes']);            
                Visitor::where('id', session('visitorID'))
                    ->update(['customer_id' => $newUser->id]);
                $request->session()->put('cust', $newUser);                              
            endif;
            return redirect('/rate');
        }catch (Exception $e){
            dd($e->getMessage());
        }
    }
}