<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard',[PagesController::class,'index'])->name('dashboard');
Route::get('/register',[PagesController::class,'registration'])->name('registration');
Route::get('/myProfile',[PagesController::class,'myProfile'])->name('myProfile');
Route::get('/projects',[PagesController::class,'projects'])->name('projects');
Route::get('/projectDetails',[PagesController::class,'projectDetails'])->name('projectDetails');
Route::get('/contact',[PagesController::class,'contact'])->name('contact');
Route::get('/calender',[PagesController::class,'calender'])->name('calender');
Route::get('/chat',[PagesController::class,'chat'])->name('chat');
Route::get('/addContribution',[PagesController::class,'addContribution'])->name('addContribution');
Route::get('/issueBoard',[PagesController::class,'issueBoard'])->name('issueBoard');
Route::get('/list',[ProjectController::class,'projectView'])->name('list');


Route::get('/project/tasks/{id}',[ProjectController::class,'projectTasks'])->name('project.tasks');
Route::get('/tasks',[TaskController::class,'taskProject'])->name('project.tasks');
