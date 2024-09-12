<?php

use App\Models\Visitor;
use App\Models\Customer;
use Illuminate\Http\Request;
//https://rajivverma.me/blog/tech/global-helper-function-laravel-8/

/**
 * Update the answer array
 * Input: the serialized answer array, the index to be updated, the new answer
 * Returns a serialized updated array
 */
function updateAnswers(string| null $inAnsStr, string|int $dex, string $newAns){
    if($inAnsStr)
        $ansArr =  unserialize($inAnsStr);
    else
        $ansArr = [];
    $ansArr[$dex] =  $newAns;  
    return serialize($ansArr);
}
/**
 * Check if a client has this email in the database
 * @param Illuminate\Http\Request $request
 * @param mixed $inClient
 * @param mixed $inEmail
 * @return bool
 */
function getCustomerByEmail(Request $request, $inClient = '', $inEmail = ''){     
    if(  $cust = Customer::where('users_id', $inClient)->where('email', $inEmail )->first()){                
        $request->session()->put('cust', $cust); 
        $cust->update(['status' => 'Visited']);
        Visitor::where('id', session('visitorID'))
        ->update(['customer_id' => $cust->id]);        
        return TRUE;
    }
   return FALSE;
}
/**
 * Convert a phone input to E164
 * @param string $inPh
 * @param string|int $inCC DEFAULT 1
 * @return string
 */
function toE164(string $inPh, string|int $inCC = '1'){
  return "+$inCC" . preg_replace('/\D+/', '', $inPh);
}
/**
 * Format an E164 phone number to (NNN) NNN-NNNN
 * @param string|int $inNumber
 * @return string
 */
function fromE164(string|int $inNumber){
  preg_match('/\d?(\d{3})(\d{3})(\d{4})/', $inNumber, $matches);
 // dump($matches);
  return '(' . $matches[1] . ') ' . $matches[2] . '-' . $matches[3];
}

function tracker(){
    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $page = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}"; 
    $page .= iif(!empty($_SERVER['QUERY_STRING']), "?{$_SERVER['QUERY_STRING']}", "");
    $referrer = $_SERVER['HTTP_REFERER'];
    //$datetime = mktime();
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    $remotehost = @getHostByAddr($ipaddress);
}