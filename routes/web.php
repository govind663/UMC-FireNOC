<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\Admin\SignatureController;

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
use App\Http\Controllers\Citizen\CertificateController;
use App\Http\Controllers\Citizen\InvoiceController;

// ============== Citizen Make Payment
use App\Http\Controllers\Citizen\CitizenPaypentController;

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
    Route::get('/admin_download_new_business_noc_pdf/{id}/{status}', [AdminNewBusinessNOCController::class, 'admin_download_new_business_noc_pdf'])->name('admin_download_new_business_noc_pdf');
    Route::get('/admin_new_business_noc/approved/{id}/{status}/{auth_role}', [AdminNewBusinessNOCController::class, 'approved'])->name('admin_new_business_noc.approved');
    Route::post('/admin_new_business_noc/field_inspector_approved/{id}/{status}/{auth_role}', [AdminNewBusinessNOCController::class, 'approved'])->name('admin_new_business_noc.field_inspector_approved');
    Route::post('/admin_new_business_noc/rejected/{id}/{status}/{auth_role}', [AdminNewBusinessNOCController::class, 'rejected'])->name('admin_new_business_noc.rejected');
    Route::get('/all_new_business_noc_list/{all_status}', [AdminNewBusinessNOCController::class, 'list'])->name('all_new_business_noc_list');
    Route::get('/all_new_business_noc/show/{id}/{all_status}', [AdminNewBusinessNOCController::class, 'view'])->name('all_new_business_noc.show');
    Route::get('/generate_new_business_noc_certificate/{id}/{status}', [AdminNewBusinessNOCController::class, 'generate_new_business_noc_certificate'])->name('generate_new_business_noc_certificate');

    // ====== Renew Business NOC
    Route::get('/admin_renew_business_noc_list/{status}', [AdminRenewBusinessNOCController::class, 'index'])->name('admin_renew_business_noc_list');
    Route::get('/admin_renew_business_noc/show/{id}/{status}', [AdminRenewBusinessNOCController::class, 'show'])->name('admin_renew_business_noc.show');
    Route::get('/admin_download_renew_business_noc_pdf/{id}/{status}', [AdminRenewBusinessNOCController::class, 'admin_download_renew_business_noc_pdf'])->name('admin_download_renew_business_noc_pdf');
    Route::get('/admin_renew_business_noc/approved/{id}/{status}/{auth_role}', [AdminRenewBusinessNOCController::class, 'approved'])->name('admin_renew_business_noc.approved');
    Route::post('/admin_renew_business_noc/field_inspector_approved/{id}/{status}/{auth_role}', [AdminRenewBusinessNOCController::class, 'approved'])->name('admin_renew_business_noc.field_inspector_approved');
    Route::post('/admin_renew_business_noc/rejected/{id}/{status}/{auth_role}', [AdminRenewBusinessNOCController::class, 'rejected'])->name('admin_renew_business_noc.rejected');
    Route::get('/all_renew_business_noc_list/{all_status}', [AdminRenewBusinessNOCController::class, 'list'])->name('all_renew_business_noc_list');
    Route::get('/all_renew_business_noc/show/{id}/{all_status}', [AdminRenewBusinessNOCController::class, 'view'])->name('all_renew_business_noc.show');
    Route::get('/generate_renew_business_noc_certificate/{id}/{status}', [AdminRenewBusinessNOCController::class, 'generate_renew_business_noc_certificate'])->name('generate_renew_business_noc_certificate');

    // ====== New Hospital NOC
    Route::get('/admin_new_hospital_noc_list/{status}', [AdminNewHospitalNOCController::class, 'index'])->name('admin_new_hospital_noc_list');
    Route::get('/admin_new_hospital_noc/show/{id}/{status}', [AdminNewHospitalNOCController::class, 'show'])->name('admin_new_hospital_noc.show');
    Route::get('/admin_download_new_hospital_noc_pdf/{id}/{status}', [AdminNewHospitalNOCController::class, 'admin_download_new_hospital_noc_pdf'])->name('admin_download_new_hospital_noc_pdf');
    Route::get('/admin_new_hospital_noc/approved/{id}/{status}/{auth_role}', [AdminNewHospitalNOCController::class, 'approved'])->name('admin_new_hospital_noc_list.approved');
    Route::post('/admin_new_hospital_noc/field_inspector_approved/{id}/{status}/{auth_role}', [AdminNewHospitalNOCController::class, 'approved'])->name('admin_new_hospital_noc.field_inspector_approved');
    Route::post('/admin_new_hospital_noc/rejected/{id}/{status}/{auth_role}', [AdminNewHospitalNOCController::class, 'rejected'])->name('admin_new_hospital_noc.rejected');
    Route::get('/all_new_hospital_noc_list/{all_status}', [AdminNewHospitalNOCController::class, 'list'])->name('all_new_hospital_noc_list');
    Route::get('/all_new_hospital_noc/show/{id}/{all_status}', [AdminNewHospitalNOCController::class, 'view'])->name('all_new_hospital_noc.show');
    Route::get('/generate_new_hospital_noc_certificate/{id}/{status}', [AdminNewHospitalNOCController::class, 'generate_new_hospital_noc_certificate'])->name('generate_new_hospital_noc_certificate');

    // ====== Renew Hospital NOC
    Route::get('/admin_renew_hospital_noc_list/{status}', [AdminRenewHospitalNOCController::class, 'index'])->name('admin_renew_hospital_noc_list');
    Route::get('/admin_renew_hospital_noc/show/{id}/{status}', [AdminRenewHospitalNOCController::class, 'show'])->name('admin_renew_hospital_noc.show');
    Route::get('/admin_download_renew_hospital_noc_pdf/{id}/{status}', [AdminRenewHospitalNOCController::class, 'admin_download_renew_hospital_noc_pdf'])->name('admin_download_renew_hospital_noc_pdf');
    Route::get('/admin_renew_hospital_noc/approved/{id}/{status}/{auth_role}', [AdminRenewHospitalNOCController::class, 'approved'])->name('admin_renew_hospital_noc.approved');
    Route::post('/admin_renew_hospital_noc/field_inspector_approved/{id}/{status}/{auth_role}', [AdminRenewHospitalNOCController::class, 'approved'])->name('admin_renew_hospital_noc.field_inspector_approved');
    Route::post('/admin_renew_hospital_noc/rejected/{id}/{status}/{auth_role}', [AdminRenewHospitalNOCController::class, 'rejected'])->name('admin_renew_hospital_noc.rejected');
    Route::get('/all_renew_hospital_noc_list/{all_status}', [AdminRenewHospitalNOCController::class, 'list'])->name('all_renew_hospital_noc_list');
    Route::get('/all_renew_hospital_noc/show/{id}/{all_status}', [AdminRenewHospitalNOCController::class, 'view'])->name('all_renew_hospital_noc.show');
    Route::get('/generate_renew_hospital_noc_certificate/{id}/{status}', [AdminRenewHospitalNOCController::class, 'generate_renew_hospital_noc_certificate'])->name('generate_renew_hospital_noc_certificate');

    // ====== Provisional Building NOC
    Route::get('/admin_provisional_building_noc_list/{status}', [AdminProvisionalBuildingNOCController::class, 'index'])->name('admin_provisional_building_noc_list');
    Route::get('/admin_provisional_building_noc/show/{id}/{status}', [AdminProvisionalBuildingNOCController::class, 'show'])->name('admin_provisional_building_noc.show');
    Route::get('/admin_download_provisional_building_noc_pdf/{id}/{status}', [AdminProvisionalBuildingNOCController::class, 'admin_download_provisional_building_noc_pdf'])->name('admin_download_provisional_building_noc_pdf');
    Route::get('/admin_provisional_building_noc/approved/{id}/{status}/{auth_role}', [AdminProvisionalBuildingNOCController::class, 'approved'])->name('admin_provisional_building_noc.approved');
    Route::post('/admin_provisional_building_noc/field_inspector_approved/{id}/{status}/{auth_role}', [AdminProvisionalBuildingNOCController::class, 'approved'])->name('admin_provisional_building_noc.field_inspector_approved');
    Route::post('/admin_provisional_building_noc/rejected/{id}/{status}/{auth_role}', [AdminProvisionalBuildingNOCController::class, 'rejected'])->name('admin_provisional_building_noc.rejected');
    Route::get('/all_provisional_building_noc_list/{all_status}', [AdminProvisionalBuildingNOCController::class, 'list'])->name('all_provisional_building_noc_list');
    Route::get('/all_provisional_building_noc/show/{id}/{all_status}', [AdminProvisionalBuildingNOCController::class, 'view'])->name('all_provisional_building_noc.show');
    Route::get('/generate_provisional_building_noc_certificate/{id}/{status}', [AdminProvisionalBuildingNOCController::class, 'generate_provisional_building_noc_certificate'])->name('generate_provisional_building_noc_certificate');

    // ====== Final Building NOC
    Route::get('/admin_final_building_noc_list/{status}', [AdminFinalBuildingNOCController::class, 'index'])->name('admin_final_building_noc_list');
    Route::get('/admin_final_building_noc/show/{id}/{status}', [AdminFinalBuildingNOCController::class, 'show'])->name('admin_final_building_noc.show');
    Route::get('/admin_download_final_building_noc_pdf/{id}/{status}', [AdminFinalBuildingNOCController::class, 'admin_download_final_building_noc_pdf'])->name('admin_download_final_building_noc_pdf');
    Route::get('/admin_final_building_noc/approved/{id}/{status}/{auth_role}', [AdminFinalBuildingNOCController::class, 'approved'])->name('admin_final_building_noc.approved');
    Route::post('/admin_final_building_noc/field_inspector_approved/{id}/{status}/{auth_role}', [AdminFinalBuildingNOCController::class, 'approved'])->name('admin_final_building_noc.field_inspector_approved');
    Route::post('/admin_final_building_noc/rejected/{id}/{status}/{auth_role}', [AdminFinalBuildingNOCController::class, 'rejected'])->name('admin_final_building_noc.rejected');
    Route::get('/all_final_building_noc_list/{all_status}', [AdminFinalBuildingNOCController::class, 'list'])->name('all_final_building_noc_list');
    Route::get('/all_final_building_noc/show/{id}/{all_status}', [AdminFinalBuildingNOCController::class, 'view'])->name('all_final_building_noc.show');
    Route::get('/generate_final_building_noc_certificate/{id}/{status}', [AdminFinalBuildingNOCController::class, 'generate_final_building_noc_certificate'])->name('generate_final_building_noc_certificate');

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



    // ======= Fetch Mode of Operation
    Route::post('user/fee/mode_of_operation', [NewBusinessNOCController::class, 'FetchOperationMode'])->name('user.fee.mode_of_operation');

    // ======= Fetch Building Heights
    Route::post('user/fee/bldg_ht', [NewBusinessNOCController::class, 'FetchBuildingHight'])->name('user.fee.bldg_ht');

    // ======= Fetch Construction Category
    Route::post('user/fee/construction_category', [NewBusinessNOCController::class, 'FetchConstructionCategory'])->name('user.fee.construction_category');

    // ======= Fetch NOC Fee Master Charges
    Route::post('fee/noc_fee_master_rate', [NewBusinessNOCController::class, 'NOCFeeMasterCharges'])->name('fee.noc_fee_master_rate');

    // ======= Citizen Make Payments
    Route::get('make_payment/create/{id}/{status}/{noc_mode}', [CitizenPaypentController::class, 'make_payment_create'])->name('make_payment.create');
    Route::post('make_payment/store/{id}/{status}/{noc_mode}', [CitizenPaypentController::class, 'make_payment_store'])->name('make_payment.store');

    // ======= All Citizen Fire NOC Invoice
    Route::get('/admin_invoice/{id}/{status}/{noc_mode}', [InvoiceController::class, 'admin_fire_noc_invoice'])->name('admin_invoice');

    // ======= Signature
    Route::resource('/signature', SignatureController::class);

    // ======= All Citizen Fire NOC Certificate
    Route::get('/admin_certificate/{id}/{status}/{noc_mode}', [CertificateController::class, 'admin_fire_noc_certificate'])->name('certificate');

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
Route::get('/citizen/reset-password/{token}', [ResetPasswordController::class, 'resetPassword'])->name('/citizen/reset-password/token');
Route::post('/citizen/reset-password', [ResetPasswordController::class, 'updatePassword'])->name('/citizen/reset-password');

