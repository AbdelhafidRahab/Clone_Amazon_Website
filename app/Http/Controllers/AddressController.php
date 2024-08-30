<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;

use Illuminate\Http\Request;



class AddressController extends Controller
{
    public function index() {
        return view('address.index')->with([
            'categories' => app(CategoryController::class)->all(),
            'random_products' => app(ProductController::class)->random(),
            'user' => User::where('id', session('loginID'))->first(),
            'addresses' => Address::where('user_id', session('loginID'))->get(),
            'address' => Address::where('user_id', session('loginID'))->first()
        ]);
    }

    public function add() {
        return view('address.add')->with([
            'categories' => app(CategoryController::class)->all(),
            'random_products' => app(ProductController::class)->random(),
            'user' => User::where('id', session('loginID'))->first(),
            'address' => Address::where('user_id', session('loginID'))->first()
        ]);
    }

    public function add_done(Request $request) {

        $address = new Address();
        
        $address->user_id = session('loginID');
        $address->addr1 = $request->addr1;
        $address->addr2 = $request->addr2;
        $address->city = $request->city;
        $address->postcode = $request->postcode;
        $address->country = $request->country;

        $res = $address->save();
        if ($res) {
            return redirect(url('/address'))->with('success','Added successfully.');
        } else {
            return back()->with('fail','Something is wrong, try again');
        }
    }

    public function remove(Request $request) {
        $address = Address::where('id',$request->id)->first();
        if($address->user_id == session('loginID')) {
            $address->delete();
        }
        return redirect('/address');
    }
}
