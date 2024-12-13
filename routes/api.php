<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\APi\ProjectController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\MemberController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(AuthController::class)->group(function(){
    Route::post('register','_register');
    Route::post('login','_login');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(RoleController::class)->group(function(){
    Route::get('role/index','index');
});
Route::controller(ProjectController::class)->group(function(){
    Route::get('project','index');
    Route::get('project/{project}','show');
    Route::post('project/edit/{project}','update');
    Route::delete('project/{project}','destroy');
    Route::post('project/create','store');
});
Route::controller(StudentController::class)->group(function(){
    Route::get('student','index');
    Route::get('student/{student}','show');
    Route::post('student/edit/{student}','update');
    Route::delete('student/{student}','destroy');
    Route::post('student/create','store');
});
Route::controller(MemberController::class)->group(function(){
    Route::post('member','index');
    Route::get('member/{member}','show');
    Route::post('member/edit/{member}','update');
    Route::delete('member/{member}','destroy');
    Route::post('member/create','store');
});
