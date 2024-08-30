<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;

use App\Models\User;
use App\Models\Address;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        $allCategories = Category::all();
        return $allCategories;
    }

    public function index($category_name)
    {
        $category = Category::where('name', str_replace('_', ' ', $category_name))->first();
        if($category) {
            return view('category')->with([
                'categories' => $this->all(),
                'random_products' => app(ProductController::class)->random(),
                'category' => $category,
                'products_of_this_category' => Product::where('category', $category->id)->get(),
                'user' => User::where('id', session('loginID'))->first()? User::where('id', session('loginID'))->first() : null,
                'address' => Address::where('user_id', session('loginID'))->first() ? Address::where('user_id', session('loginID'))->first() : null
            ]);
        }
        return abort(404);
    }

    
}
