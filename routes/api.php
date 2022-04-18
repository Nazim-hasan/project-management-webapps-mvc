<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectAPIController;
use App\Http\Controllers\LoginAPIController;
use App\Http\Controllers\RegistationAPIController;
use App\Http\Controllers\TaskAPIController;
use App\Http\Controllers\Website;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[LoginAPIController::class,'login']);
Route::post('/logout',[LoginAPIController::class,'logout']);
Route::get('/logout',[LoginAPIController::class,'logout']);
Route::post('/register',[RegistationAPIController::class,'registration']);
Route::post('/website',[Website::class,'website']);
Route::post('/verifyOTP',[Website::class,'verifyOTP']);
Route::get('/getUserName/{userId}',[LoginAPIController::class,'getUserName'])->middleware('APIAuth');
Route::get('/getUserInfo/{userId}',[LoginAPIController::class,'getUserInfo'])->middleware('APIAuth');
Route::post('/updateUserInfo',[LoginAPIController::class,'updateUserInfo'])->middleware('APIAuth');
Route::get('/allProjects',[ProjectAPIController::class, 'allProjects'])->middleware('APIAuth');
Route::get('/myTasks',[TaskAPIController::class, 'myTasks'])->middleware('APIAuth');
Route::get('/project/{id}',[ProjectAPIController::class, 'project'])->middleware('APIAuth');
Route::get('/task/{id}',[TaskAPIController::class, 'taskDetails'])->middleware('APIAuth');

// Route::post('/allProjects',[ProjectAPIController::class, 'AddNewProjects']);


