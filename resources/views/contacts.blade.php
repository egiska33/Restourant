@extends('layouts.app')

@section('content')
    <section id="contact">
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2306.771080336585!2d25.284530015348263!3d54.678457481798475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd941575768b55%3A0xece92d70c8bd71fe!2zUm90dcWhxJdzIGEuLCBWaWxuaXVz!5e0!3m2!1slt!2slt!4v1496329139567"
                    width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner contact">
                        <!-- Form Area -->
                        <div class="contact-form">
                            <!-- Form -->
                            <form id="contact-us" method="post" action="{{ route('message.store') }}">
                            {{ csrf_field() }}
                            <!-- Left Inputs -->
                                <div class="col-md-6 ">
                                    <!-- Name -->
                                    <input type="text" name="name" id="name" required="required" class="form"
                                           placeholder="Name"/>
                                    <!-- Email -->
                                    <input type="email" name="email" id="email" required="required" class="form"
                                           placeholder="Email"/>
                                    <!-- Subject -->
                                    <input type="text" name="subject" id="subject" required="required" class="form"
                                           placeholder="Subject"/>
                                </div><!-- End Left Inputs -->
                                <!-- Right Inputs -->
                                <div class="col-md-6">
                                    <!-- Message -->
                                    <textarea name="message" id="message" class="form textarea"
                                              placeholder="Message"></textarea>
                                </div><!-- End Right Inputs -->
                                <!-- Bottom Submit -->
                                <div class="relative fullwidth col-xs-12">
                                    <!-- Send Button -->
                                    <button type="submit" id="submit" name="submit" class="form-btn">Send Message
                                    </button>
                                </div><!-- End Bottom Submit -->
                                <!-- Clear -->
                                <div class="clear"></div>
                            </form>
                        </div><!-- End Contact Form Area -->
                    </div><!-- End Inner -->
                </div>
            </div>
        </div>
    </section>
@endsection