<?php

use App\Http\Controllers\BookingTourController;
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

Route::get('language/{language}', [LanguageController::class, 'index'])->name('language');
Route::get('/', function () {
    return view('home_user');
})->name('home');

Route::get('users/profile/{id}', [UserController::class, 'show_edit'])->name('edit_profile');

Route::resource('users', UserController::class)->only([
    'index', 'store', 'update',
]);
Route::resource('orders', UserController::class)->only([
    'index', 'show', 'store', 'update',
])->middleware(['auth']);
Route::resource('comments', CommentController::class)->only([
    'index', 'show', 'store',
])->middleware(['auth']);
Route::get('/dashboard', function () {
    return view('dashboard')->name('dashboard');
})->middleware(['auth']);
Route::resource('tours', TourController::class)->only([
    'index', 'show',
]);
Route::resource('admin/admintours', ListTourController::class)
    ->middleware('role');


Route::resource('reviews', ReviewController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('booking', [BookingTourController::class, 'showBookingTour'])
        ->name('booking');
    Route::post('booking/payment', [BookingTourController::class, 'storeBookingTour'])
        ->name('storeBookingTour');
    Route::get('booking/payment/confirm', [CreatePaymentController::class, 'createVnpPayment'])
        ->name('createVnpPayment');
    Route::post('booking/payment/processing', [CreatePaymentController::class, 'handlePayment'])
        ->name('handleVnpPayment');
    Route::get('booking/returnPaymentResult', [ReturnedResultPayment::class, 'returnResultPayment'])
        ->name('redirectPaymentResult');
    Route::get('booking/ipn_vnpay', [IpnVnpPaymentController::class, 'getIpnPaymentResult'])
        ->name('ipn_vnpay');

    Route::post('reviews/upload', [ReviewController::class, 'uploadImageToDir'])->name('reviews.upload');
    Route::get('/heart', [LikeController::class, 'Like'])->name('heart');
});


/* Admin */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('search/', [TourController::class, 'search'])->name('search');

Route::get('test', function () {
    return view('booking.vnp_response');
});
