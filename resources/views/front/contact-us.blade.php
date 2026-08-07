@extends('front.app')
@section('title') Infinity Business Brokers | Contact US @endsection
@section('content')
<!--/inner-page-->
<div class="inner-banner py-5">
    <section class="w3l-breadcrumb text-left py-sm-5 ">
        <div class="container">
            <div class="w3breadcrumb-gids">
                <div class="w3breadcrumb-left text-left">
                    <h2 class="inner-w3-title mt-sm-5 mt-4">
                        Contact Us </h2>
                </div>
                <div class="w3breadcrumb-right">
                    <ul class="breadcrumbs-custom-path">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active"><span class="fas fa-angle-double-right mx-2"></span> Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
<!--//inner-page-->
<!-- contact-form -->
<section class="w3l-contact-main" id="contact">
    <div class="contact-infhny py-5 pb-0">
        <div class="container py-lg-3 pb-0">
            <div class="top-map">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="map-content-9">
                <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
                    <form action="{{ route('message.store') }}" method="POST">

                        @csrf
                       
                        <div class="form-top1">
                            <div class="w3header-section text-center">
                                <!-- <h5 class="title-subw3hny">Get In Touch</h5> -->
                                <h5 class="title-w3l mb-0">Get In Touch </h5>
                                <br/>
                                <!-- <h5 class="title-w3l mb-0">{{$value1->value}} </h5> -->
                                <!-- <p class="mb-lg-5 mb-4 text-center">{{$value2->value}}</p> -->
                            </div>

                            <div class="form-top">
    <div class="form-top-left">
        <input type="text" name="name" placeholder="Name*" value="{{ old('name') }}" required>
        <input type="text" name="phone" placeholder="Your phone number" value="{{ old('phone') }}">
        <input type="email" name="email" placeholder="Email*" value="{{ old('email') }}" required>
        <input type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}">
    </div>
    <div class="form-top-right">
        <textarea name="message" placeholder="Message" required>{{ old('message') }}</textarea>
    </div>
</div>

<!-- Add the reCAPTCHA widget -->
<div class="form-group mt-3">
    {!! NoCaptcha::renderJs() !!}
    {!! NoCaptcha::display() !!}
</div>

<div class="text-lg-right text-center">
    <button type="submit" class="btn btn-style btn-primary">
        Submit Now <i class="fas fa-paper-plane ms-2"></i>
    </button>
</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //contact-form -->
<!-- contact-form -->
<section class="w3l-contact-main py-5" id="contact2">
    <div class="container py-md-4 py-3">
        <div class="w3l-contact-info top-map">
            <div class="row contact-infos justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single-contact-infos">
                        <div class="icon-box"> <span class="fas fa-map-marked-alt"></span></div>
                        <div class="text-box">
                            <h3 class="mb-2">Our Location</h3>
                            <p style="font-size:15px">{{$value3->value}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                    <div class="single-contact-infos">
                        <div class="icon-box"> <span class="fas fa-phone-alt"></span></div>
                        <div class="text-box">
                            <h3 class="mb-2">Phone</h3>
                            <p style="font-size:15px"><a href="tel:+12 404-11-22-89">{{$value4->value}}</a></p>
                            <!-- <p><a href="tel:+12 404-11-22-99">888.816.5564 Fax</a></p> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-7 mt-lg-0 mt-4">
                    <a href="mailto:mike@InfinityBusinessBrokers.com">
                    <div class="single-contact-infos">
                        <div class="icon-box"> <span class="fas fa-envelope-open-text"></span></div>
                        <div class="text-box">
                            <h3 class="mb-2">Email</h3>
                            <center><p style="font-size:15px"> {{$value5->value}}</p></center>
                            
                            <!-- <p> <a href="mailto:support@gmail.com">support@gmail.com</a></p> -->
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- contact map -->
<section class="w3l-contact-main" id="contact">
    <div class="map">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1130164.365345385!2d-83.11123034282512!3d27.638649284067136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88c3607f8f4cf919%3A0xb8338e986cf4da26!2sWest%20Coast%20of%20Florida!5e0!3m2!1sen!2sus!4v1570181661801!5m2!1sen!2sus" 
       
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy">
    </iframe>
    </div>
</section>
<!-- //contact map -->

@endsection