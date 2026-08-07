@extends('front.app')
@section('title') Infinity Business Brokers | SOON @endsection
@section('content')
<div class="inner-banner py-5">
        <section class="w3l-breadcrumb text-left py-sm-5 ">
            <div class="container">
                <div class="w3breadcrumb-gids">
                    <div class="w3breadcrumb-left text-left">
                        <h2 class="inner-w3-title mt-sm-5 mt-4">
                          Business Search</h2>

                    </div>
                    <div class="w3breadcrumb-right">
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li class="active"><span class="fas fa-angle-double-right mx-2"></span> business search</li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>
    </div>
   
    <!--/tabs-faqs-->
    <section class="w3l-products w3l-faq-block py-5" id="projects">
        <div class="container py-lg-5 ">
            <div style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
                <iframe src="https://bizmls.com/cgi-bin/a-bus2.asp?folder=bbf-8002001&src=bus-all" class="site-iframe" style="border: 1px;"></iframe>
             </div>
                   
                    
                
            
        </div>
    </section>


    <!--//tabs-faqs-->

    <!--/w3l-subscribe-content-->
   {{--<section class="w3l-join-main py-5">
        <div class="container py-md-5">
            <div class="w3l-project-in">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="bottom-info">
                            <div class="header-section pe-lg-5">
                                <!-- <h5 class="title-subw3hny mb-lg-2">Some Info</h5> -->
                                <h3 class="title-w3l two mb-2">Professional Services for a smooth business deal
                                </h3>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 align-self mt-lg-0 mt-3">
                        <p>Lorem ipsum viverra feugiat. Pellen tesque libero ut justo, ultrices in ligula. Semper at. Lorem ipsum dolor sit amet elit. Non quae, fugiat nihil ad. Lorem ipsum dolor sit amet. </p>
                    </div>
                    <div class="col-lg-4 col-md-6 align-self mt-lg-0 mt-3">
                        <p>Lorem ipsum viverra feugiat. Pellen tesque libero ut justo, ultrices in ligula. Semper at. Lorem ipsum dolor sit amet elit. Non quae, fugiat nihil ad. Lorem ipsum dolor sit amet. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//w3l-subscribe-content-->
    <!--/team-sec-->
    <section class="w3l-team-main team py-5" id="team">
        <div class="container py-lg-5">
            <div class="title-content text-center mb-2">
                <h6 class="title-subw3hny mb-1">Our Team</h6>
                <h3 class="title-w3l">Who Worked With Us.</h3>
            </div>
            <div class="row team-row justify-content-center">
                <div class="col-lg-4 col-6 team-wrap mt-lg-5 mt-4">
                    <div class="team-member text-center">
                        <div class="team-img">
                            <img src="assets/images/team1.jpg" alt="" class="radius-image">
                            <div class="overlay-team">
                                <div class="team-details text-center">
                                    <div class="socials mt-20">
                                        <a href="#url">
                                            <span class="fab fa-facebook-f"></span>
                                        </a>
                                        <a href="#url">
                                            <span class="fab fa-twitter"></span>
                                        </a>
                                        <a href="#url">
                                            <span class="fab fa-linkedin-in"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#url" class="team-title">Lawrence Petrie</a>
                        <p>Director</p>
                    </div>
                </div>
                <!-- end team member -->
                <div class="col-lg-4 col-6 team-wrap mt-lg-5 mt-4">
                    <div class="team-member text-center">
                        <div class="team-img">
                            <img src="assets/images/team2.jpg" alt="" class="radius-image">
                            <div class="overlay-team">
                                <div class="team-details text-center">
                                    <div class="socials mt-20">
                                        <a href="#url">
                                            <span class="fab fa-facebook-f"></span>
                                        </a>
                                        <a href="#url">
                                            <span class="fab fa-twitter"></span>
                                        </a>
                                        <a href="#url">
                                            <span class="fab fa-linkedin-in"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#url" class="team-title">Jack Peters</a>
                        <p>Managing Director</p>
                    </div>
                </div>
                <!-- end team member -->
                <div class="col-lg-4 col-6 team-wrap mt-lg-5 mt-4">
                    <div class="team-member text-center">
                        <div class="team-img">
                            <img src="assets/images/team3.jpg" alt="" class="radius-image">
                            <div class="overlay-team">
                                <div class="team-details text-center">
                                    <div class="socials mt-20">
                                        <a href="#url">
                                            <span class="fab fa-facebook-f"></span>
                                        </a>
                                        <a href="#url">
                                            <span class="fab fa-twitter"></span>
                                        </a>
                                        <a href="#url">
                                            <span class="fab fa-linkedin-in"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#url" class="team-title">Anna Phillips</a>
                        <p>Worker</p>
                    </div>
                </div>
                <!-- end team member -->
            </div>

        </div>
    </section>--}}
    <!--//team-sec-->
    <script>
  document.addEventListener('DOMContentLoaded', function () {
    var videoLinks = document.querySelectorAll('.open-video-modal');
    var videoModal = new bootstrap.Modal(document.getElementById('videoModal'));
    var videoElement = document.getElementById('modalVideo');
    var videoSource = document.getElementById('videoSource');

    videoLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            var videoUrl = this.getAttribute('data-video-url');
            
            // Set the video source dynamically
            videoSource.src = videoUrl;
            videoElement.load(); // Reload the video element
            videoModal.show();
        });
    });

    // Pause video when modal is closed
    document.getElementById('videoModal').addEventListener('hidden.bs.modal', function () {
        videoElement.pause();
        videoElement.currentTime = 0; // Reset the video time to start
    });
});

</script>
@endsection