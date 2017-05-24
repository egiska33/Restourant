<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe\Stripe;
use Stripe\Charge;


class AddToCartController extends Controller
{

    /**
     * @param Request $request
     * @param $id
     */
    public function add(Request $request, $id)
   {
       $product = Product::findOrFail($id);
//       dd($product);
       $oldCart = Session::has('cart')  ? Session::get('cart') : null;
       $cart = new Cart($oldCart);
       $cart->add($product, $product->id);

       $request->session()->put('cart', $cart);
//       dd($request->session()->get('cart'));
       return redirect()->route('products.index');
   }

   public function getReduceByOne($id)
   {
       $oldCart = Session::has('cart')  ? Session::get('cart') : null;
       $cart = new Cart($oldCart);
       $cart->reduceByOne($id);

       Session::put('cart', $cart);
       return redirect()->to('shopingCart');
   }

   public function getCart()
   {
       if(! Session::has('cart')) {
           return view('cart.shopingCart');
       }
       $oldCart = Session::get('cart');
       $cart = new Cart($oldCart);
       return view('cart.shopingCart', ['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice, '']);
   }

   public function getCheckout()
   {
       if(! Session::has('cart')) {
           return view('cart.shopingCart');
       }
       $oldCart = Session::get('cart');
       $cart = new Cart($oldCart);
       $total = $cart->totalPrice;
       return view('cart.checkout',compact('total'));
   }



   public function postCheckout(Request $request)
   {;

            if(! Session::has('cart'))
            {
                return redirect()->to('shopingCart');
            }
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);

            Stripe::setApiKey('sk_test_RevFLPmDiKjfUmIF6m3f1ivo');



            try {
                $charge = Charge::create(array(
                    "amount" => $cart->totalPrice*100,
                    "currency" => "eur",
                    "source" => $request->get('stripeToken'), // obtained with Stripe.js
                    "description" => "Test Charge"
                 ));

                $order = new Order();
                $order->cart = serialize($cart);
                $order->payment_id = $charge->id;
//
                Auth::user()->orders()->save($order);
                 } catch (\Exception $e) {
                return redirect()->route('checkout')->with('error',  $e->getMessage());
            }

            Session::forget('cart');
            return redirect()->to('products')->with('message', 'Successfuly purchased');

   }
}
