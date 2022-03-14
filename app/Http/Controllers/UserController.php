<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Http\Requests\StoreuserRequest;
use App\Http\Requests\UpdateuserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreuserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreuserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateuserRequest  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateuserRequest $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
    public function login(){
        return view('Shared.Login.Login');
    }
    public function loginSubmit(Request $request){
        
        $validate = $request->validate([
            'userId'=>'required',
            'password'=>'required|min:8|max:20'
        ],
        [
            'userId.required'=>'Please put your User ID.',
            'password.min'=>'Name must be greater than 8 characters'
        ]);

        $user = user::where('userId', $request->userId)
                      ->where('password', $request->password)
                      ->first();
        
        if($user){
             $request->session()->put('user', $user->userName);
            return redirect()->route('dashboard');
        }
        return back();
    }
    public function logout(){
        Session()->forget('user');
        return redirect()->route('login');
    }

}
