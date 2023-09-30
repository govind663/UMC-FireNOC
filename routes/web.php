<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// ========== Admin
use App\Http\Controllers\Admin\AdminNewBusinessNOCController;
use App\Http\Controllers\Admin\AdminRenewBusinessNOCController;
use App\Http\Controllers\Admin\AdminNewHospitalNOCController;
use App\Http\Controllers\Admin\AdminRenewHospitalNOCController;
use App\Http\Controllers\Admin\AdminProvisionalBuildingNOCController;
use App\Http\Controllers\Admin\AdminFinalBuildingNOCController;

use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Admin\FeeConstructionController;
use App\Http\Controllers\Admin\FeeModeOperateController;
use App\Http\Controllers\Admin\FeeBldgHtController;
use App\Http\Controllers\Admin\FeeCategoryController;
use App\Http\Controllers\Admin\FeeMasterController;

// ========== Citizen
use App\Http\Controllers\Citizen\Auth\LoginController;
use App\Http\Controllers\Citizen\Auth\RegisterController;
use App\Http\Controllers\Citizen\Auth\ForgotPasswordController;
use App\Http\Controllers\Citizen\Auth\ResetPasswordController;

use App\Http\Controllers\Citizen\CitizenHomeController;
use App\Http\Controllers\Citizen\NewBusinessNOCController;
use App\Http\Controllers\Citizen\RenewBusinessNOCController;
use App\Http\Controllers\Citizen\NewHospitalNOCController;
use App\Http\Controllers\Citizen\RenewHospitalNOCController;
use App\Http\Controllers\Citizen\ProvisionalBuildingNOCController;
use App\Http\Controllers\Citizen\FinalBuildingNOCController;
use App\Http\Controllers\Admin\CertificateController;

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
Route::post('/admin/register/store', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'store'])->name('admin.register.store');

// ======================= Admin Login/Logout
Route::get('/admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.login');// Very imp line for session expire after 2hrs
Route::post('/admin/login/store', [App\Http\Controllers\Admin\Auth\LoginController::class, 'authenticate'])->name('admin.login.store');
Route::post('/admin/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');


