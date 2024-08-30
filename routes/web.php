<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CheckoutController;

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\AlreadyLogedIn;

use App\Models\User;
use App\Models\Address;


Route::get('/', function () {
    return view('home')->with([
        'categories' => app(CategoryController::class)->all(),
        'random_products' => app(ProductController::class)->random(),
        'user' => User::where('id', session('loginID'))->first()? User::where('id', session('loginID'))->first() : null,
        'address' => Address::where('user_id', session('loginID'))->first() ? Address::where('user_id', session('loginID'))->first() : null
    ]);
});


Route::get('/c/{category_name}', [CategoryController::class, 'index']);


Route::get('/p/{product_title}', [ProductController::class, 'index']);


Route::get('/address', [AddressController::class, 'index'])->middleware(AuthCheck::class);
Route::get('/address/add', [AddressController::class, 'add'])->middleware(AuthCheck::class);
Route::post('/address/add/done', [AddressController::class, 'add_done'])->middleware(AuthCheck::class);
Route::post('/address/remove', [AddressController::class, 'remove'])->middleware(AuthCheck::class);


Route::get('/login', [AuthController::class, 'login'])->middleware(AlreadyLogedIn::class);
Route::post('/login/done', [AuthController::class, 'login_done'])->middleware(AlreadyLogedIn::class);
Route::get('/register', [AuthController::class, 'register'])->middleware(AlreadyLogedIn::class);
Route::post('/register/done', [AuthController::class, 'register_done'])->middleware(AlreadyLogedIn::class);
Route::get('/logout', [AuthController::class, 'logout'])->middleware(AuthCheck::class);


Route::get('/account', [AccountController::class, 'index'])->middleware(AuthCheck::class);
Route::get('/account/manage', [AccountController::class, 'profile'])->middleware(AuthCheck::class);
Route::post('/account/manage/update_info', [AccountController::class, 'update_info'])->middleware(AuthCheck::class);
Route::post('/account/manage/update_password', [AccountController::class, 'update_password'])->middleware(AuthCheck::class);
Route::post('/account/manage/destroy', [AccountController::class, 'destroy'])->middleware(AuthCheck::class);


Route::get('/cart', [ProductController::class, 'cart']);

Route::get('/checkout', [CheckoutController::class, 'index'])->middleware(AuthCheck::class);
Route::post('/checkout', [CheckoutController::class, 'store'])->middleware(AuthCheck::class);
Route::post('/checkout/update', [CheckoutController::class, 'update'])->middleware(AuthCheck::class);

Route::get('/checkout_success', [CheckoutController::class, 'checkout_success'])->middleware(AuthCheck::class);
