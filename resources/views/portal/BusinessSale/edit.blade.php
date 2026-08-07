@extends('portal.layouts.app')
@section('title') Edit Business Sale Step @endsection
@section('content')        
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Edit Sell Business</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('portal.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item">Sell Business</li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Sell</li>
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
                    <form id="editForm" class="form" method="POST" data-route="{{ route('portal.business-sale-flow.update', $flow->id) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="POST"> <!-- Use POST method with hidden field -->

                        <div class="form-group row">
                            <label class="col-sm-1 control-label col-form-label required">Step Name :</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" name="step_name" value="{{ old('step_name', $flow->step_name) }}" placeholder="Step Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 control-label col-form-label required">Step Content :</label>
                            <div class="col-sm-11">
                                <textarea class="form-control" id="summernote" name="step_content" placeholder="Enter Serice Description" required>{{ old('step_content', $flow->content) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 control-label col-form-label">Choose Video</label>
                            <div class="col-sm-11">
                                <input type="file" class="form-control" name="step_video">
                                @if($flow->video_url)
                                    <video width="320" height="240" controls>
                                        <source src="{{ $flow->video_url }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
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