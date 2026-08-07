@extends('portal.layouts.app')
@section('title') Add Business Purchase Step @endsection
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Add Buy Business step</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('portal.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item">Buy Business step</li>
                            <li class="breadcrumb-item active" aria-current="page">Add Step</li>
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
                <form class="form" class="form-horizontal" method="POST" data-route="{{ route('portal.business-purchase-flow.store') }}" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-1  control-label col-form-label required">Step Name :</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="step_name" name="step_name" placeholder="Step -Name" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-1 control-label col-form-label required">Content :</label>
                        <div class="col-sm-11">
                            <textarea class="form-control" id="summernote" name="step_content" placeholder="Enter Description" required></textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-1 control-label col-form-label required">Choose Video :(optional)</label>
                        <div class="col-sm-11">
                            <input type="file" class="form-control" name="step_video">
                        </div>
                    </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
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