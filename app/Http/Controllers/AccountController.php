<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;

use Illuminate\Support\Facades\Hash;



class AccountController extends Controller
{
    public function index() {
        return view('account')->with([
            'categories' => app(CategoryController::class)->all(),
            'random_products' => app(ProductController::class)->random(),
            'user' => User::where('id', session('loginID'))->first(),
            'address' => Address::where('user_id', session('loginID'))->first()
        ]);
    }

    public function profile() {
        return view('manage')->with([
            'categories' => app(CategoryController::class)->all(),
            'random_products' => app(ProductController::class)->random(),
            'user' => User::where('id', session('loginID'))->first(),
            'address' => Address::where('user_id', session('loginID'))->first()
        ]);
    }

    public function update_info(Request $request) {
        User::where('id',session('loginID'))->update([
            'first_name'          => $request->first_name,
            'last_name'          => $request->last_name,
            'email'         => $request->email
        ]);

        return back();
    }

    public function update_password(Request $request) {
        $user = User::where('id',session('loginID'))->first();

        if(Hash::check($request->current_password,$user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);
        }else {
            return back()->with('fail','Your current password is wrong!');
        }
        return back();
    }

    public function destroy()
    {
        User::where('id',session('loginID'))->delete();
        session()->pull('loginID');
        return redirect('/');
    }
}
