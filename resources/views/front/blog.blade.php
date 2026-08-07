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
                            <li class="active"><span class="fas fa-angle-double-right mx-2"></span> Blog </li>
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
                        @foreach($blogs as $blog)
                        <div class="single-left1 @if($loop->iteration>1) mt-5 @endif">
                            <div class="blg-img">
                                
                                <a >@if(!empty($blog->banner))<img src="{{$blog->banner}}" alt=" " class="img-fluid img-banner">  @endif
                                    <div class="bl-top">
                                        <h4>{{$blog->created_at->format('m-d-Y')}}</h4>
                                    </div>
                                </a>
                               
                            </div>
                            <div class="btom-cont">
                                <h5 class="card-title"><a href="{{route('blog-single',$blog->id)}}">{{$blog->title}} </a></h5>
                                <ul class="admin-post">
                                    <li>
                                    <a ><span class="fas fa-user"></span>{{ $blog->user->name }}</a> 
                                    </li>
                                    <li>
                                        <a ><span class="fas fa-tags"></span>{{ $blog->category->name }}</a>
                                    </li>
                                    <!-- <li>
                                        <a href="blog-single.html"><span class="fas fa-comments"></span>Comments (20)</a>
                                    </li> -->
                                </ul>
                                @php
                                $plainTextContent = strip_tags($blog->content);
                                $firstTwoWords = implode(' ', array_slice(explode(' ', $plainTextContent), 0, 50));
                                @endphp
                                <p>{!! $firstTwoWords !!}</p>
                                
                                <a href="{{route('blog-single',$blog->id)}}" class="btn btn-style btn-primary mt-4">Read More <i class="fas fa-angle-double-right ms-2"></i></a>

                            </div>
                        </div>
                        @endforeach                        
                        <div class="pagination">
    <ul>
        <!-- Previous Page Link -->
        @if ($blogs->onFirstPage())
            <li><a href="#" class="not-allowed" disabled>
                <span class="fa fa-angle-double-left" aria-hidden="true"></span>
            </a></li>
        @else
            <li><a href="{{ $blogs->previousPageUrl() }}">
                <span class="fa fa-angle-double-left" aria-hidden="true"></span>
            </a></li>
        @endif

        <!-- Pagination Links -->
        @foreach ($blogs->links()->elements[0] as $page => $url)
            <li>
                @if ($page == $blogs->currentPage())
                    <a href="{{ $url }}" class="active">{{ $page }}</a>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            </li>
        @endforeach

        <!-- Next Page Link -->
        @if ($blogs->hasMorePages())
            <li><a href="{{ $blogs->nextPageUrl() }}">
                <span class="fa fa-angle-double-right" aria-hidden="true"></span>
            </a></li>
        @else
            <li><a href="#" class="not-allowed" disabled>
                <span class="fa fa-angle-double-right" aria-hidden="true"></span>
            </a></li>
        @endif
    </ul>
</div>
                        
                        
                        
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