<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getProfile()
    {
        $orders = Auth::user()->orders;
        $reservations =Auth::user()->reservations;
        $orders->transform(function ($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('user.profile', compact(['orders', 'reservations']));
    }
}
