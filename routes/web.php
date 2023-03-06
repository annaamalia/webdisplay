<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index'])->name('landingpage');
Route::get('/about', [App\Http\Controllers\LandingPageController::class, 'about'])->name('about');

Auth::routes();

Route::group(['prefix' => 'adm', 'middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('program', App\Http\Controllers\ProgramController::class);
    Route::get('/invoice', [App\Http\Controllers\InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/konfirmasi/{id}', [App\Http\Controllers\InvoiceController::class, 'konfirmasi'])->name('invoice.konfirmasi');
    Route::get('/program/destroy/{id}', [App\Http\Controllers\ProgramController::class, 'destroy'])->name('program.destroy');
    Route::get('/program/edit/{id}', [App\Http\Controllers\ProgramController::class, 'edit'])->name('program.edit');
    Route::post('/program/update/{id}', [App\Http\Controllers\ProgramController::class, 'update'])->name('program.update');
    Route::get('/program/donasi/{id}', [App\Http\Controllers\ProgramController::class, 'donasi'])->name('program.donasi');

    Route::get('/program/publish/{id}', [App\Http\Controllers\ProgramController::class, 'publish'])->name('program.publish');
    Route::get('/program/unpublish/{id}', [App\Http\Controllers\ProgramController::class, 'unpublish'])->name('program.unpublish');

    Route::get('/programinfo/{id}', [App\Http\Controllers\ProgramInfoController::class, 'index'])->name('programinfo.index');
    Route::get('/programinfo/{id}/create', [App\Http\Controllers\ProgramInfoController::class, 'create'])->name('programinfo.create');
    Route::post('/programinfo/{id}/store', [App\Http\Controllers\ProgramInfoController::class, 'store'])->name('programinfo.store');
});

Route::get('/program/show/{id}', [App\Http\Controllers\ProgramController::class, 'show'])->name('umum.program.show');
Route::get('/program/amal/{id}', [App\Http\Controllers\ProgramController::class, 'amal'])->name('umum.program.amal');
Route::post('/programdonatur', [App\Http\Controllers\ProgramDonaturController::class, 'store'])->name('umum.donatur.store');
Route::get('/programdonatur/{id}', [App\Http\Controllers\ProgramDonaturController::class, 'show'])->name('umum.donatur.show');

Route::get('/kalkulatorzakat', [App\Http\Controllers\KalkulatorZakatController::class, 'index'])->name('umum.kalkulatorzakat');

Route::post('/kalkulatorzakat/tambahzakat', [App\Http\Controllers\KalkulatorZakatController::class, 'tambahzakat'])->name('umum.tambahzakat');
Route::get('/kalkulatorzakat/semuazakat', [App\Http\Controllers\KalkulatorZakatController::class, 'semuazakat'])->name('umum.semuazakat');
Route::post('/cart/tambahprogram', [App\Http\Controllers\CartController::class, 'tambahprogram'])->name('umum.tambahprogram');

Route::get('/cart/destroy/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->name('umum.destroyprogram');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'show'])->name('umum.cart.show');
Route::get('/pembayaran', [App\Http\Controllers\CartController::class, 'pembayaran'])->name('umum.cart.pembayaran');
Route::post('/pembayaran', [App\Http\Controllers\InvoiceController::class, 'store'])->name('umum.invoice.store');
Route::get('/invoice/{id}/{token}', [App\Http\Controllers\InvoiceController::class, 'show'])->name('umum.invoice.show');
Route::post('/invoice/{id}/{token}/bukti', [App\Http\Controllers\InvoiceController::class, 'uploadbukti'])->name('umum.invoice.uploadbukti');
Route::get('/invoice/{id}/{token}/cek', [App\Http\Controllers\InvoiceController::class, 'cek'])->name('umum.invoice.cek');

Route::get('/zakat', [App\Http\Controllers\ProgramController::class, 'zakatall'])->name('umum.program.zakatall');
Route::get('/amal', [App\Http\Controllers\ProgramController::class, 'amalall'])->name('umum.program.amalall');

Route::get('/snaptoken', [App\Http\Controllers\SnapController::class, 'token'])->name('midtrans.snap');

route::get('/brawrawrb', function () {
    return Artisan::call('migrate');
});

Route::get('/aramoroia', [App\Http\Controllers\ConsumeApiController::class, 'cektransfer']);

Route::post('/salurkanotomatis', [App\Http\Controllers\ProgramController::class, 'salurkanotomatis'])->name('umum.salurkanotomatis');

Route::get('/mailable', function () {
    $invoice = App\Models\Invoice::find(42);

    return new App\Mail\InvoiceSelesaiMail($invoice);
});
