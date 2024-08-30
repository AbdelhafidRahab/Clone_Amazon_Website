<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\User;
use App\Models\Address;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function index() {
        $stripe = new \Stripe\StripeClient('');

        $order = Order::where('user_id',session('loginID'))->where('payment_intent', null)->first();
        $intent = null;
        if(!is_null($order)) {
            $intent = $stripe->paymentIntents->create([
                'amount' => (int) $order->total,
                'currency' => 'usd',
                'payment_method_types' => ['card'],
            ]);
        }

        return view('checkout')->with([
            'categories' => app(CategoryController::class)->all(),
            'random_products' => app(ProductController::class)->random(),
            'user' => User::where('id', session('loginID'))->first()? User::where('id', session('loginID'))->first() : null,
            'address' => Address::where('user_id', session('loginID'))->first() ? Address::where('user_id', session('loginID'))->first() : null,
            'intent' => $intent,
            'order' => $order
        ]);
    }

    public function store(Request $request) {
        $res = Order::where('user_id',session('loginID'))->where('payment_intent', null)->first();

        if(!is_null($res)) {
            $res->total = $request->total;
            $res->total_decimal = $request->total_decimal;
            $res->items = json_encode($request->items);
            $res->save();
        }else {
            $order = new Order();

            $order->user_id = session('loginID');
            $order->total = $request->total;
            $order->total_decimal = $request->total_decimal;
            $order->items = json_encode($request->items);
            $order->save();
        }

        return redirect('/checkout');
    }
    
    public function update(Request $request) {
        $order = Order::where('user_id',session('loginID'))->where('payment_intent', null)->first();

        $order->payment_intent = $request['payment_intent'];
        $order->save();

        // Mail::to($request->user())->send(new OrderShipped($order));

        return redirect('/checkout_success');
    }

    public function checkout_success() {
        return view('checkout_success')->with([
            'categories' => app(CategoryController::class)->all(),
            'random_products' => app(ProductController::class)->random(),
            'user' => User::where('id', session('loginID'))->first()? User::where('id', session('loginID'))->first() : null,
            'address' => Address::where('user_id', session('loginID'))->first() ? Address::where('user_id', session('loginID'))->first() : null
        ]);
    }
}
