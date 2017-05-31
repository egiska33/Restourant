@extends('layouts.app')

@section('content')
    <section id="reservation" class="description_content">
        <div class="featured background_content">
            <h1>Reserve a Table!</h1>
        </div>
        <div class="text-content container">
            <div class="inner contact">
                <!-- Form Area -->
                <div class="contact-form">
                    <!-- Form -->
                    @if ($errors->count() > 0)
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form id="contact-us" action="{{ route('reservations.store') }}" method="post">
                    {{ csrf_field() }}
                    <!-- Left Inputs -->
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-md-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-xs-6">
                                            <!-- Name -->
                                            <input type="text" name="name" value="{{ $user->name }}" id="name"
                                                   required="required" class="form" placeholder="First Name"/>
                                            <input type="number" name="person_count" id="person_coount"
                                                   required="required" class="form" placeholder="How many person"/>
                                            <input type="text" name="phone" value="{{ $user->phone }}" id="phone"
                                                   required="required" class="form" placeholder="Phone"/>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-xs-6">
                                            <!-- Name -->
                                            <input type="email" name="email" id="email" required="required" class="form"
                                                   placeholder="Email"/>
                                            <input type="date" name="date" value="{{ old('date') }}" id="date"
                                                   required="required" class="form" placeholder="Date"/>
                                            <input type="datetime" name="time" id="time" required="required"
                                                   class="form" placeholder="Time"/>
                                        </div>

                                        <div class="col-xs-6 ">
                                            <!-- Send Button -->
                                            <button type="submit" id="submit" name="submit"
                                                    class="text-center form-btn form-btn">Reserve
                                            </button>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-xs-12">
                                    <!-- Message -->
                                    <div class="right-text">
                                        <h2>Hours</h2>
                                        <hr>
                                        <p>Monday to Friday: 12:00 PM - 5:00 PM</p>
                                        <p>Monday to Saturday: 6:00 PM - 1:00 AM</p>
                                        <p>Sunday to Monday: 5:30 PM - 12:00 AM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Clear -->
                        <div class="clear"></div>
                    </form>
                </div><!-- End Contact Form Area -->
            </div><!-- End Inner -->
        </div>

    </section>
@endsection