// ======================= Admin Dashboard
Route::group(['middleware' => ['auth:web', 'preventBackHistoryMiddleware']], function () {

    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'Admin_Home'])->name('admin.dashboard');

    // ====== New Business NOC
    Route::get('/admin_new_business_noc_list/{status}', [AdminNewBusinessNOCController::class, 'index'])->name('admin_new_business_noc_list');
    Route::get('/admin_new_business_noc/show/{id}/{status}', [AdminNewBusinessNOCController::class, 'show'])->name('admin_new_business_noc.show');
    Route::get('/admin_new_business_noc/approved/{id}/{status}/{auth_role}', [AdminNewBusinessNOCController::class, 'approved'])->name('admin_new_business_noc.approved');
    Route::post('/admin_new_business_noc/rejected/{id}/{status}/{auth_role}', [AdminNewBusinessNOCController::class, 'rejected'])->name('admin_new_business_noc.rejected');
    Route::get('/all_new_business_noc_list/{all_status}', [AdminNewBusinessNOCController::class, 'list'])->name('all_new_business_noc_list');
    Route::get('/all_new_business_noc/show/{id}/{all_status}', [AdminNewBusinessNOCController::class, 'view'])->name('all_new_business_noc.show');

    // ====== Renew Business NOC
    Route::get('/admin_renew_business_noc_list/{status}', [AdminRenewBusinessNOCController::class, 'index'])->name('admin_renew_business_noc_list');
    Route::get('/admin_renew_business_noc/show/{id}/{status}', [AdminRenewBusinessNOCController::class, 'show'])->name('admin_renew_business_noc.show');
    Route::get('/admin_renew_business_noc/approved/{id}/{status}/{auth_role}', [AdminRenewBusinessNOCController::class, 'approved'])->name('admin_renew_business_noc.approved');
    Route::post('/admin_renew_business_noc/rejected/{id}/{status}/{auth_role}', [AdminRenewBusinessNOCController::class, 'rejected'])->name('admin_renew_business_noc.rejected');
    Route::get('/all_renew_business_noc_list/{all_status}', [AdminRenewBusinessNOCController::class, 'list'])->name('all_renew_business_noc_list');
    Route::get('/all_renew_business_noc/show/{id}/{all_status}', [AdminRenewBusinessNOCController::class, 'view'])->name('all_renew_business_noc.show');

    // ====== New Hospital NOC
    Route::get('/admin_new_hospital_noc_list/{status}', [AdminNewHospitalNOCController::class, 'index'])->name('admin_new_hospital_noc_list');
    Route::get('/admin_new_hospital_noc/show/{id}/{status}', [AdminNewHospitalNOCController::class, 'show'])->name('admin_new_hospital_noc.show');
    Route::get('/admin_new_hospital_noc/approved/{id}/{status}/{auth_role}', [AdminNewHospitalNOCController::class, 'approved'])->name('admin_new_hospital_noc_list.approved');
    Route::post('/admin_new_hospital_noc/rejected/{id}/{status}/{auth_role}', [AdminNewHospitalNOCController::class, 'rejected'])->name('admin_new_hospital_noc.rejected');
    Route::get('/all_new_hospital_noc_list/{all_status}', [AdminNewHospitalNOCController::class, 'list'])->name('all_new_hospital_noc_list');
    Route::get('/all_new_hospital_noc/show/{id}/{all_status}', [AdminNewHospitalNOCController::class, 'view'])->name('all_new_hospital_noc.show');

    // ====== Renew Hospital NOC
    Route::get('/admin_renew_hospital_noc_list/{status}', [AdminRenewHospitalNOCController::class, 'index'])->name('admin_renew_hospital_noc_list');
    Route::get('/admin_renew_hospital_noc/show/{id}/{status}', [AdminRenewHospitalNOCController::class, 'show'])->name('admin_renew_hospital_noc.show');
    Route::get('/admin_renew_hospital_noc/approved/{id}/{status}/{auth_role}', [AdminRenewHospitalNOCController::class, 'approved'])->name('admin_renew_hospital_noc.approved');
    Route::post('/admin_renew_hospital_noc/rejected/{id}/{status}/{auth_role}', [AdminRenewHospitalNOCController::class, 'rejected'])->name('admin_renew_hospital_noc.rejected');
    Route::get('/all_renew_hospital_noc_list/{all_status}', [AdminRenewHospitalNOCController::class, 'list'])->name('all_renew_hospital_noc_list');
    Route::get('/all_renew_hospital_noc/show/{id}/{all_status}', [AdminRenewHospitalNOCController::class, 'view'])->name('all_renew_hospital_noc.show');

    // ====== Provisional Building NOC
    Route::get('/admin_provisional_building_noc_list/{status}', [AdminProvisionalBuildingNOCController::class, 'index'])->name('admin_provisional_building_noc_list');
    Route::get('/admin_provisional_building_noc/show/{id}/{status}', [AdminProvisionalBuildingNOCController::class, 'show'])->name('admin_provisional_building_noc.show');
    Route::get('/admin_provisional_building_noc/approved/{id}/{status}/{auth_role}', [AdminProvisionalBuildingNOCController::class, 'approved'])->name('admin_provisional_building_noc.approved');
    Route::post('/admin_provisional_building_noc/rejected/{id}/{status}/{auth_role}', [AdminProvisionalBuildingNOCController::class, 'rejected'])->name('admin_provisional_building_noc.rejected');
    Route::get('/all_provisional_building_noc_list/{all_status}', [AdminProvisionalBuildingNOCController::class, 'list'])->name('all_provisional_building_noc_list');
    Route::get('/all_provisional_building_noc/show/{id}/{all_status}', [AdminProvisionalBuildingNOCController::class, 'view'])->name('all_provisional_building_noc.show');

    // ====== Final Building NOC
    Route::get('/admin_final_building_noc_list/{status}', [AdminFinalBuildingNOCController::class, 'index'])->name('admin_final_building_noc_list');
    Route::get('/admin_final_building_noc/show/{id}/{status}', [AdminFinalBuildingNOCController::class, 'show'])->name('admin_final_building_noc.show');
    Route::get('/admin_final_building_noc/approved/{id}/{status}/{auth_role}', [AdminFinalBuildingNOCController::class, 'approved'])->name('admin_final_building_noc.approved');
    Route::post('/admin_final_building_noc/rejected/{id}/{status}/{auth_role}', [AdminFinalBuildingNOCController::class, 'rejected'])->name('admin_final_building_noc.rejected');
    Route::get('/all_final_building_noc_list/{all_status}', [AdminFinalBuildingNOCController::class, 'list'])->name('all_final_building_noc_list');
    Route::get('/all_final_building_noc/show/{id}/{all_status}', [AdminFinalBuildingNOCController::class, 'view'])->name('all_final_building_noc.show');


    // ======= Business Master
    Route::resource('/business', BusinessController::class);

    // ======= Fee Construction Master
    Route::resource('/fees_construction', FeeConstructionController::class);

    // ======= Fee Mode Operate Master
    Route::resource('/fees_mode_operate', FeeModeOperateController::class);

    // ======= Fee Building height Master
    Route::resource('/fees_bldg_ht', FeeBldgHtController::class);

    // ======= Fee Category Master
    Route::resource('/fees_category', FeeCategoryController::class);

    // ======= Fee Master
    Route::resource('/fees_master', FeeMasterController::class);

    // ======= Fetch Mode of Operation
    Route::post('fee/mode_of_operation', [FeeBldgHtController::class, 'FetchOperationMode'])->name('fee.mode_of_operation');

    // ======= Fetch Building Heights
    Route::post('fee/bldg_ht', [FeeBldgHtController::class, 'FetchBuildingHight'])->name('fee.bldg_ht');

    // ======= Fetch Construction Category
    Route::post('fee/construction_category', [FeeBldgHtController::class, 'FetchConstructionCategory'])->name('fee.construction_category');

});


