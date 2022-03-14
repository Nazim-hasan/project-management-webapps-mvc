<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\authController;
use App\Http\Controllers\DashboardController;
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

Route::get('/',[UserController::class,'login'])->name('login');
Route::post('/',[UserController::class,'loginSubmit'])->name('login');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

// Middleware Setup 
Route::get('/dashboard',[PagesController::class,'index'])->name('dashboard')->middleware('ValidDeveloper');
Route::get('/register',[PagesController::class,'registration'])->name('registration');
Route::post('/register',[PagesController::class,'registrationSubmit'])->name('registration');
Route::get('/myProfile',[PagesController::class,'myProfile'])->name('myProfile')->middleware('ValidDeveloper');
Route::post('/myProfile',[PagesController::class,'myProfileEditSubmit'])->name('myProfile')->middleware('ValidDeveloper');
Route::post('/commentSubmit',[ProjectController::class,'commentSubmit'])->name('commentSubmit')->middleware('ValidDeveloper');

Route::get('/projects',[ProjectController::class,'projects'])->name('projects')->middleware('ValidDeveloper');
Route::get('/myTasks',[TaskController::class,'myTasks'])->name('myTasks')->middleware('ValidDeveloper');
Route::get('/projectDetails/{id}',[PagesController::class,'projectDetails'])->name('projectDetails')->middleware('ValidDeveloper');
Route::get('/contact',[PagesController::class,'contact'])->name('contact')->middleware('ValidDeveloper');
Route::get('/calender',[PagesController::class,'calender'])->name('calender')->middleware('ValidDeveloper');
Route::get('/chat',[PagesController::class,'chat'])->name('chat')->middleware('ValidDeveloper');
Route::get('/addContribution/{id}',[PagesController::class,'addContribution'])->name('addContribution')->middleware('ValidDeveloper');
Route::post('/addContribution',[PagesController::class,'addContributionSubmit'])->name('addContribution')->middleware('ValidDeveloper');
Route::get('downloadContent/{file}',[PagesController::class,'downloadContent'])->name('downloadContent')->middleware('ValidDeveloper');
Route::get('/issueBoard',[PagesController::class,'issueBoard'])->name('issueBoard')->middleware('ValidDeveloper');
//dashboard
// Route::get('/issueBoard', [DashboardController::class, 'dashboard'])->name('dashboardIssue');
// Route::post('/add/todo', [DashboardController::class, 'insertTodoDash'])->name('add/todo');
// //in-progress
// Route::post('/add/in-progress', [DashboardController::class, 'insertInProgressDash'])->name('add/in-progress');
// //issue
// Route::post('/add/issues-list', [DashboardController::class, 'insertIssueDash'])->name('add/issues-list');
// //done
// Route::post('/add/done', [DashboardController::class, 'insertDoneDash'])->name('add/done');
Route::get('/list',[ProjectController::class,'projectView'])->name('list')->middleware('ValidDeveloper');


// Route::get('/project/tasks/{id}',[ProjectController::class,'projectTasks'])->name('project.tasks')->middleware('ValidDeveloper');
// Route::get('/tasks',[TaskController::class,'taskProject'])->name('project.tasks')->middleware('ValidDeveloper');
Route::get('/taskDetails/{id}',[PagesController::class,'taskDetails'])->name('taskDetails')->middleware('ValidDeveloper');


Route::post('/send-message',function (Request $request){
    event(
        new Message(
            $request->input('username'),
            $request->input('message')
        )
    );
    return ["success"=>true];
});

Route::get('/auth/github/redirect',[authController::class,'githubRedirect']);
Route::get('/auth/github/callback',[authController::class,'githubCallback']);
Route::get('/auth/google/redirect',[authController::class,'googleRedirect']);
Route::get('/auth/google/callback',[authController::class,'googleCallback']);