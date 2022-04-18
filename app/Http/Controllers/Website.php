<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
// use App\Models\user;
use App\Models\Pendingusers;
use App\Models\user;
class Website extends Controller
{
    //
    public function website(Request $request){
        
        $data = ['name'=>"Nazim Hasan", 'data'=>'Hello Nazim'];
        
        $emailAddress = $request->email;
        $user['to'] = $emailAddress;
        Mail::send('mail',$data,function($messages) use ($user){
            $otp = rand(1000,9999);
            Session::put('otp', $otp);
            // $user = user::where('email','=',$emailAddress)->update(['otp' => $otp]);
            $messages->to($user['to']);
            $messages->subject('Your OTP is : '. $otp);
            // $messages->body('Your OTP is : '. $otp);
        });
        $OTPFromSession = Session::get('otp');
        $user = Pendingusers::where('email','=',$emailAddress)->update(['otp' => $OTPFromSession]);
        // return Session::get('otp');
    }
    public function verifyOTP(Request $request){
        $pendingUser = Pendingusers::where('otp', $request->otp)->first();
        // $pendingUser = Pendingusers::where('otp','=',$request->otp);
        // return $pendingUser;
        // print_r($pendingUser);
        $user = new user();
        $user->userId = $pendingUser->userId;
        $user->userName = $pendingUser->name;
        $user->password = $pendingUser->password;
        $user->email = $pendingUser->email;
        $user->otp = $pendingUser->otp;
        $user->save();
        return $user;
    }
}
