<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <!-- <script type="text/javascript">!function(){var b=function(){window.__AudioEyeSiteHash = "90331b922ab3cbeea277b635da56b46e"; var a=document.createElement("script");a.src="https://wsmcdn.audioeye.com/aem.js";a.type="text/javascript";a.setAttribute("async","");document.getElementsByTagName("body")[0].appendChild(a)};"complete"!==document.readyState?window.addEventListener?window.addEventListener("load",b):window.attachEvent&&window.attachEvent("onload",b):b()}();</script> -->
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta_description', 'A brief description of your website goes here')">
    <meta name="keywords" content="Business, Brokers, Infinity Business Brokers">
    <title>@yield('title') </title>
    @stack('meta')
    @include('front.layouts.partials.css-links')
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/theme')}}/assets/images/ibb.png">
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-9DL4Z6G7BH"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-9DL4Z6G7BH');
</script>
<body><script src="https://cdn.userway.org/widget.js" data-account="Edpi9FG2vO"></script>
    <!--/Header-->
    <header  id="site-header" class="fixed-top">
        <div class="container">
            <nav  class="navbar navbar-expand-lg navbar-light stroke py-lg-0">
                <h1><a style="font-size: 25px;" class="navbar-brand" href="{{route('home')}}">

                        <img class="client-logo" src="{{url('/theme')}}/assets/images/ibb.png">&nbsp;&nbsp;<span >Infinity Busi</span>ness Brokers
                    </a></h1>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>
                <div  class="collapse navbar-collapse" id="navbarScroll">
                    <ul  class="navbar-nav mx-lg-auto my-2 my-lg-0 navbar-nav-scroll">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('business-search') ? 'active' : '' }}" aria-current="page" href="{{ route('business-search') }}">Business Search</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('sell.business', 'buy.business', 'business-evaluation', 'visa-services', 'franchise') ? 'active' : '' }}"
                                href="#Pages" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Services <span class="fa fa-angle-down ms-1"></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item {{ request()->routeIs('sell.business') ? 'active' : '' }}" href="{{ route('sell.business') }}">Sell A Business</a></li>
                                <li><a class="dropdown-item {{ request()->routeIs('buy.business') ? 'active' : '' }}" href="{{ route('buy.business') }}">Buy A Business</a></li>
                                <li><a class="dropdown-item {{ request()->routeIs('business-evaluation') ? 'active' : '' }}" href="{{ route('business-evaluation') }}">Business Evaluation</a></li>
                                <li><a class="dropdown-item {{ request()->routeIs('visa-services') ? 'active' : '' }}" href="{{ route('visa-services') }}">Visa</a></li>
                                <li><a class="dropdown-item {{ request()->routeIs('franchise') ? 'active' : '' }}" href="{{ route('franchise') }}">Franchise</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('about', 'team', 'resources') ? 'active' : '' }}"
                                href="#Pages" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                About us <span class="fa fa-angle-down ms-1"></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a></li>
                                <li><a class="dropdown-item {{ request()->routeIs('team') ? 'active' : '' }}" href="{{ route('team') }}">Our Team</a></li>
                                <!-- <li><a class="dropdown-item {{ request()->routeIs('resources') ? 'active' : '' }}" href="{{ route('resources') }}">Resources</a></li> -->
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}" href="{{ route('blog') }}">Articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contactus') ? 'active' : '' }}" href="{{ route('contactus') }}">Contact us</a>
                        </li>
                    </ul>
                    <!--/search-->
                    <button id="trigger-overlay" style="position:relative;left:100px;color:aliceblue;border:none;" class="btn btn-primary " type="button">Stay Updated</button>
                    <!-- open/close -->
                    <div class="overlay overlay-slidedown">
                        <button type="button" class="overlay-close"><i class="fas fa-times"></i></button>
                        <nav class="w3l-formhny">
                            <form action="{{ route('subscriber.store') }}" method="POST" class="d-sm-flex search-header">
                                @csrf
                                <input class="form-control me-2" type="email" placeholder="Email" name="email" aria-label="email" required>
                                <button class="btn btn-style btn-secondary me-lg-3" type="submit">Subscribe</button>
                            </form>
                        </nav>
                    </div>
                    <!--//search-->
                </div>
                <!-- toggle switch for light and dark theme -->
                <!-- <div class="mobile-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div> -->
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
    <!--//Header-->
    @yield('content')
    <!-- main-slider -->
    <!--/footer-9-->
    <footer class="w3l-footer9">
        <section class="footer-inner-main py-5">
            <div class="container py-md-3">
                <div class="right-side">
                    <div class="row footer-hny-grids sub-columns">
                        <div class="col-lg-3 sub-one-left">
                            <h6>Contact Us </h6>
                            <p class="footer-phny pe-lg-5">9040 Town Center Parkway
                                Lakewood Ranch, FL 34202</p>
                            <p class="footer-phny pe-lg-5">941.518.7138
                                direct</p>
                            <p class="footer-phny pe-lg-5">888.816.5564
                                fax</p>
                            <div class="columns-2 mt-lg-5 mt-4">
                                <ul class="social">
                                    <li><a target="_blank" href="{{get_social_links('facebook')}}"><span class="fab fa-facebook-f"></span></a>
                                    {{-- <li><a href="{{get_social_links('linkedin')}}"><span class="fab fa-linkedin-in"></span></a></li> --}}
                                    <li><a target="_blank" href="{{get_social_links('twitter')}}"><span class="fa-brands fa-x-twitter"></span></a></li>
                                   {{-- <li><a href="{{get_social_links('google')}}"><span class="fab fa-google-plus-g"></span></a></li>  --}}

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 sub-two-right">
                            <h6>Services</h6>
                            <ul>
                                <li><a href="{{route('sell.business')}}"><i class="fas fa-angle-right"></i> Sell A Business</a></li>
                                <li><a href="{{route('buy.business')}}"><i class="fas fa-angle-right"></i> Buy A Business</a></li>
                                <li><a href="{{route('business-evaluation')}}"><i class="fas fa-angle-right"></i> Business Evaluation</a></li>
                                <li><a href="{{route('visa-services')}}"><i class="fas fa-angle-right"></i> Visa </a></li>
                                <li><a href="{{route('franchise')}}"><i class="fas fa-angle-right"></i> Franchise</a></li>
                            </ul>
                        </div>
                        <!--<div class="col-lg-3 sub-two-right">
                             <h6>Our Links</h6>
                            <ul>

                                <li><a href="#why"><i class="fas fa-angle-right"></i> Our Process</a>
                                </li>
                                <li><a href="#licence"><i class="fas fa-angle-right"></i> Our Team
                                    </a>
                                </li>
                                <li><a href="{{route('contactus')}}"><i class="fas fa-angle-right"></i> Contact Us
                                    </a></li>
                                <li><a href="#log"><i class="fas fa-angle-right"></i> Privacy Policy
                                    </a></li>
                                <li><a href="#career"><i class="fas fa-angle-right"></i> Terms and Conditions</a></li>

                            </ul> 
                        </div>-->
                        <div class="col-lg-6 sub-one-left">
                            <h6>Recent Posts </h6>
                            @foreach ($latestBlogs as $blog)
                            <div class="row fposts-grid-inner mb-4">
                                <div class="col-4 fposts-grid-left ps-0">
                                    <a href="{{ route('blog-single', $blog->slug) }}">
                                        <img  src="{{$blog->banner}}" class="img-fluid radius-image">
                                    </a>
                                </div>
                                <div class="col-8 fposts-grid-right">
                                    <h4>
                                        <a href="{{ route('blog-single', $blog->slug) }}" class="text-bl text-left">{{ $blog->title }}</a>
                                    </h4>
                                    <p class="time">{{ $blog->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="below-section mt-5">
                    <div class="copyright-footer">
                        <div class="columns text-left">
                            <p>© @php echo date('Y');  @endphp Infinity Business Brokers. All rights reserved.</p>
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <!-- Js scripts -->
        <!-- move top -->
        <button onclick="topFunction()" id="movetop" title="Go to top">
            <span class="fas fa-level-up-alt" aria-hidden="true"></span>
        </button>
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <!-- //move top -->
    </footer>
    @include('front.layouts.partials.js-links')

</body>

</html>