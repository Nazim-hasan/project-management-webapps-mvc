<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;

use Laravel\Socialite\Facades\Socialite;

class authController extends Controller
{
    //
    public function githubRedirect(Request $response){
        return Socialite::driver('github')->redirect();
    }
    public function githubCallback(Request $response){

        $userData = Socialite::driver('github')->user();

        $user = User::where('email', $userData->email)->where('auth_type','github')->first();
        if($user){
            $response->session()->put('user', $user->userName);
            return redirect('/dashboard');
        }
        else{
            $uuid = Str::uuid()->toString();
            $user = new user();
            $user->userName = $userData->name;
            $user->email = $userData->email;
            $user->password = Hash::make($uuid.now());
            $user->auth_type = 'github';
            $user->save();
            $response->session()->put('user', $user->userName);
            return redirect('/dashboard');
        }
    }
        
        public function googleRedirect(Request $response){
            return Socialite::driver('google')->redirect();
        }
        public function googleCallback(Request $response){
            $userData = Socialite::driver('google')->user();

            $user = User::where('email', $userData->email)->where('auth_type','google')->first();
            if($user){
                $response->session()->put('user', $user->userName);
                return redirect('/dashboard');
            }
            else{
                $uuid = Str::uuid()->toString();
                $user = new user();
                $user->userName = $userData->name;
                $user->email = $userData->email;
                $user->password = Hash::make($uuid.now());
                $user->auth_type = 'google';
                $user->save();
                $response->session()->put('user', $user->userName);
                return redirect('/dashboard');
            }

        
        
    }
}
