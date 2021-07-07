<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingTourController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ListTourController;
use App\Http\Controllers\Payment\CreatePaymentController;
use App\Http\Controllers\Payment\IpnVnpPaymentController;
use App\Http\Controllers\Payment\ReturnedResultPayment;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\ReviewManagementController;
use App\Http\Controllers\UserManagementController;

Route::get('language/{language}', [LanguageController::class, 'index'])->name('language');
Route::get('/', function () {
    return view('home_user');
})->name('home');

Route::get('users/profile/{id}', [UserController::class, 'show_edit'])->name('edit_profile');


Route::resource('tours', TourController::class)->only([
    'index', 'show',
]);


Route::resource('reviews', ReviewController::class);

Route::middleware(['auth'])->group(function () {

    Route::prefix('/booking')->group(function () {
        Route::get('/', [BookingTourController::class, 'showBookingTour'])
            ->name('booking');
        Route::post('/payment', [BookingTourController::class, 'storeBookingTour'])
            ->name('storeBookingTour');
        Route::get('/payment/confirm', [CreatePaymentController::class, 'createVnpPayment'])
            ->name('createVnpPayment');
        Route::post('/payment/processing', [CreatePaymentController::class, 'handlePayment'])
            ->name('handleVnpPayment');
        Route::get('/returnPaymentResult', [ReturnedResultPayment::class, 'returnResultPayment'])
            ->name('redirectPaymentResult');
        Route::get('/ipn_vnpay', [IpnVnpPaymentController::class, 'getIpnPaymen
        tResult'])
            ->name('ipn_vnpay');
    });

    Route::post('reviews/upload', [ReviewController::class, 'uploadImageToDir'])->name('reviews.upload');
    Route::get('/heart', [LikeController::class, 'Like'])->name('heart');

    Route::resource('comments', CommentController::class)->only([
        'index', 'show', 'store',
    ])->middleware(['auth']);

    Route::resource('users', UserController::class)->only([
        'index', 'show', 'store', 'update',
    ]);
});


/* Admin */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('search/', [TourController::class, 'search'])->name('search');

Route::middleware('role')->prefix('admin')->group(function () {
    Route::resource('/adminreviews', ReviewManagementController::class)->only([
        'index',
        'destroy',
    ]);
    Route::resource('/admintours', ListTourController::class)
        ->middleware('role');

    Route::resource('/category', CategoryController::class)->except([
        'show', 'destroy',
    ]);
    Route::resource('/user', UserManagementController::class)->except([
        'show', 'store', 'create',
    ]);
    Route::resource('/', AdminController::class)->only([
        'index',
    ]);
    Route::get('/revenue', [RevenueController::class, 'revenue'])->name('revenue');
});
