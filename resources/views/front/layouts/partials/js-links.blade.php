  <!--//footer-9 -->

    <!-- Template JavaScript -->
    <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
    <script src="{{url('/front')}}/assets/js/jquery-3.3.1.min.js"></script>
    <script src="{{url('/front')}}/assets/js/theme-change.js"></script>
    <!--light-box-files -->
    <script src="{{url('/front')}}/assets/js/jquery-2.1.4.min.js"></script>
    <script src="{{url('/front')}}/assets/js/jquery.chocolat.js"></script>
    <script type="text/javascript ">
        $(function() {
            $('.w3_agile_portfolio_grid a').Chocolat();
        });

    </script>
    <!-- /js for portfolio lightbox -->
    <!-- stats number counter-->
    <script src="{{url('/front')}}/assets/js/jquery.waypoints.min.js"></script>
    <script src="{{url('/front')}}/assets/js/jquery.countup.js"></script>
    <script>
        $('.counter').countUp();

    </script>
    <!-- //stats number counter -->
    <!-- owlcarousel -->
    <script src="{{url('/front')}}/assets/js/owl.carousel.js"></script>
    <!-- script for banner slider-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.8/sweetalert2.min.js"></script>

    <!-- TOASTER LIBRARY -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- TOASTER LIBRARY ENDS -->
    <script>
        $(document).ready(function() {
            $('.owl-one').owlCarousel({
                loop: true,
                margin: 0,
                nav: false,
                responsiveClass: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplaySpeed: 1000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 1
                    },
                    667: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        })

    </script>
    <!-- //script -->
    <!-- script for tesimonials carousel slider -->
    <script src="{{url('/front')}}/assets/js/owl.carousel.js"></script>

    <script>
        $(document).ready(function() {
            $("#owl-demo1").owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    768: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 3,
                        nav: false,
                        loop: false
                    }
                }
            })
        })

    </script>
    <!-- //script for tesimonials carousel slider -->
    <!-- video popup -->
    <script src="{{url('/front')}}/assets/js/jquery.magnific-popup.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',

                fixedContentPos: false,
                fixedBgPos: true,

                overflowY: 'auto',

                closeBtnInside: true,
                preloader: false,

                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });

            $('.popup-with-move-anim').magnificPopup({
                type: 'inline',

                fixedContentPos: false,
                fixedBgPos: true,

                overflowY: 'auto',

                closeBtnInside: true,
                preloader: false,

                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-slide-bottom'
            });
        });

    </script>
    <!-- //video popup -->
    <!--/search-->
    <script src="{{url('/front')}}/assets/js/modernizr.custom.js"></script>
    <script src="{{url('/front')}}/assets/js/classie.js"></script>
    <script src="{{url('/front')}}/assets/js/demo1.js"></script>
    <!--//search-->
    <!-- MENU-JS -->
    <script>
        $(window).on("scroll", function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function() {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function() {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });

    </script>
    <!-- //MENU-JS -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });

    </script>
    <!-- //disable body scroll which navbar is in active -->
    <!-- //bootstrap -->
    <script src="{{url('/front')}}/assets/js/bootstrap.min.js"></script>

    @if (session('success'))
<script type="text/javascript">
    toastr.success("{{ session('success') }}");
</script>
@elseif(session('error'))
<script type="text/javascript">
    toastr.error("{{ session('error') }}");
</script>
@elseif(session('warning'))
<script type="text/javascript">
    toastr.warning("{{ session('warning') }}");
</script>
@elseif(session('info'))
<script type="text/javascript">
    toastr.info("{{ session('info') }}");
</script>
@elseif ($errors->any())
@foreach ($errors->all() as $error)
<script type="text/javascript">
    toastr.error("{{ $error }}");
</script>
@endforeach
@endif
