<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Auth;
use App\Transaction;
use Mail;
use App\Mail\CheckoutMail;

class CheckoutController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(){
        $carts = Cart::where('user_id', Auth::user()->id);
        $cartsUser = $carts->get();

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id
        ]);

        foreach($cartsUser as $cart){
            $transaction->detail()->create([
                'product_id' => $cart->product_id,
                'qty' => $cart->qty
            ]);
        }
        Mail::to($carts->first()->user->email)->send(new CheckoutMail($cartsUser));

        Cart::where('user_id', Auth::user()->id)->delete();
        return redirect('/');
    }

}
