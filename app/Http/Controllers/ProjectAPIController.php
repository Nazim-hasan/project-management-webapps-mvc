<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectAPIController extends Controller
{
    //
    public function allProjects(){
        $projects = Project::all();
        return $projects;
    }
    public function AddNewProjects(Request $request){
        $project = new Project();
        $project->projectName = $request->projectName;
        $project->projectDetails = $request->projectDetails;
        $project->budget = $request->budget;
        $project->amountSpent = $request->amountSpent;
        $project->assignDate = $request->assignDate;
        $project->deadline = $request->deadline;
        $project->status = $request->status;
        $project->taskId  = $request->taskId ;
        $project->commentId = $request->commentId;
        $project->userName = $request->userName;
        $project->save();
        
        return $project;

    }
}
