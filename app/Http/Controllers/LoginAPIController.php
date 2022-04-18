<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Token;
use Illuminate\Support\Str;
use DateTime;

class LoginAPIController extends Controller
{
    //
    public function  login(Request $req){
        
        $user = user::where('userId',$req->userId)->where('password',$req->password)->first();
        if($user){
            $api_token = Str::random(64);
            $token = new Token();
            $token->userid = $user->userId;
            $token->token = $api_token;
            $token->created_at = new DateTime();
            $token->save();
            return $token;
        }
        return "No user found";

    }
    public function getUserName(Request $req){
        $user = user::where('userId',$req->userId)->first();
        return $user->userName;
    }
    public function getUserInfo(Request $req){
        $user = user::where('userId',$req->userId)->first();
        return $user;
    }
    public function updateUserInfo(Request $request){
        $userInfo = user::where('userId',$request->userId )->first();
        $userInfo->userId =  $userInfo->userId;
        $userInfo->userName =  $request->userName;
        $userInfo->password =  $request->password;
        $userInfo->email =  $request->email;
        $userInfo->education =  $request->education;
        $userInfo->address =  $request->address;
        $userInfo->phone =  $request->phone;
        $userInfo->joinningDate =  $userInfo->joinningDate;
        $userInfo->skills =  $request->skills;
        $userInfo->photo =  $userInfo->photo;
        $userInfo->status =  $userInfo->status;
        $userInfo->teamId  =  $userInfo->teamId;
        $userInfo->status =  $userInfo->role;
        $userInfo->save();
        return $userInfo;
    }
    public function logout(Request $req){
        // echo $req->userId;
        $token = Token::where('token',$req->Token)->first();
        $token->expired_at = new DateTime();
        $token->save();
        
    }
}
