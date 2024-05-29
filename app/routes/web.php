<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController; 
use App\Http\Controllers\CountryController; 
use App\Http\Controllers\LeadController; 
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
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
Route::get('/clear-cache', function () {
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    return 'Route and view caches cleared successfully.';
});
Route::post('/forgotPassword', [ForgotPasswordController::class, 'forgotPassword'])->name('web.forgot.password');
Route::get('/forgotPassword', [ForgotPasswordController::class, 'showforgotpassword'])->name('showforgotpassword');
Route::get('/showverifyCode', [ForgotPasswordController::class, 'showverifyCode'])->name('web.showverify.code');
Route::post('/verifyCode', [ForgotPasswordController::class, 'verifyCode'])->name('web.verify.code');
Route::get('/resetPassword', [ResetPasswordController::class, 'showresetPassword'])->name('web.showreset.password');
Route::post('/resetPassword', [ResetPasswordController::class, 'resetPassword'])->name('web.reset.password');
Route::post('/resendVerificationCode', [ForgotPasswordController::class, 'resendVerificationCode'])->name('web.resend.code');
Route::get('/', [LoginController::class, 'login']);
Route::get('/signup', [LoginController::class, 'signup'])->name('signup');
Route::post('/post_signup', [LoginController::class, 'post_signup'])->name('post_signup');
Route::get('/error', [LoginController::class, 'error'])->name('error');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/post_login', [LoginController::class, 'post_login'])->name('post_login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('application/{application}/enter-crn', [ApplicationController::class, 'enterCrnForm'])->name('application.enter_crn');
    Route::post('application/{application}/enter-crn', [ApplicationController::class, 'saveCrn'])->name('application.save_crn');
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/edit-user', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/delete-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/country-create', [CountryController::class, 'create'])->name('country.create');
    Route::post('/country-store', [CountryController::class, 'store'])->name('country.store');
    Route::get('/service-create', [CountryController::class, 'service_create'])->name('service.create');
    Route::post('/service-store', [CountryController::class, 'store_service'])->name('service.store');
    Route::post('/domain-store', [CountryController::class, 'domain_store'])->name('domain.store');
    Route::get('/services', [CountryController::class, 'service_index'])->name('services.index');
     Route::get('/edit-service', [CountryController::class, 'edit_service'])->name('service.edit');
    Route::put('/service-update/{service}', [CountryController::class, 'update_service'])->name('service.update');
    Route::delete('/delete-service/{service}', [CountryController::class, 'service_destroy'])->name('service.destroy');
    Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
    Route::get('/country/{user}', [CountryController::class, 'show'])->name('country.show');
    Route::get('/edit-country', [CountryController::class, 'edit'])->name('country.edit');
    Route::put('/country-update/{country}', [CountryController::class, 'update'])->name('country.update');
    Route::delete('/delete-country/{country}', [CountryController::class, 'destroy'])->name('country.destroy');
    Route::get('/application-create', [ApplicationController::class, 'create'])->name('application.create');
    Route::post('/application-store', [ApplicationController::class, 'store'])->name('application.store');
    Route::get('/applications', [ApplicationController::class, 'index'])->name('application.index');
    Route::post('/applications/filter', [ApplicationController::class, 'filterApplications'])->name('applications.filter');
    Route::get('/application/{application}', [ApplicationController::class, 'show'])->name('application-details.show');
    Route::post('/application-proceed/{application}', [ApplicationController::class, 'proceed'])->name('application.proceed');
    Route::post('/application-reject', [ApplicationController::class, 'reject'])->name('application.reject');
    Route::get('/edit-application', [ApplicationController::class, 'edit'])->name('application.edit');
    Route::put('/application-update/{application}', [ApplicationController::class, 'update'])->name('application.update');
    Route::delete('/delete-application/{application}', [ApplicationController::class, 'destroy'])->name('application.destroy');
    Route::get('/company-create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/company-store', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/companies', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/company/{user}', [CompanyController::class, 'show'])->name('company.show');
    Route::get('/edit-company', [CompanyController::class, 'edit'])->name('company.edit');
    Route::put('/company-update/{company}', [CompanyController::class, 'update'])->name('company.update');
    Route::delete('/delete-company/{company}', [CompanyController::class, 'destroy'])->name('company.destroy');
    Route::get('/transaction-create', [TransactionController::class, 'create'])->name('transaction.create');
    Route::post('/transaction-store', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('/transaction/{user}', [TransactionController::class, 'show'])->name('transaction.show');
    Route::get('/edit-transaction', [TransactionController::class, 'edit'])->name('transaction.edit');
    Route::put('/transaction-update/{transaction}', [TransactionController::class, 'update'])->name('transaction.update');
    Route::delete('/delete-transaction/{transaction}', [TransactionController::class, 'destroy'])->name('transaction.destroy');
    Route::get('/partner-create', [PartnerController::class, 'create'])->name('partner.create');
    Route::post('/partner-store', [PartnerController::class, 'store'])->name('partner.store');
    Route::get('/partners', [PartnerController::class, 'index'])->name('partner.index');
    Route::get('/partner/{user}', [PartnerController::class, 'show'])->name('partner.show');
    Route::get('/edit-partner', [PartnerController::class, 'edit'])->name('partner.edit');
    Route::put('/partner-update/{partner}', [PartnerController::class, 'update'])->name('partner.update');
    Route::delete('/delete-partner/{lead}', [PartnerController::class, 'destroy'])->name('partner.destroy');
    Route::get('/lead-create', [LeadController::class, 'create'])->name('lead.create');
    Route::post('/lead-store', [LeadController::class, 'store'])->name('lead.store');
    Route::get('/leads', [LeadController::class, 'index'])->name('lead.index');
    Route::get('/lead/{user}', [LeadController::class, 'show'])->name('lead.show');
    Route::get('/edit-lead', [LeadController::class, 'edit'])->name('lead.edit');
    Route::put('/lead-update/{lead}', [LeadController::class, 'update'])->name('lead.update');
    Route::delete('/delete-lead/{lead}', [LeadController::class, 'destroy'])->name('lead.destroy');
});