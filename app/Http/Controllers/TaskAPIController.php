<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskAPIController extends Controller
{
    //
    public function myTasks(){
        $tasks = Task::all();
        return $tasks;
    }
    public function taskDetails(Request $request){
        $task = Task::where('id',$request->id)->first();
        return $task;
    }
}
