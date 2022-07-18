<?php

namespace App\Http\Controllers;

use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{


    public function checkout(){

        $amount = session()->get('cart')->totalPrice;
        return view('cart.checkout',compact('amount'));

    }

    public function charge(Request $request){
        //dd($request->stripeToken);
        $charge = Stripe::charges()->create([
            'currency' => 'USD',
            'source' => $request->stripeToken,
            'amount'   => '5000',
            'description' => ' Test from laravel new app'
        ]);
      //$amount = session()->get('cart')->totalPrice;


        if($charge['id']) {
            // save order in database

            // clear session
            session()->forget('cart');
            // redirect with success message
            return redirect()->route('product.index')->with('success','success payment');

        }else{
            return back();
        }
    }
}
