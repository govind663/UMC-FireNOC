<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// ========== Citizen
use App\Http\Controllers\Citizen\Auth\LoginController;
use App\Http\Controllers\Citizen\Auth\RegisterController;
use App\Http\Controllers\Citizen\Auth\ForgotPasswordController;
use App\Http\Controllers\Citizen\Auth\ResetPasswordController;

use App\Http\Controllers\Citizen\CitizenHomeController;

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

Route::get('/', function () {
    return view('welcome');
});

// ======================= Admin Register
Route::get('/admin/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'store'])->name('admin.register.store');

// ======================= Admin Login/Logout
Route::get('/admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login');// Very imp line for session expire after 2hrs
Route::post('/admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'authenticate'])->name('admin.login.store');
Route::post('/admin/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');


// ======================= Admin Dashboard
Route::group(['middleware' => ['auth:web']], function () {

    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'Admin_Home'])->name('admin.dashboard');

});



// ======================= Citizens Register
Route::get('/citizen/register', [RegisterController::class, 'Citizen_Register_Form'])->name('citizen.register');
Route::post('/citizen/register/store', [RegisterController::class, 'Store_Citizen_Register_Form'])->name('citizen.register.store');

// ======================= Citizens Login/Logout
Route::get('/citizen/login', [LoginController::class, 'Citizen_Login_Form'])->name('citizen.login');
Route::post('/citizen/login/store', [LoginController::class, 'Citizen_Authenticate'])->name('citizen.login.store');
Route::post('/citizen/logout', [LoginController::class, 'Citizen_Logout'])->name('citizen.logout');

// ======================= Citizens Forgot Password
Route::get('/citizen/forget-password', [ForgotPasswordController::class, 'getEmail'])->name('citizen.forget-password');
Route::post('/citizen/forget-password/send-email-link', [ForgotPasswordController::class, 'postEmail'])->name('citizen.forget-password.send-email-link.store');

// ======================= Citizens Reset Password
Route::get('/citizen/reset-password/{token}', [ResetPasswordController::class, 'resetPassword'])->name('/citizen/reset-password/');
Route::post('/citizen/reset-password', [ResetPasswordController::class, 'updatePassword'])->name('/citizen/reset-password');

// ======================= Citizens Dashboard
Route::group(['middleware' => ['auth:citizen']], function () {

    Route::get('/citizen/dashboard', [CitizenHomeController::class, 'Citizen_Home'])->name('citizen.dashboard');
});



// ========= Clear Route Cache from Browser
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});

// ========= Clear Config Cache from Browser
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});


// ========= Clear Application Cache from Browser
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});


// ========= Clear View Cache from Browser
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});
