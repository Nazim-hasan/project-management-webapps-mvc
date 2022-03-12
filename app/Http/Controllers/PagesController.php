<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    //
    public function index(){
        return view('Dashboard.Developers.Index');
    }
    public function login(){
        return view('Shared.Login.Login');
    }
    public function registration(){
        return view('Shared.Registration.Register');
    }
    public function myProfile(){
        return view('Dashboard.Developers.MyProfile');
    }
    public function projects(){
        return view('Dashboard.Developers.Projects');
    }
    public function projectDetails(Request $request){

        $project = Project::where('ProjectId', $request->id)->first();
        return view('Dashboard.Developers.ProjectDetails')->with('projectDetails', $project);
    }
    public function contact(){
        return view('Dashboard.Developers.Contact');
    }
    public function calender(){
        return view('Dashboard.Developers.Calender');
    }
    public function chat(){
        return view('Dashboard.Developers.Chat');
    }
    public function addContribution(){
        return view('Dashboard.Developers.AddContribute');
    }
    public function issueBoard(){
        return view('Dashboard.Developers.IssuesBoard');
    }
    public function list(){
        return view('Dashboard.Developers.List');
    }
    // public function chat(){
    //     return view('Dashboard.Developers.Chatting');
    // }
}
