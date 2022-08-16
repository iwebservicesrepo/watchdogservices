<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;

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
    return redirect()->to('login');
});

Route::get('/clear-cache', function () {
    Artisan::call('clear-compiled');
    Artisan::call('optimize:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
});

/* * ********* admin routing ********** */
Route::controller(AuthController::class)->group(function () {
    Route::get('/admin/login', 'login');
    Route::post('/admin/login', 'login');
    Route::get('/admin/logout', 'logout');
    Route::get('/admin/admin-forgot-password', 'forgotPassword');
    Route::post('/admin/admin-forgot-password', 'forgotPassword');
});

// admin protected routes
Route::group(['middleware' => ['adminAuth'], 'prefix' => 'admin'], function () {
    //update admin profile
    Route::controller(AuthController::class)->group(function () {
        Route::get('/profile', 'updateProfile');
        Route::post('/profile', 'updateProfile');
    });
    //user route
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/send-email/{user_id}', 'sendEmailToUser');
        Route::post('/delete-users', 'deleteUsers');
    });
});

/* * ************** User Routing ****************** */
Route::controller(App\Http\Controllers\Web\AuthController::class)->group(function () {
    Route::get('/register', 'register');
    Route::post('/register', 'register');
    Route::get('/login', 'login');
    Route::post('/login', 'login');
    Route::get('/user/logout', 'logout');
    Route::get('/forgot-password', 'forgotPassword');
    Route::post('/forgot-password', 'forgotPassword');
});

Route::group(['middleware' => ['userAuth'], 'prefix' => 'user'], function () {
    Route::controller(\App\Http\Controllers\Web\HomeController::class)->group(function () {
        Route::get('/dashboard', 'index');
    });
    Route::controller(App\Http\Controllers\Web\UserController::class)->group(function () {
        Route::get('/checkout/{price}', 'index');
        Route::post('/paypal-payment', 'paypalPayment');
        Route::get('/thank-you/{txn_id}', 'thankYouPage');
    });
});

/* * ************** Plan Cron Routing ******************** */
Route::controller(App\Http\Controllers\CronController::class)->group(function () {
    Route::get('cron-mail-before-plan-expiration', 'cronForEmailBeforePlanExpiration');
    Route::get('plan-expiration-cron', 'cronForPlanExpiration');
});
