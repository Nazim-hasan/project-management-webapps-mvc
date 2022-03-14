<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\Task;
use App\Models\Comment;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    //
    public function index(){
        $name = Session()->get('user');
        $tasks = Task::where('userName',$name )->get();
        $projects = Project::where('userName',$name )->get();
        return view('Dashboard.Developers.Index')->with(['tasks'=> $tasks, 'projects'=> $projects]);
    }
    public function login(){
        return view('Shared.Login.Login');
    }
    public function registration(){
        
        
        return view('Shared.Registration.Register');
    }
    public function registrationSubmit(Request $request){
        $validate = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'min:6|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword'=>'min:6',
            'terms'=>'required',
        ],
        [
            'name.required'=>'Please put your Full Name.',
            'email.required'=>'Please put your Email.',
            'password.min'=>'Password must be greater than 6 characters.',
            'confirmPassword.min'=>'Password and confirm password should be same',
            'terms.required'=>'Please accept the terms and conditions',

        ]);
        $user = new user();
        $user->userName = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('login');
        // return view('Dashboard.Developers.Login');
    }
    public function myProfile(){
        $name = Session()->get('user');
        $userInfo = user::where('userName',$name )->first();
        $comments = Comment::where('userName',$name)->orderBy('commentsId','DESC' )->get();
        return view('Dashboard.Developers.MyProfile')->with(['userInfo'=> $userInfo, 'comments'=> $comments]);
    }
    public function myProfileEditSubmit(Request $request){
        $name = Session()->get('user');
        $userInfo = user::where('userName',$name )->first();
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

        return redirect()->route('myProfile');

    }
    public function myTasks(){
        return view('Dashboard.Developers.Projects');
    }
    public function projectDetails(Request $request){
        $comments = Comment::where('projectId',$request->id)->get();
        $project = Project::where('ProjectId', $request->id)->first();
        return view('Dashboard.Developers.ProjectDetails')->with(['comments'=> $comments, 'project'=> $project]);
    }
    public function taskDetails(Request $request){
        $task = Task::where('id', $request->id)->first();
        return view('Dashboard.Developers.TaskDetails')->with(['task'=> $task]);
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
    public function addContribution(Request $request){
        $taskId = $request->id;
        return view('Dashboard.Developers.AddContribute')->with(['taskId'=> $taskId]);
    }
    public function addContributionSubmit(Request $request){

        $taskInfo = Task::where('id',$request->id)->first();
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('assets',$filename);
        $taskInfo->solution=$filename;
        $taskInfo->save();
        return view('Dashboard.Developers.Tasks');
    }
    public function downloadContent(Request $request,$file){

        return response()->download(public_path('assets/'.$file));
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
