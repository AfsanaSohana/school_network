<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\APi\ProjectController;
use App\Http\Controllers\APi\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/register', [AuthController::class, '_register'])->name('register');
// Route::post('/register', [AuthController::class, '_register']);
// Route::get("/",[AuthController::class,'_login']);
// Route::post("login",[AuthController::class,"_login"]);

// Route::prefix("dashboard")->middleware("checkAuth")->group(function(){

    // Route::get("/",[DashboardController::class,"page"]);

//     Route::resource('project', ProjectController::class);
//     Route::get("/logout",[DashboardController::class,"logout"]);

// });
Route::get('/home', function () {
    return view('home'); // Assumes you have 'test.blade.php' in resources/views
});
Route::get('/home', [HomeController::class, '_home']);
