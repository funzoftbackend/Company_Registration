<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\APIController;
use App\Http\Controllers\API\ResetPasswordController;
use App\Http\Controllers\API\ForgotPasswordController;
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
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/save-user-detail', [APIController::class, 'save_user_details']);
    Route::post('/save-detail', [APIController::class, 'save_details']);
    Route::post('/save-transaction', [APIController::class, 'save_transaction']);
    Route::post('/update-country', [APIController::class, 'update_country']);
    Route::post('/update-package', [APIController::class, 'update_package']);
    Route::post('/update-payment-status', [APIController::class, 'update_payment_status']);
    Route::post('/upload-passport-url-image', [APIController::class, 'upload_passport_url_image']);
    Route::post('/logout', [APIController::class, 'logout']);
    Route::get('/get-applications', [APIController::class, 'get_applications']);
    Route::post('/edit_profile', [APIController::class, 'edit_profile']);
    Route::get('/get-available-company-types', [APIController::class, 'get_available_company_types']);
    Route::get('/get-available-designations', [APIController::class, 'get_available_designations']);
});
Route::post('/signup', [APIController::class, 'signup']);
Route::post('/login', [APIController::class, 'login']);

Route::post('/forgotPassword', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot.password');
Route::post('/verifyCode', [ForgotPasswordController::class, 'verifyCode']);
Route::post('/resetPassword', [ResetPasswordController::class, 'resetPassword']);
Route::post('/resendVerificationCode', [ForgotPasswordController::class, 'resendVerificationCode']);