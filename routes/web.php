<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;


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
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register_save'])->name('register.save');

Route::get("/admin/login",[AuthController::class,'login'])->name('login');
Route::post("/admin/login",[AuthController::class,"login_check"])->name('login.check');

Route::get('/admin/logout', [AuthController::class,'logout'])->name('LogOut');
Route::get('/admin/_logout', [AuthController::class,'_logout'])->name('_logout');



Route::get('/register', [StudentAuthController::class, 'register'])->name('student.register');
Route::post('/register', [StudentAuthController::class, 'register_save'])->name('student.register.save');
Route::get("/login",[StudentAuthController::class,'login'])->name('student.login');
Route::post("login",[StudentAuthController::class,"login_check"])->name('student.login.check');

Route::get('/logout', [StudentAuthController::class,'logout'])->name('student.LogOut');
Route::get('/_logout', [StudentAuthController::class,'_logout'])->name('student._logout');


Route::middleware(['student_role'])->prefix('student')->group(function(){
    Route::get('dashboard', [StudentController::class,'dashboard'])->name('student.dashboard');
    Route::get('information', [StudentController::class,'information'])->name('student.information');
    Route::post("information/store/{id}",[StudentController::class,"store"])->name('student.information.store');
    Route::post("information/project_store",[StudentController::class,"project_store"])->name('student.information.project_store');
    Route::post("information/reading_store",[StudentController::class,"reading_store"])->name('student.information.reading_store');
});

Route::middleware(['superadmin_role'])->prefix('super_admin')->group(function(){
    Route::get('dashboard', [DashboardController::class,'super_admin'])->name('super_admin.dashboard');
    Route::resource('users', UserController::class);
});
Route::middleware(['schooladmin_role'])->prefix('school_admin')->group(function(){
    Route::get('dashboard', [DashboardController::class,'school_admin'])->name('school_admin.dashboard');
     Route::get('student_user', [StudentUserController::class,'index'])->name('student_user.index');
     Route::get('student_user/approve/{id}', [StudentUserController::class,'approve'])->name('student_user.approve');
});
