@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-4">
                <h2>Checkout</h2>
                <h4>Your total {{$total}} euro</h4>
                <div  id="charge-error" class="alert alert-danger {{!Session::has('error') ? 'hidden' : ''}}" >
                    {{Session::get('error')}}
                </div>
                <form action="{{route('checkout')}}" method="post" id="checkout-form">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="address">ADDRESS</label>
                                <input type="text" id="address" class="form-control" required>
                            </div>
                        </div>
                        <hr>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-name">Card Holder Name</label>
                                <input type="text" id="card-name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-number">Credit Card Number</label>
                                <input type="text" id="card-number" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-expiry-month">Expiration Month</label>
                                <input type="text" id="card-expiry-month" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-expiry-year">Expiration Year</label>
                                <input type="text" id="card-expiry-year" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-cvc">CVC</label>
                                <input type="text" id="card-cvc" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-success">Pay Now</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="{{URL::to('js/checkout.js')}}"></script>

@endsection