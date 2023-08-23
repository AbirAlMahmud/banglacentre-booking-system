<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchPageController;
use App\Http\Controllers\SearchResultController;
use App\Http\Controllers\PersonalDetailsController;

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

Route::get('/', function () {
    return view('backend.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin', function () {
        return view('backend.dashboard2');
    });
    Route::prefix('searchpage')->group(function () {
        Route::get('/index', [SearchPageController::class, 'index'])->name('searchpage.index');
        Route::get('/create', [SearchPageController::class, 'create'])->name('searchpage.create');
        Route::post('/store', [SearchPageController::class, 'store'])->name('searchpage.store');
        Route::get('/edit/{id}', [SearchPageController::class, 'edit'])->name('searchpage.edit');
        Route::post('/update/{id}', [SearchPageController::class, 'update'])->name('searchpage.update');
        Route::delete('/destroy/{id}', [SearchPageController::class, 'destroy'])->name('searchpage.destroy');
    });
    Route::prefix('person-details')->group(function () {
        Route::get('/index', [PersonalDetailsController::class, 'index'])->name('person.index');
        Route::get('/create', [PersonalDetailsController::class, 'create'])->name('person.create');
        Route::post('/store', [PersonalDetailsController::class, 'store'])->name('person.store');
        Route::get('/edit/{id}', [PersonalDetailsController::class, 'edit'])->name('person.edit');
        Route::post('/update/{id}', [PersonalDetailsController::class, 'update'])->name('person.update');
        Route::delete('/destroy/{id}', [PersonalDetailsController::class, 'destroy'])->name('person.destroy');
    });
});

Route::post('/searchresult', [SearchResultController::class, 'index'])->name('searchresult.index');
Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/stripe', [PaymentController::class, 'stripePost'])->name('stripe.post');


Route::get('handle-payment', [PaymentController::class, 'handlePayment’'])->name('make.payment');

Route::get('cancel-payment', [PaymentController::class, 'paymentCancel’'])->name('cancel.payment');

Route::get('payment-success', [PaymentController::class, 'paymentSuccess’'])->name('success.payment');


require __DIR__.'/auth.php';
