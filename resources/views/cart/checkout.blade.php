@extends('layouts.app')

@section('content')
    <div id="cart">
        <div class="container align1">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-4 po">
                    <h2>Checkout</h2>
                    <h4>Your total {{$total}} euro</h4>
                    <div id="charge-error" class="alert alert-danger {{!Session::has('error') ? 'hidden' : ''}}">
                        {{Session::get('error')}}
                    </div>
                    <form action="{{route('checkout.post')}}" method="POST" id="payment-form">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="card-name">Card Holder Name</label>
                                    <input type="text" id="card-name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="card-number">Credit Card Number</label>
                                    <input type="text" id="card-number" data-stripe="number" class="form-control"
                                           required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="card-expiry-month">Expiration Month</label>
                                    <input type="text" id="card-expiry-month" data-stripe="exp_month"
                                           class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="card-expiry-year">Expiration Year</label>
                                    <input type="text" id="card-expiry-year" data-stripe="exp_year" class="form-control"
                                           required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="card-cvc">CVC</label>
                                    <input type="text" id="card-cvc" data-stripe="cvc" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-success submit" value="Submit Payment">
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('script')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        Stripe.setPublishableKey('pk_test_ZTN4xA37hxth5pfgiQzYDBir');
    </script>
    <script type="text/javascript" src="{{URL::to('/js/checkout.js')}}"></script>

@endsection