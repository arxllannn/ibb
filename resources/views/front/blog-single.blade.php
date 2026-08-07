@extends('front.app')
@section('title') Infinity Business Brokers | Home @endsection
@section('content')
 <!--/inner-page-->
 <!--/inner-page-->
 <div class="inner-banner py-5">
        <section class="w3l-breadcrumb text-left py-sm-5 ">
            <div class="container">
                <div class="w3breadcrumb-gids">
                    <div class="w3breadcrumb-left text-left">
                        <h2 class="inner-w3-title mt-sm-5 mt-4">
                            Blog </h2>

                    </div>
                    <div class="w3breadcrumb-right">
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li class="active"><span class="fas fa-angle-double-right mx-2"></span> {{$blog->title}} </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>
    </div>
    <!--//inner-page-->
    <!--/blog-section-->
    <section class="w3l-blog-single">
        <div class="single blog py-5">
            <div class="container py-lg-5 py-md-4">
                <div class="d-grid grid-colunm-2">
                    <!-- left side blog post content -->
                    <div class="single-left">
                                 <!-- left side blog post content -->
                    <div class="single-left">
                        <div class="single-left1">
                        
                            <div class="blg-img">
                            @if(!empty($blog->banner)) <img  src="{{$blog->banner}}" alt=" " class="img-fluid img-banner"> @endif
                                <div class="bl-top">
                                    <h4>{{$blog->created_at->format('m-d-Y')}}</h4>
                                </div>
                            </div>
                       

                            <div class="btom-cont1 mt-md-2">
                                <h5 class="card-title"><a href="#">{{$blog->title}}</a></h5>
                                <ul class="admin-post">
                                    <li>
                                        <a href="#"><span class="fas fa-user"></span>{{$blog->user->name}}</a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="fas fa-tags"></span>{{$blog->category->name}}</a>
                                    </li>
                                    <!-- <li>
                                        <a href="blog-single.html"><span class="fas fa-comments"></span>Comments (20)</a>
                                    </li> -->
                                </ul>
                                {!! $blog->content !!}
                                <ul class="share-post my-5">
                                    <li>
                                        <h4 class="side-title mr-sm-4 mr-2">Share this post :</h4>
                                    </li>
                                    <li>
                                        <a href="https://web.facebook.com/people/Infinity-Business-Brokers/100057664291082/?_rdc=1&_rdr#" class="facebook" title="Facebook" target="_blank" rel="noopener">
                                            <span class="fab fa-facebook-f" aria-hidden="true"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="new-posts clearfix">
                        @if($prevBlog)
                            <a class="prev-post pull-left" href="{{route('blog-single',$prevBlog)}}"><span class="fa fa-arrow-left me-2" aria-hidden="true"></span>
                                Previous Post</a>@endif
                                @if($nextBlog) <a class="next-post pull-right" href="{{route('blog-single',$nextBlog)}}">Next Post <span class="fa fa-arrow-right ms-2" aria-hidden="true"></span></a>@endif
                        </div>
                        <!-- <div class="comments mt-5">
                            <h3 class="post-content-title">Comments</h3>
                            <div class="media mt-5 bod-1">
                                <div class="img-circle">
                                    <img src="assets/images/team1.jpg" class="img-fluid" alt="...">
                                </div>
                                <div class="media-body">
                                    <div class="medi-top mb-2">
                                        <a href="#URL" class="name mt-0">Johnson smith</a>
                                        <span>25th June 2021 </span>
                                    </div>
                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                        sollicitudin. Cras purus tempus viverra turpis. Fusce nunc ac in vulputate
                                        odio, in vulputate at, viverra turpis, nunc ac.</p>
                                    <a href="#reply" class="rep mt-3">Reply</a>
                                    <div class="media mt-4 bod-2">
                                        <a class="img-circle img-circle-sm" href="#">
                                            <img src="assets/images/team2.jpg" class="img-fluid" alt="...">
                                        </a>
                                        <div class="media-body">
                                            <div class="medi-top mb-2">
                                                <a href="#URL" class="name mt-0">Alexander</a>
                                                <span>25th June 2021 </span>
                                            </div>
                                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                                sollicitudin. Cras purus odio, vestibulum at.</p>
                                            <a href="#reply" class="rep mt-3">Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="media bod-3">
                                <div class="img-circle">
                                    <img src="assets/images/team3.jpg" class="img-fluid" alt="...">
                                </div>
                                <div class="media-body">
                                    <div class="medi-top mb-2">
                                        <a href="#URL" class="name mt-0">Elizabeth</a>
                                        <span>23rd June 2021 </span>
                                    </div>
                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                        sollicitudin. Cras purus
                                        odio, in vulputate at, viverra turpis, nunc ac.</p>
                                    <a href="#reply" class="rep mt-3">Reply</a>
                                </div>
                            </div>


                        </div> -->

                        <!-- <div class="testi-top mt-5 pt-3">

                            <h3 class="post-content-title">Leave A Message</h3>
                            <div class="form-commets mt-5">
                                <form action="#" method="post">

                                    <div class="media-form">
                                        <input type="text" name="Name" required="Name" placeholder="Your Name">
                                        <input type="email" name="Email" required="Email" placeholder="Your Email">
                                    </div>
                                    <textarea name="Message" required="" placeholder="Write your comments here"></textarea>
                                    <div class="text-right w3-submit">
                                        <button class="btn btn-primary btn-style" type="submit">Post comment<i class="fas fa-paper-plane ms-2"></i></button>
                                    </div>

                                </form>
                            </div>
                        </div> -->
                    </div>
                    <!-- left side blog post content -->                  
                        
                        
                    </div>
                    <!-- pagination -->
                        
                    <!-- left side blog post content -->

                    <!-- right side bar -->
                    <div class="right-side-bar">

                        <aside class="posts p-4">
                            <h3 class="aside-title">All Categories</h3>
                            <ul class="category">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('blog_by_category', $category->id) }}">
                                        <span class="fas fa-angle-double-right"></span>
                                        {{ $category->name }}
                                        <label>{{ $category->getBlogCount() }}</label>
                                    </a>
                                </li>
                            @endforeach
                            </ul>
                        </aside>
                        <aside class="posts p-4">
                            <h3 class="aside-title">Recent Posts</h3>
                            <div class="posts-grids">

                                @foreach($recentBlogs as $recent)
                                <div class="posts-grid-inner">
                                    <div class="posts-grid-left ps-0">
                                        <a href="{{route('blog-single',$recent->id)}}">
                                            <img src="{{$recent->banner}}" alt=" " class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="posts-grid-right">
                                        <h4>
                                            <a href="{{route('blog-single',$recent->id)}}" class="text-bl">{{$recent->title}}</a>
                                        </h4>
                                        <span class="price">{{$recent->created_at->diffForHumans()}}</span>
                                    </div>
                                </div>
                                @endforeach
                        
                            </div>
                        </aside>

                        
                    </div>
                    <!-- //right side bar -->
                </div>
            </div>
        </div>
    </section>
    <!--//blog-section-->
@endsection