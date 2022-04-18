<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

use App\Models\Pendingusers;
class RegistationAPIController extends Controller
{
    //
    public function registration(Request $request){

        $user = new Pendingusers();
        $user->userId = $request->id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return $user;
    }
}
