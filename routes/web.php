<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;


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
// Route::get('/register', [AuthController::class, 'register_form'])->name('register');
// Route::post('/register', [AuthController::class, 'register'])->name('register.save');

// Route::get("/admin/login",[AuthController::class,'login_form'])->name('login');
// Route::post("/admin/login",[AuthController::class,"login"])->name('login.check');


Route::get('/register', [StudentAuthController::class, 'register'])->name('student.register');
Route::post('/register', [StudentAuthController::class, 'register_save'])->name('student.register.save');
Route::get("/login",[StudentAuthController::class,'login'])->name('student.login');
Route::post("login",[StudentAuthController::class,"login_check"])->name('student.login.check');
Route::get('/logout', [StudentAuthController::class,'logout'])->name('student.LogOut');
Route::get('/_logout', [StudentAuthController::class,'_logout'])->name('student._logout');


Route::middleware(['student_role'])->prefix('student')->group(function(){
    Route::get('dashboard', [StudentController::class,'dashboard'])->name('student.dashboard');
    Route::get('information', [StudentController::class,'information'])->name('student.information');
});
