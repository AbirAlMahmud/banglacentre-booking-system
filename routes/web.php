<?php

use App\Http\Controllers\BookingManageController;
use App\Http\Controllers\PaymentController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SearchPageController;
use App\Http\Controllers\SearchResultController;
use App\Http\Controllers\PersonalDetailsController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\HallManageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShiftController;

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
Route::get('/home', [HomeController::class, 'index'])->name('home.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin', function () {
        return view('');
    });
    Route::prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
        Route::get('/edit/{id}', [DashboardController::class, 'edit'])->name('dashboard.edit');
        Route::post('/update/{id}', [DashboardController::class, 'update'])->name('dashboard.update');
        Route::delete('/destroy/{id}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');
        Route::get('/show/{id}', [DashboardController::class, 'show'])->name('dashboard.show');

        Route::get('/pdf', [PdfController::class, 'dashboardPDFGenerate'])->name('dashboard.pdf');

    });
    Route::prefix('searchpage')->group(function () {
        Route::get('/index', [SearchPageController::class, 'index'])->name('searchpage.index');
        Route::get('/create', [SearchPageController::class, 'create'])->name('searchpage.create');
        Route::post('/store', [SearchPageController::class, 'store'])->name('searchpage.store');
        Route::get('/edit/{id}', [SearchPageController::class, 'edit'])->name('searchpage.edit');
        Route::post('/update/{id}', [SearchPageController::class, 'update'])->name('searchpage.update');
        Route::delete('/destroy/{id}', [SearchPageController::class, 'destroy'])->name('searchpage.destroy');
    });

    Route::prefix('hall_manage')->group(function () {
        Route::get('/index', [HallManageController::class, 'index'])->name('hall_manage.index');
        Route::get('/create', [HallManageController::class, 'create'])->name('hallmanage.create');
        Route::post('/store', [HallManageController::class, 'store'])->name('hallmanage.store');
        Route::get('/edit/{id}', [HallManageController::class, 'edit'])->name('hallmanage.edit');
        Route::post('/update/{id}', [HallManageController::class, 'update'])->name('hallmanage.update');
        Route::delete('/destroy/{id}', [HallManageController::class, 'destroy'])->name('hallmanage.destroy');
    });

    Route::prefix('shift')->group(function () {
        Route::get('/index', [ShiftController::class, 'index'])->name('shift.index');
        Route::get('/create', [ShiftController::class, 'create'])->name('shift.create');
        Route::post('/store', [ShiftController::class, 'store'])->name('shift.store');
        Route::get('/edit/{id}', [ShiftController::class, 'edit'])->name('shift.edit');
        Route::post('/update/{id}', [ShiftController::class, 'update'])->name('shift.update');
        Route::delete('/destroy/{id}', [ShiftController::class, 'destroy'])->name('shift.destroy');
    });

    Route::prefix('booking')->group(function () {
        Route::get('/index', [BookingManageController::class, 'index'])->name('booking.index');
        Route::get('/create', [BookingManageController::class, 'create'])->name('booking.create');
        Route::post('/store', [BookingManageController::class, 'store'])->name('booking.store');
        Route::get('/edit/{id}', [BookingManageController::class, 'edit'])->name('booking.edit');
        Route::post('/update/{id}', [BookingManageController::class, 'update'])->name('booking.update');
        Route::delete('/destroy/{id}', [BookingManageController::class, 'destroy'])->name('booking.destroy');
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
Route::post('/stripe', [PaymentController::class, 'processPayment'])->name('payment.stripe');


Route::get('/process-transaction', [PaymentController::class, 'processTransaction'])->name('processTransaction');
Route::get('/success-transaction', [PaymentController::class, 'successTransaction'])->name('successTransaction');
Route::get('/cancel-transaction', [PaymentController::class, 'cancelTransaction'])->name('cancelTransaction');


Route::get('/confirmpage', [PaymentController::class, 'confirmpage'])->name('confirmpage');
Route::get('/halllist', function () {
    return view('backend.halllist');
});
Route::get('/halldetails', function () {
    return view('backend.halldetails');
});
Route::get('/customerinfo', function () {
    return view('backend.customerinfo');
});


require __DIR__.'/auth.php';
