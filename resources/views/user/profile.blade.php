@extends('layouts.app')

@section('content')
<div id="user_profile">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>User Profile</h1>
                <hr>
                <h2>My Orders</h2>
                @foreach($orders as $order)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <ul class="list-group">
                                @foreach($order->cart->items as $item)
                                    <li class="list-group-item">
                                        <span class="badge">{{$item['price']}} eur</span>
                                        {{ $item['item']['title'] }} | {{ $item['qty'] }} Units
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <strong>Total Price: {{$order->cart->totalPrice}}</strong>
                        </div>
                    </div>
                @endforeach
                <hr>
                <h2>My Reservations</h2>
                @foreach($reservations as $reservation)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <ul class="list-group-item">
                                <li class="list-group-item">{{$reservation->date}} | {{$reservation->time}}</li>
                                <li class="list-group-item">Person: {{$reservation->person_count}}</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection