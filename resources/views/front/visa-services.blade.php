@extends('front.app')
@section('title') Infinity Business Brokers | Home @endsection
@section('content')
<div class="inner-banner py-5">
        <section class="w3l-breadcrumb text-left py-sm-5 ">
            <div class="container">
                <div class="w3breadcrumb-gids">
                    <div class="w3breadcrumb-left text-left">
                        <h2 class="inner-w3-title mt-sm-5 mt-4">
                          Visa Services </h2>

                    </div>
                    <div class="w3breadcrumb-right">
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li class="active"><span class="fas fa-angle-double-right mx-2"></span> Visas</li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>
    </div>
   
    <!--/tabs-faqs-->
    <section class="w3l-products w3l-faq-block py-5" id="projects">
        <div class="container py-lg-5">
            <div class="row">

                
                <div class=" col-lg-12 mt-lg-0 mt-sm-6 mt-6">
                    <!-- <h6 class="title-subw3hny mb-1">Ask by Client</h6> -->
                    <!-- <h3 class="title-w3l mb-4">VISAS</h3> -->
                    <!-- <p>Investment and business opportunities for the E-2 Visa and EB-5 Green Card are available.

Many business listings may be suitable to enable an E-2 Investor Visa or an EB-5 Alien Entrepreneur Visa application, and some will qualify for fast immigration to the United States.

Infinity Business Brokers is affiliated with some local immigration attorneys to acquire U.S. immigration status regardless of where you are from. We have helped many foreign nationals to immigrate to the United States by purchasing a U.S. business.</p><br/> -->
@php echo get_service_intro('Visa');   @endphp
<br/>                 

<div class="accordion" id="accordionExample">
                        @foreach($flow_steps as $step)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{$step->id}}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$step->id}}" aria-expanded="false" aria-controls="collapse{{$step->id}}">
                                {{$loop->iteration}}.{{$step->heading}}
                                </button>
                            </h2>
                            <div id="collapse{{$step->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$step->id}}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                {!!$step->content!!}
                                    
                                <!-- <a href="#" class="open-video-modal" data-video-url="{{ $step->video_url }}">
                                    <button class="btn btn-success">Watch Video</button>
                    
                                </a> -->
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach


                       
                    </div>
                </div>
            </div>
        </div>
    </section>



<!-- Single Modal for Video -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Placeholder for the video player -->
                <video id="modalVideo" width="100%" height="auto" controls>
                    <source id="videoSource" src="" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</div>


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