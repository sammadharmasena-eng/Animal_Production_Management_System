<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\FarmerAuthController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\PaymentController;



// General Auth Routes
Route::get('/', [AuthController::class, 'showLoginRegister'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', [AuthController::class, 'home'])->name('home')->middleware('auth');
Route::get('/about', [AuthController::class, 'about'])->name('about');
Route::get('/record', [AuthController::class, 'record'])->name('record');
Route::get('/product', [AuthController::class, 'product'])->name('product');
Route::get('/sales', [AuthController::class, 'sales'])->name('sales');


// Farmer login from record page
Route::post('/record/farmer-login', [FarmerAuthController::class, 'loginFromRecord']) 
    ->name('farmer.login.submit.from.record');

// Farmer-only routes (must be logged in with 'farmer' guard)
Route::middleware(['auth:farmer'])->group(function () {

    Route::get('/records/create', [RecordController::class, 'create'])->name('records.create');
    Route::post('/farmer/logout', [FarmerAuthController::class, 'logout'])->name('farmer.logout');



});

Route::middleware(['auth'])->group(function () {
    Route::post('/records/store', [RecordController::class, 'store'])->name('records.store');

Route::get('/records/create', [RecordController::class, 'create'])->name('records.create');
Route::post('/records', [RecordController::class, 'store'])->name('records.store');


Route::post('/buy-product', [ProductController::class, 'buyProduct'])->name('buy.product');
Route::post('/buy', [ProductController::class, 'buyProduct'])->name('buy.product');
Route::get('/sales-form', [ProductController::class, 'showSalesForm'])->name('sales.form');
Route::post('/sales-submit', [ProductController::class, 'submitSale'])->name('sales.submit');


Route::post('/stripe-payment', [PaymentController::class, 'processpayment'])->name('stripe.payment');



Route::get('/payment', [PaymentController::class, 'showForm'])->name('payment.form');
Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payment.process');



});