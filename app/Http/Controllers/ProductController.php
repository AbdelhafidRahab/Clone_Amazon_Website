<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Address;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($product_title)
    {
        return view('product_show')->with([
            'categories' => app(CategoryController::class)->all(),
            'random_products' => app(ProductController::class)->random(),
            'product' => Product::where('title', str_replace('@', '/',str_replace('_', ' ', $product_title)))->first(),
            'user' => User::where('id', session('loginID'))->first()? User::where('id', session('loginID'))->first() : null,
            'address' => Address::where('user_id', session('loginID'))->first() ? Address::where('user_id', session('loginID'))->first() : null
        ]);
    }

    public function random()
    {
        $random_products = Product::inRandomOrder()->limit(8)->get();
        return $random_products;
    }

    public function cart() {
        return view('cart')->with([
            'categories' => app(CategoryController::class)->all(),
            'random_products' => app(ProductController::class)->random(),
            'user' => User::where('id', session('loginID'))->first()? User::where('id', session('loginID'))->first() : null,
            'address' => Address::where('user_id', session('loginID'))->first() ? Address::where('user_id', session('loginID'))->first() : null
        ]);
    }

}
