@extends('portal.layouts.app')
@section('title') Content Managment | {{$page_name}}@endsection
@section('content')        
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Contents For {{$page_name}}</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('portal.dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item " aria-current="page">Content Mangment</li>
                                    <li class="breadcrumb-item active" aria-current="page">Home Page</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                        <div class="card">
                            <div class="card-body">
                            <form class="form" data-route="{{ route('portal.content.updateHome') }}" >
    @foreach($contents as $content)
        @if($content->type != 'Para')
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" value="{{ $content->value }}" name="contents[{{ $content->id }}][value]">
                    <input type="hidden" name="contents[{{ $content->id }}][title]" value="{{ $content->title }}">
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-12">
                    <textarea cols="20" rows="5" class="form-control" name="contents[{{ $content->id }}][value]">{{ $content->value }}</textarea>
                    <input type="hidden" name="contents[{{ $content->id }}][title]" value="{{ $content->title }}">
                </div>
            </div>
            <br>
            <hr/>
        @endif
    @endforeach
    <input type="submit" class="btn btn-primary mb-1">
</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
@endsection