// ======================= Citizens Dashboard
Route::group(['middleware' => ['auth:citizen', 'preventBackHistoryMiddleware', 'XSS']], function () {

    Route::get('/citizen/dashboard', [CitizenHomeController::class, 'Citizen_Home'])->name('citizen.dashboard');

    // ====== New Business NOC
    Route::get('/new_business_noc_list/{status}', [NewBusinessNOCController::class, 'index'])->name('new_business_noc_list');
    Route::get('/new_business_noc/create', [NewBusinessNOCController::class, 'create'])->name('new_business_noc.create');
    Route::post('/new_business_noc/store', [NewBusinessNOCController::class, 'store'])->name('new_business_noc.store');
    Route::get('/new_business_noc/show/{id}/{status}', [NewBusinessNOCController::class, 'show'])->name('new_business_noc.show');
    Route::get('/download_new_business_noc_pdf/{id}/{status}', [NewBusinessNOCController::class, 'download_new_business_noc_pdf'])->name('download_new_business_noc_pdf');
    Route::get('/new_business_noc/edit/{id}/{status}', [NewBusinessNOCController::class, 'edit'])->name('new_business_noc.edit');
    Route::post('/new_business_noc/edit/update/{id}/{n_id}/{status}', [NewBusinessNOCController::class, 'update'])->name('new_business_noc.edit.update');
    Route::delete('/new_business_noc/delete/{id}/{n_id}/{status}', [NewBusinessNOCController::class, 'destroy'])->name('new_business_noc.delete');

    // ====== Renew Business NOC
    Route::get('/renew_business_noc_list/{status}', [RenewBusinessNOCController::class, 'index'])->name('renew_business_noc_list');
    Route::get('/renew_business_noc/create', [RenewBusinessNOCController::class, 'create'])->name('renew_business_noc.create');
    Route::post('/renew_business_noc/store', [RenewBusinessNOCController::class, 'store'])->name('renew_business_noc.store');
    Route::get('/renew_business_noc/show/{id}/{status}', [RenewBusinessNOCController::class, 'show'])->name('renew_business_noc.show');
    Route::get('/download_renew_business_noc_pdf/{id}/{status}', [RenewBusinessNOCController::class, 'download_renew_business_noc_pdf'])->name('download_renew_business_noc_pdf');
    Route::get('/renew_business_noc/edit/{id}/{status}', [RenewBusinessNOCController::class, 'edit'])->name('renew_business_noc.edit');
    Route::post('/renew_business_noc/edit/update/{id}/{n_id}/{status}', [RenewBusinessNOCController::class, 'update'])->name('renew_business_noc.edit.update');
    Route::delete('/renew_business_noc/delete/{id}/{n_id}/{status}', [RenewBusinessNOCController::class, 'destroy'])->name('renew_business_noc.delete');

    // ====== New Hospital NOC
    Route::get('/new_hospital_noc_list/{status}', [NewHospitalNOCController::class, 'index'])->name('new_hospital_noc_list');
    Route::get('/new_hospital_noc/create', [NewHospitalNOCController::class, 'create'])->name('new_hospital_noc.create');
    Route::post('/new_hospital_noc/store', [NewHospitalNOCController::class, 'store'])->name('new_hospital_noc.store');
    Route::get('/new_hospital_noc/show/{id}/{status}', [NewHospitalNOCController::class, 'show'])->name('new_hospital_noc.show');
    Route::get('/download_new_hospital_noc_pdf/{id}/{status}', [NewHospitalNOCController::class, 'download_new_hospital_noc_pdf'])->name('download_new_hospital_noc_pdf');
    Route::get('/new_hospital_noc/edit/{id}/{status}', [NewHospitalNOCController::class, 'edit'])->name('new_hospital_noc.edit');
    Route::post('/new_hospital_noc/edit/update/{id}/{n_id}/{status}', [NewHospitalNOCController::class, 'update'])->name('new_hospital_noc.edit.update');
    Route::delete('/new_hospital_noc/delete/{id}/{n_id}/{status}', [NewHospitalNOCController::class, 'destroy'])->name('new_hospital_noc.delete');

    // ====== Renew Hospital NOC
    Route::get('/renew_hospital_noc_list/{status}', [RenewHospitalNOCController::class, 'index'])->name('renew_hospital_noc_list');
    Route::get('/renew_hospital_noc/create', [RenewHospitalNOCController::class, 'create'])->name('renew_hospital_noc.create');
    Route::post('/renew_hospital_noc/store', [RenewHospitalNOCController::class, 'store'])->name('renew_hospital_noc.store');
    Route::get('/renew_hospital_noc/show/{id}/{status}', [RenewHospitalNOCController::class, 'show'])->name('renew_hospital_noc.show');
    Route::get('/download_renew_hospital_noc_pdf/{id}/{status}', [RenewHospitalNOCController::class, 'download_renew_hospital_noc_pdf'])->name('download_renew_hospital_noc_pdf');
    Route::get('/renew_hospital_noc/edit/{id}/{status}', [RenewHospitalNOCController::class, 'edit'])->name('renew_hospital_noc.edit');
    Route::post('/renew_hospital_noc/edit/update/{id}/{n_id}/{status}', [RenewHospitalNOCController::class, 'update'])->name('renew_hospital_noc.edit.update');
    Route::delete('/renew_hospital_noc/delete/{id}/{n_id}/{status}', [RenewHospitalNOCController::class, 'destroy'])->name('renew_hospital_noc.delete');

    // ====== Provisional Building NOC
    Route::get('/provisional_building_noc_list/{status}', [ProvisionalBuildingNOCController::class, 'index'])->name('provisional_building_noc_list');
    Route::get('/provisional_building_noc/create', [ProvisionalBuildingNOCController::class, 'create'])->name('provisional_building_noc.create');
    Route::post('/provisional_building_noc/store', [ProvisionalBuildingNOCController::class, 'store'])->name('provisional_building_noc.store');
    Route::get('/provisional_building_noc/show/{id}/{status}', [ProvisionalBuildingNOCController::class, 'show'])->name('provisional_building_noc.show');
    Route::get('/download_provisional_building_noc_pdf/{id}/{status}', [ProvisionalBuildingNOCController::class, 'download_provisional_building_noc_pdf'])->name('download_provisional_building_noc_pdf');
    Route::get('/provisional_building_noc/edit/{id}/{status}', [ProvisionalBuildingNOCController::class, 'edit'])->name('provisional_building_noc.edit');
    Route::post('/provisional_building_noc/edit/update/{id}/{n_id}/{status}', [ProvisionalBuildingNOCController::class, 'update'])->name('provisional_building_noc.edit.update');
    Route::delete('/provisional_building_noc/delete/{id}/{n_id}/{status}', [ProvisionalBuildingNOCController::class, 'destroy'])->name('provisional_building_noc.delete');

    // ====== Final Building NOC
    Route::get('/final_building_noc_list/{status}', [FinalBuildingNOCController::class, 'index'])->name('final_building_noc_list');
    Route::get('/final_building_noc/create', [FinalBuildingNOCController::class, 'create'])->name('final_building_noc.create');
    Route::post('/final_building_noc/store', [FinalBuildingNOCController::class, 'store'])->name('final_building_noc.store');
    Route::get('/final_building_noc/show/{id}/{status}', [FinalBuildingNOCController::class, 'show'])->name('final_building_noc.show');
    Route::get('/download_final_building_noc_pdf/{id}/{status}', [FinalBuildingNOCController::class, 'download_final_building_noc_pdf'])->name('download_final_building_noc_pdf');
    Route::get('/final_building_noc/edit/{id}/{status}', [FinalBuildingNOCController::class, 'edit'])->name('final_building_noc.edit');
    Route::post('/final_building_noc/edit/update/{id}/{n_id}/{status}', [FinalBuildingNOCController::class, 'update'])->name('final_building_noc.edit.update');
    Route::delete('/final_building_noc/delete/{id}/{n_id}/{status}', [FinalBuildingNOCController::class, 'destroy'])->name('final_building_noc.delete');

    // ======= All Citizen Fire NOC Invoice
    Route::get('/invoice/{id}/{status}/{noc_mode}', [InvoiceController::class, 'fire_noc_invoice'])->name('invoice');

    // ======= All Citizen Fire NOC Certificate
    Route::get('/certificate/{id}/{status}/{noc_mode}', [CertificateController::class, 'fire_noc_certificate'])->name('certificate');

    // ======= All Payment receipt
    Route::post('/upload_payment_receipt/{id}/{status}/{noc_mode}', [CertificateController::class, 'upload_payment_receipt'])->name('upload_payment_receipt');


});

