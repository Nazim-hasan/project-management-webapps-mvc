<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use App\Models\Task;

class ProjectController extends Controller
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
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
    public function projects(){
        $projects = Project::all();
        return view('Dashboard.Developers.Projects')->with('projects', $projects);
    }

    
    public function projectView(){
        $projects = Comment::where('projectId',8)->get();
        return view('Dashboard.Developers.List')->with('projects', $projects);
    }
    public function projectTasks(Request $request){
        $p = Project::where('ProjectId',$request->id)->get();
        return $p->assignedTasks();
    }
    public function commentSubmit(Request $request){
        $nameFromSession = Session()->get('user');
        $comment = new Comment();
        $comment->userName = $nameFromSession;
        $comment->comment = $request->comment;
        $comment->projectId  = $request->projectId;
        $comment->save();
        return redirect()->route('projects');
    }
}
