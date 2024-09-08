<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Mail\AccountNotActive;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    public function showCorrectPage(Request $request){
        $newVisitor  = Visitor::create([
            'IP' => $_SERVER['REMOTE_ADDR']
        ]);
        $request->session()->put('visitorID', $newVisitor->id);
        if( $request->has('loc') ) :      
            $request->session()->put('locID', $request->query('loc'));                  
            
            $location = Company::select('users.name', 'companies.users_id',  'company', 'co_email', 'co_phone', 'min_rate', 'status' )                
                ->join('users', 'companies.users_id', '=', 'users.id')
                ->join('locations', 'companies.id', '=', 'locations.company_id')
                ->where('locations.id', '=', $request->query('loc'))
                ->get();
           // ray($location);
            if($location[0]->status === 'active'){
                $request->session()->put('location', $location[0]); 
                if($request->has('em')){  
                    //if(getCustomerByEmail($request, $location[0]->client_id, base64_decode($request->query('em')))) {                  
                    if(getCustomerByEmail($request, $location[0]->users_id, $request->query('em'))) {                  
                       return redirect('/rate')->with('alert-info', 'Thank you for visiting ' . session('cust.first_name')); // Customer is in DB for this client
                    }else{ //Not in customer table for this client 
                        return redirect('/register')->with('email', $request->query('em'));
                       // return redirect('/register')->with('email', base64_decode($request->query('em')) );
                    }
                }
                 return redirect('start'); // NO email in URL
            }else{ // NOT ACTIVE, send email
                Mail::to($location[0]->co_email)
                    ->send(new AccountNotActive(['name'     =>  $location[0]->name,                                                                       
                                                 'company'  =>  $location[0]->company,
                                                 'status'   =>  $location[0]->status
                ]));
                return redirect('nogo')->with( ['company' => $location[0]->company]);
            }                
        else: // NO location in URL       
            return redirect('home');
        endif;
    }
}
