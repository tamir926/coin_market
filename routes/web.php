<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('generate', function (){
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    echo 'ok';
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/terms-condition', function () {
    return view("terms_condition");
});

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/user/account', [App\Http\Controllers\HomeController::class, 'account'])->name('account');
    Route::get('/user/contribute', [App\Http\Controllers\HomeController::class, 'contribute'])->name('user.contribute');
    Route::get('/user/kyc', [App\Http\Controllers\HomeController::class, 'kyc'])->name('user.kyc');
    Route::get('/user/kyc/status', [App\Http\Controllers\HomeController::class, 'kyc_status'])->name('user.kyc.status');
    Route::get('/user/transactions', [App\Http\Controllers\HomeController::class, 'transaction_list'])->name('user.transactions');
    Route::get('/user/account/balance', [App\Http\Controllers\HomeController::class, 'account_balance'])->name('user.account.balance');

    Route::post('/user/kyc/upload', [App\Http\Controllers\HomeController::class, 'kyc_upload']);
    Route::post('/user/kyc/upload-delete', [App\Http\Controllers\HomeController::class, 'kyc_upload_delete']);
    Route::post('/user/kyc/store', [App\Http\Controllers\HomeController::class, 'kyc_store']);
    Route::put('/user/profile/update', [App\Http\Controllers\HomeController::class, 'profile_update'])->name("user.profile.update");
    Route::post('/user/password/change', [App\Http\Controllers\HomeController::class, 'password_change'])->name("user.password.change");

    // Order
    Route::post('/user/orders', [App\Http\Controllers\HomeController::class, 'order_store'])->name("user.order.store");
    
    // Admin Routes 
    Route::get('/admin/kyc/list', [App\Http\Controllers\AdminController::class, 'kyc_list'])->name('admin.kyc.list');
    Route::post('/admin/kyc/change-status', [App\Http\Controllers\AdminController::class, 'kyc_change_status'])->name('admin.kyc.change.status');
});

// // Custom email verify, if auth verify is false
// Route::get('/email/verify', function (Request $request) {
//     if ($request->user()->hasVerifiedEmail()) {
//         return redirect()->to("/user");
//     } else {
//         return view('auth.verify');
//     }
    
// })->middleware('auth')->name('verification.notice');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();

//     return redirect()->route("verification.notice")->with('resent', 'Баталгаажуулах холбоос мэйлрүү илгээгдлээ!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
//     return redirect('/user');
// })->middleware(['auth', 'signed'])->name('verification.verify');
