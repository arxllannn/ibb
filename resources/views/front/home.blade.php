@extends('front.app')
@section('title') Infinity Business Brokers | Home @endsection
@section('content')
<section class="w3l-main-slider banner-slider" id="home">
        <div class="owl-one owl-carousel owl-theme">

        <div class="item">
                <div class="slider-info banner-view banner-top4">
                    <div class="container">
                        <div class="banner-info header-hero-19">
                            <p class="w3hny-tag">YOUR SUCCESS, OUR PRIORITY</p>
                            <h3 class="title-hero-19">Sell Your Business With Confidence</h3>
                            <p class="w3ban-para">Take advantage of our dedication, attention to detail and deep knowledge to get your business
                            sold <span class="w3-xtrap"></span> </p>
                            <!-- <a href="about.html" class="btn btn-style btn-primary mt-sm-5 mt-4">Read More <i class="fas fa-angle-double-right ms-2"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="slider-info banner-view banner-top1">
                    <div class="container">
                        <div class="banner-info header-hero-19">
                            <p class="w3hny-tag">Your Future, Our Commitment</p>
                            <h3 class="title-hero-19">Buy A Business That Matches Your Vision</h3>
                            <p class="w3ban-para">Get the right business opportunity with our expert guidance<span class="w3-xtrap"></span> </p>
                            <!-- <a href="about.html" class="btn btn-style btn-primary mt-sm-5 mt-4">Read More <i class="fas fa-angle-double-right ms-2"></i></a> -->

                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="slider-info banner-view banner-top2">
                    <div class="container">
                        <div class="banner-info header-hero-19">
                            <p class="w3hny-tag">YOUR AMBITION, OUR SUPPORT</p>
                            <h3 class="title-hero-19">Visa Services For Global Entrepreneurs</h3>
                            <p class="w3ban-para">Empowering your journey to success with tailored solutions<span class="w3-xtrap"></span> </p>
                            <!-- <a href="about.html" class="btn btn-style btn-primary mt-sm-5 mt-4">Read More <i class="fas fa-angle-double-right ms-2"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="slider-info banner-view banner-top5">
                    <div class="container">
                        <div class="banner-info header-hero-19">
                            <p class="w3hny-tag">YOUR DREAM, OUR MISSION</p>
                            <h3 class="title-hero-19">Find Franchise Opportunities That Meet Your Goals</h3>
                            <p class="w3ban-para">Explore your franchise options with our dedicated team<span class="w3-xtrap"></span> </p>
                            <!-- <a href="about.html" class="btn btn-style btn-primary mt-sm-5 mt-4">Read More <i class="fas fa-angle-double-right ms-2"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="slider-info banner-view banner-top3">
                    <div class="container">
                        <div class="banner-info header-hero-19">
                            <p class="w3hny-tag"> YOUR GROWTH, OUR EXPERTISE</p>
                            <h3 class="title-hero-19"> Invest In A Business, Or Create A Partnership</h3>
                            <p class="w3ban-para">Find creative opportunities with our expert help <span class="w3-xtrap"></span> </p>
                            <!-- <a href="about.html" class="btn btn-style btn-primary mt-sm-5 mt-4">Read More <i class="fas fa-angle-double-right ms-2"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
            


            
        </div>
        {{--<!-- /home-page-video-popup-->
        <div class="w3l-stats-section stats-con mt-5">
            <div class="stats_info counter_grid ps-0">
                <p class="counter">350</p>
                <h3>Happy Clients</h3>
            </div>
            <div class="stats_info counter_grid">
                <p class="counter">10</p>
                <h3>Businesses</h3>
            </div>

        </div>
          <!-- //home-page-video-popup-->--}}

    </section>
    <!-- //main-slider -->
    <!--/grids-->
    <section class="w3l-grids-3 py-5" id="about">
        <div class="container py-md-5 py-3">
            <div class="bottom-ab-grids align-items-center">
                <div class="w3ab-left-top">
                    <h6 class="title-subw3hny mb-1"></h6>
                    <h3 class="title-w3l mb-2">{{$value6->value}}</h3>
                    <p class="my-3 mb-5 px-lg-5">{{$value7->value}}</p>

                   
                    <div class=" mt-3" id="video">
    <div class="position-relative">
        <a href="#small-dialog" class="popup-with-zoom-anim play-view text-center position-absolute">
            
        </a>
        <!-- Dialog itself, mfp-hide class is required to make dialog hidden -->
        
            <video width="100%" controls>
                <source src="{{url('/front')}}/assets/Infinity Business Brokers (intro).mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        
    </div>
</div>
                </div>
            </div>
        </div>
    </section>
    <!--//grids-->

    <!--/w3-grids-->
    <section class="w3l-passion-mid-sec home-phny ">
        <div class="container py-md-5 py-3">
            <div class="container">
                <div class="row w3l-passion-mid-grids">
                    <div class="col-lg-6 passion-grid-item-info pe-lg-5 mb-lg-0 mb-5">
                       
                        <h3 class="title-w3l mb-4">{{$value8->value}}</h3>
                        <p class="mt-3 pe-lg-5">{{$value9->value}}</p>

                    </div>
                    <div class="col-lg-6 w3hny-passion-item">
                        <div class="row">
                            <div class="col-6 passion-grid-item-pic">
                                <img src="{{url('/front')}}/assets/images/ab1.jpg" alt="" class="img-fluid radius-image">
                            </div>
                            <div class="col-6 passion-grid-item-pic">
                                <img src="{{url('/front')}}/assets/images/ab2.jpg" alt="" class="img-fluid radius-image">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//w3-grids-->
    <!-- features section -->
    <section class="w3l-features py-5" id="work">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="title-content text-center mb-lg-3 mb-4">
                <h6 class="title-subw3hny mb-1">What We Do</h6>
                <h3 class="title-w3l">Guiding Your
                Entrepreneurial Journey Into The Future</h3>
            </div>
            <div class="main-cont-wthree-2">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-pen-fancy"></i>
                            </div>
                            <h4><a href="#" class="title-head mb-3">{{$value10->value}}</a></h4>
                            <p class="text-para">{{$value11->value}}</p>
                        </div>
                        
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-layer-group"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">{{$value12->value}}</a></h4>
                            <p class="text-para">{{$value13->value}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-luggage-cart"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">{{$value14->value}}</a></h4>
                            <p class="text-para">{{$value15->value}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-cont-wthree-2">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-pen-fancy"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">{{$value16->value}}</a></h4>
                            <p class="text-para">{{$value17->value}} </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-layer-group"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">{{$value18->value}}</a></h4>
                            <p class="text-para">{{$value19->value}} </p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!--//features section -->
    
    <!--/w3-grids-->
    <section >
        <div class="container py-md-5 py-3">
            <div class="container">
                <div class="row w3l-passion-mid-grids">
                    <div class="col-lg-6 passion-grid-item-info pe-lg-5 mb-lg-0 mb-5">
                        <h6 class="title-subw3hny mb-1"></h6>
                        <h3 class="title-w3l mb-4">{{$value20->value}}</h3>
                        <p class="mt-3 pe-lg-5">{{$value21->value}}</p>
                        <div class="w3banner-content-btns">
                            <!-- <a href="about.html" class="btn btn-style btn-primary mt-lg-5 mt-4 me-2">Read More <i class="fas fa-angle-double-right ms-2"></i></a> -->
                        </div>
                    </div>
                    <div class="col-lg-6 passion-grid-item-info">
                        <img src="{{url('/front')}}/assets/images/g3.jpg" alt="" class="img-fluid radius-image">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--//w3-grids-->

    <!--/w3l-subscribe-content-->
    <section class="w3l-join-main py-5">
    <div class="container py-md-5">
        <div class="w3l-project-in">
            <div class="row">
                <div class="col-lg-6">
                    <div class="bottom-info">
                        <div class="header-section pe-lg-5">
                            <h5 class="title-subw3hny mb-2">JOIN US</h5>
                            <h3 class="title-w3l two mb-2">Stay Updated!</h3>
                            <p>Subscribe to stay in the know with tips and updates</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 w3l-subscribe-content align-self mt-lg-0 mt-5">
                

                    <form action="{{ route('subscriber.store') }}" method="post" class="subscribe-wthree">
                        @csrf
                        <div class="flex-wrap subscribe-wthree-field">
                            <input class="form-control" type="email" placeholder="Email" name="email" required="">
                            <button class="btn btn-style btn-primary" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
    <!--//w3l-subscribe-content-->
    <!--/testimonials-->
    <section class="w3l-testimonials" id="testimonials">
        <!-- /grids -->
        <div class="cusrtomer-layout py-5">
            <div class="container py-lg-4 py-md-3 py-2 pb-lg-0">

                <div class="title-content text-center">
                    <h6 class="title-subw3hny">TestimTestimonials and Recommendations
                    </h6>
                    <h3 class="title-w3l mb-5">What Our Clients Have To Say</h3>
                </div>
                <!-- /grids -->
                <div class="testimonial-width pt-lg-4">
                    <div id="owl-demo1" class="owl-two owl-carousel owl-theme">
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <!-- <div class="test-img"><img src="{{url('/front')}}/assets/images/team1.jpg" class="img-fluid" alt="client-img">
                                    </div> -->
                                    <blockquote>
                                        <i class="fas fa-quote-right"></i>
                                        <q>“I have worked with Michael Monnot on several occasions handling closings on the sale of a
business. His follow up for all details and precision in his communications sets him apart from
other business brokers with whom I have worked. A true professional in every sense of the
word”</q>
                                    </blockquote>
                                    <div class="testi-des">
                                        <div class="peopl align-self">
                                            <h3>G.R. - Attorney, Bonita Springs</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <!-- <div class="test-img"><img src="{{url('/front')}}/assets/images/team2.jpg" class="img-fluid" alt="client-img">
                                    </div> -->
                                    <blockquote>
                                        <i class="fas fa-quote-right"></i>
                                        <q>We sold our business through Michael Monnot in 2010 and found the experience to be head
and shoulders above the typical business broker experience. The difference was in his
experience and professionalism. He strived to build a relationship, not just make a sale. He
personally previewed and pre-qualified every potential buyer presented to us. We highly
recommend Michael as a broker.
                                        </q>
                                    </blockquote>
                                    <div class="testi-des">
                                        <div class="peopl align-self">
                                            <h3>J.G. - Fort Myers</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <!-- <div class="test-img"><img src="{{url('/front')}}/assets/images/team3.jpg" class="img-fluid" alt="client-img">
                                    </div> -->
                                    <blockquote>
                                        <i class="fas fa-quote-right"></i>
                                        <q> 
                                        Michael Monnot - Always goes above and beyond the call of duty. Has helped me many times
and even with items not related to buying or selling a business. Also, the only broker who would
help me while I was in Afghanistan and was the reason I was able to resign from the
government and become a business owner</q>
                                    </blockquote>
                                    <div class="testi-des">
                                        <div class="peopl align-self">
                                            <h3>E.C.</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <div class="test-img"><img src="{{url('/front')}}/assets/images/team4.jpg" class="img-fluid" alt="client-img">
                                    </div>
                                    <blockquote>
                                        <i class="fas fa-quote-right"></i>
                                        <q>
                                        Selling or purchasing a business is a big decision. It’s important to get the right people involved.Infinity Brokers team is trustworthy & knowledgeable.If you are looking for a business broker, I highly recommend them..</q>
                                    </blockquote>
                                    <div class="testi-des">
                                        <div class="peopl align-self">
                                            <h3>Daniel Witt - Business Owner</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
               
                      
                    </div>
                </div>
            </div>
            <!-- /grids -->
        </div>
        <!-- //grids -->
    </section>
    <!--//testimonials-->
@endsection