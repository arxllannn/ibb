@extends('portal.layouts.app')
@section('title') Edit {{$page_name}} @endsection
@section('content')        
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Update Content</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('portal.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit </li>
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
                    <form id="editForm" class="form" method="POST" data-route="{{ route('portal.content.update',['id'=>$flow->id,'page_name'=>$page_name] ) }}" enctype="multipart/form-data">
                       
                        <input type="hidden" name="_method" value="POST"> <!-- Use POST method with hidden field -->

                        <div class="form-group row">
                           
                            <div class="col-sm-3">
                                <label>Title</label>
                                <input @if($page_name == "Social") readonly @endif type="text" class="form-control" name="title" value="{{ old('title', $flow->title) }}" placeholder="title" required>
                            </div>
                            
                            <div class="col-sm-9">
                                <label>Value</label>
                                <input type="text" class="form-control" name="value" value="{{ old('value', $flow->value) }}" placeholder="value" required>
                            </div>
                        </div>

                        


                        <div class="form-group">                       
                            <button type="submit" class="btn btn-primary float-right">Update</button>               
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Progress Bar Container -->
    <div id="progress-container" style="display: none;">
        <div class="progress">
            <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
@endsection