// ======================= Citizens Register
Route::get('/citizen/register', [RegisterController::class, 'Citizen_Register_Form'])->name('citizen.register');
Route::post('/citizen/register/store', [RegisterController::class, 'Store_Citizen_Register_Form'])->name('citizen.register.store');

// ======================= Citizens Login/Logout
Route::get('/citizen/login', [LoginController::class, 'Citizen_Login_Form'])->name('login');
Route::post('/citizen/login/store', [LoginController::class, 'Citizen_Authenticate'])->name('citizen.login.store');
Route::post('/citizen/logout', [LoginController::class, 'Citizen_Logout'])->name('citizen.logout');

// ======================= Citizens Forgot Password
Route::get('/citizen/forget-password', [ForgotPasswordController::class, 'getEmail'])->name('citizen.forget-password');
Route::post('/citizen/forget-password/send-email-link', [ForgotPasswordController::class, 'postEmail'])->name('citizen.forget-password.send-email-link.store');

// ======================= Citizens Reset Password
Route::get('/citizen/reset-password/{token}', [ResetPasswordController::class, 'resetPassword'])->name('/citizen/reset-password/token');
Route::post('/citizen/reset-password', [ResetPasswordController::class, 'updatePassword'])->name('/citizen/reset-password');

// ======================= Citizens Dashboard
Route::group(['middleware' => ['auth:citizen', 'preventBackHistoryMiddleware']], function () {

    Route::get('/citizen/dashboard', [CitizenHomeController::class, 'Citizen_Home'])->name('citizen.dashboard');

    // ====== New Business NOC
    Route::get('/new_business_noc_list/{status}', [NewBusinessNOCController::class, 'index'])->name('new_business_noc_list');
    Route::get('/new_business_noc/create', [NewBusinessNOCController::class, 'create'])->name('new_business_noc.create');
    Route::post('/new_business_noc/store', [NewBusinessNOCController::class, 'store'])->name('new_business_noc.store');
    Route::get('/new_business_noc/show/{id}/{status}', [NewBusinessNOCController::class, 'show'])->name('new_business_noc.show');
    Route::get('/new_business_noc/edit/{id}/{status}', [NewBusinessNOCController::class, 'edit'])->name('new_business_noc.edit');
    Route::post('/new_business_noc/edit/update/{id}/{n_id}/{status}', [NewBusinessNOCController::class, 'update'])->name('new_business_noc.edit.update');
    Route::delete('/new_business_noc/delete/{id}/{n_id}/{status}', [NewBusinessNOCController::class, 'destroy'])->name('new_business_noc.delete');
    Route::get('/new_business_noc/make_payment/create/{id}/{status}', [NewBusinessNOCController::class, 'make_payment_create'])->name('new_business_noc.make_payment.create');
    Route::get('/new_business_noc/make_payment/store/{id}/{status}', [NewBusinessNOCController::class, 'make_payment_store'])->name('new_business_noc.make_payment.store');

    // ====== Renew Business NOC
    Route::get('/renew_business_noc_list/{status}', [RenewBusinessNOCController::class, 'index'])->name('renew_business_noc_list');
    Route::get('/renew_business_noc/create', [RenewBusinessNOCController::class, 'create'])->name('renew_business_noc.create');
    Route::post('/renew_business_noc/store', [RenewBusinessNOCController::class, 'store'])->name('renew_business_noc.store');
    Route::get('/renew_business_noc/show/{id}/{status}', [RenewBusinessNOCController::class, 'show'])->name('renew_business_noc.show');
    Route::get('/renew_business_noc/edit/{id}/{status}', [RenewBusinessNOCController::class, 'edit'])->name('renew_business_noc.edit');
    Route::post('/renew_business_noc/edit/update/{id}/{n_id}/{status}', [RenewBusinessNOCController::class, 'update'])->name('renew_business_noc.edit.update');
    Route::delete('/renew_business_noc/delete/{id}/{n_id}/{status}', [RenewBusinessNOCController::class, 'destroy'])->name('renew_business_noc.delete');

    // ====== New Hospital NOC
    Route::get('/new_hospital_noc_list/{status}', [NewHospitalNOCController::class, 'index'])->name('new_hospital_noc_list');
    Route::get('/new_hospital_noc/create', [NewHospitalNOCController::class, 'create'])->name('new_hospital_noc.create');
    Route::post('/new_hospital_noc/store', [NewHospitalNOCController::class, 'store'])->name('new_hospital_noc.store');
    Route::get('/new_hospital_noc/show/{id}/{status}', [NewHospitalNOCController::class, 'show'])->name('new_hospital_noc.show');
    Route::get('/new_hospital_noc/edit/{id}/{status}', [NewHospitalNOCController::class, 'edit'])->name('new_hospital_noc.edit');
    Route::post('/new_hospital_noc/edit/update/{id}/{n_id}/{status}', [NewHospitalNOCController::class, 'update'])->name('new_hospital_noc.edit.update');
    Route::delete('/new_hospital_noc/delete/{id}/{n_id}/{status}', [NewHospitalNOCController::class, 'destroy'])->name('new_hospital_noc.delete');

    // ====== Renew Hospital NOC
    Route::get('/renew_hospital_noc_list/{status}', [RenewHospitalNOCController::class, 'index'])->name('renew_hospital_noc_list');
    Route::get('/renew_hospital_noc/create', [RenewHospitalNOCController::class, 'create'])->name('renew_hospital_noc.create');
    Route::post('/renew_hospital_noc/store', [RenewHospitalNOCController::class, 'store'])->name('renew_hospital_noc.store');
    Route::get('/renew_hospital_noc/show/{id}/{status}', [RenewHospitalNOCController::class, 'show'])->name('renew_hospital_noc.show');
    Route::get('/renew_hospital_noc/edit/{id}/{status}', [RenewHospitalNOCController::class, 'edit'])->name('renew_hospital_noc.edit');
    Route::post('/renew_hospital_noc/edit/update/{id}/{n_id}/{status}', [RenewHospitalNOCController::class, 'update'])->name('renew_hospital_noc.edit.update');
    Route::delete('/renew_hospital_noc/delete/{id}/{n_id}/{status}', [RenewHospitalNOCController::class, 'destroy'])->name('renew_hospital_noc.delete');

    // ====== Provisional Building NOC
    Route::get('/provisional_building_noc_list/{status}', [ProvisionalBuildingNOCController::class, 'index'])->name('provisional_building_noc_list');
    Route::get('/provisional_building_noc/create', [ProvisionalBuildingNOCController::class, 'create'])->name('provisional_building_noc.create');
    Route::post('/provisional_building_noc/store', [ProvisionalBuildingNOCController::class, 'store'])->name('provisional_building_noc.store');
    Route::get('/provisional_building_noc/show/{id}/{status}', [ProvisionalBuildingNOCController::class, 'show'])->name('provisional_building_noc.show');
    Route::get('/provisional_building_noc/edit/{id}/{status}', [ProvisionalBuildingNOCController::class, 'edit'])->name('provisional_building_noc.edit');
    Route::post('/provisional_building_noc/edit/update/{id}/{n_id}/{status}', [ProvisionalBuildingNOCController::class, 'update'])->name('provisional_building_noc.edit.update');
    Route::delete('/provisional_building_noc/delete/{id}/{n_id}/{status}', [ProvisionalBuildingNOCController::class, 'destroy'])->name('provisional_building_noc.delete');

    // ====== Final Building NOC
    Route::get('/final_building_noc_list/{status}', [FinalBuildingNOCController::class, 'index'])->name('final_building_noc_list');
    Route::get('/final_building_noc/create', [FinalBuildingNOCController::class, 'create'])->name('final_building_noc.create');
    Route::post('/final_building_noc/store', [FinalBuildingNOCController::class, 'store'])->name('final_building_noc.store');
    Route::get('/final_building_noc/show/{id}/{status}', [FinalBuildingNOCController::class, 'show'])->name('final_building_noc.show');
    Route::get('/final_building_noc/edit/{id}/{status}', [FinalBuildingNOCController::class, 'edit'])->name('final_building_noc.edit');
    Route::post('/final_building_noc/edit/update/{id}/{n_id}/{status}', [FinalBuildingNOCController::class, 'update'])->name('final_building_noc.edit.update');
    Route::delete('/final_building_noc/delete/{id}/{n_id}/{status}', [FinalBuildingNOCController::class, 'destroy'])->name('final_building_noc.delete');

    // ======= Fetch Mode of Operation
    Route::post('user/fee/mode_of_operation', [NewBusinessNOCController::class, 'FetchOperationMode'])->name('user.fee.mode_of_operation');

    // ======= Fetch Building Heights
    Route::post('user/fee/bldg_ht', [NewBusinessNOCController::class, 'FetchBuildingHight'])->name('user.fee.bldg_ht');

    // ======= Fetch Construction Category
    Route::post('user/fee/construction_category', [NewBusinessNOCController::class, 'FetchConstructionCategory'])->name('user.fee.construction_category');

    // ======= Fetch NOC Fee Master Charges
    Route::post('fee/noc_fee_master_rate', [NewBusinessNOCController::class, 'NOCFeeMasterCharges'])->name('fee.noc_fee_master_rate');

    Route::get('/new_buisness_noc_certificate', [CertificateController::class, 'fireNocBuisnessCertificate']);
    Route::get('/renew_buisness_noc_certificate', [CertificateController::class, 'renewFireNocBuisnessCertificate']);
    Route::get('/new_building_noc_certificate', [CertificateController::class, 'fireNocBuildingCertificate']);
    Route::get('/renew_building_noc_certificate', [CertificateController::class, 'renewFireNocBuildingCertificate']);
    Route::get('/new_hospital_noc_certificate', [CertificateController::class, 'fireNocHospitalCertificate']);
    Route::get('/renew_hospital_noc_certificate', [CertificateController::class, 'renewFireNocHospitalCertificate']);
});

