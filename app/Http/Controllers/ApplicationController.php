<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ApplicationController extends Controller
{

    function add_register(Request $rq)
    {

        $rq->validate([
            'full_name' => 'required|max:60', 
            'email' => 'required|max:60|unique:registrations,email', 
            'phone' => 'required|numeric|unique:registrations,phone', 
            'course' => 'required|max:10|numeric',
            'marital_status' => 'required|max:50',
            'address' => 'required|max:150', 
            'city' => 'required|max:50', 
            'facebook' => 'max:70', 
            'skype' => 'max:50', 
        ]);

        $secret_code =  rand(10, 99).rand(10,99).rand(10,99);

        //step 2, sendfunction//
        $to = $rq->phone;
        $token = "923b28d4f54d07218070ac79f44611e8";
        $message = "Hello " . $rq->full_name.",,\n" . "your verification code: ". $secret_code . "\nBest regards,\nhttp://www.titan71.com";
        
        $url = "http://api.greenweb.com.bd/api.php";
    
        $data= array(
        'to'=>"$to",
        'message'=>"$message",
        'token'=>"$token"
        ); // Add parameters in key value
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
        $smsresult = curl_exec($ch);
        
        //sendsms end//


        $data = new \App\Registration();
        $data->full_name = $rq->full_name;
        $data->email = $rq->email;
        $data->phone = $rq->phone;
        $data->course = $rq->course;
        $data->marital_status = $rq->marital_status;
        $data->address = $rq->address;
        $data->city = $rq->city;
        $data->facebook = $rq->facebook;
        $data->skype = $rq->skype;
        $data->secret_code = $secret_code;

        $data->save();

        Session::flash('success', 'আমরা আপনার ফোনে একটি ভেরিফিকেশন কোড পাঠিয়েছি। অনুগ্রহ করে কোডটি এখানে সাবমিট করুন।');

        return Redirect::route('verify.registration',  $rq->phone);

        // dd($secret_code );
        
    }

    function verify_application($phone)
    {
        
        $app =  \App\Registration::where('phone', $phone)
                                   ->first();
        if ( $app) 
        {            
            $data['phone'] = $phone;
            return view('verify',$data);
        }
        else
        {
            abort('404');
        }

    }

    function verify_register(Request $rq)
    {
        // dd($rq->app_id);

        $rq->validate([
            'secret_code' => 'required'
        ]);

        $app =  \App\Registration::where('phone', $rq->phone)
                                   ->where('secret_code', $rq->secret_code)
                                   ->first();
   
        if($app &&  $app->is_verified != 1)
        {
            $data = \App\Registration::where('phone',$rq->phone)->first();
            $data->is_verified = true;
            $data->secret_code = null;
            $data->save();

            return redirect()->route('success.register', $rq->phone);
        }   
        else
        {
            Session::flash('error', 'দুঃখিত!<br> আপনি ভুল ভেরিফিকেশন কোড সাবমিট করেছেন।');
            return redirect()->back();
        }

    }

    function successfully_registered($phone)
    {

        $app =  \App\Registration::where('phone', $phone)
                                   ->first();
        if ($app) 
        {            
            return view('successfull');
        }
        else
        {
            abort('404');
        }

    }

}
