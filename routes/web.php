<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

// for chatting
use App\Events\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[UserController::class,'login'])->name('login');
Route::post('/',[UserController::class,'loginSubmit'])->name('login');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

// Middleware Setup 
Route::get('/dashboard',[PagesController::class,'index'])->name('dashboard')->middleware('ValidDeveloper');
Route::get('/register',[PagesController::class,'registration'])->name('registration')->middleware('ValidDeveloper');
Route::get('/myProfile',[PagesController::class,'myProfile'])->name('myProfile')->middleware('ValidDeveloper');
Route::get('/projects',[PagesController::class,'projects'])->name('projects')->middleware('ValidDeveloper');
Route::get('/projectDetails',[PagesController::class,'projectDetails'])->name('projectDetails')->middleware('ValidDeveloper');
Route::get('/contact',[PagesController::class,'contact'])->name('contact')->middleware('ValidDeveloper');
Route::get('/calender',[PagesController::class,'calender'])->name('calender')->middleware('ValidDeveloper');
Route::get('/chat',[PagesController::class,'chat'])->name('chat')->middleware('ValidDeveloper');
Route::get('/addContribution',[PagesController::class,'addContribution'])->name('addContribution')->middleware('ValidDeveloper');
Route::get('/issueBoard',[PagesController::class,'issueBoard'])->name('issueBoard')->middleware('ValidDeveloper');
Route::get('/list',[ProjectController::class,'projectView'])->name('list')->middleware('ValidDeveloper');


Route::get('/project/tasks/{id}',[ProjectController::class,'projectTasks'])->name('project.tasks')->middleware('ValidDeveloper');
Route::get('/tasks',[TaskController::class,'taskProject'])->name('project.tasks')->middleware('ValidDeveloper');



// Route::get('/chat',[PagesController::class,'chat'])->name('chat');


// Route::get('/chat', function(){
//     return view('../Dashboard.Developers.Chatting');
// });
Route::post('/send-message',function (Request $request){
    event(
        new Message(
            $request->input('username'),
            $request->input('message')
        )
    );
    // echo $request;
    return ["success"=>true];
});

// Route::get('/getMessage', function () {
//     $payLoad = json_decode(request()->get('payload'));

//     dd($payLoad);
// });