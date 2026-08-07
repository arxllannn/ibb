@extends('portal.layouts.app')
@section('title') Add Team Member @endsection
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Team</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('portal.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item">Teams</li>
                            <li class="breadcrumb-item active" aria-current="page">Add</li>
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
                <form class="form" class="form-horizontal" method="POST" data-route="{{ route('portal.team.store') }}" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-1  control-label col-form-label required">Member Name :</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-1  control-label col-form-label required">Designation</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="designation" name="designation" placeholder="Manager" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-1  control-label col-form-label required">Email</label>
                        <div class="col-sm-11">
                            <input type="email" class="form-control" id="email" name="email" placeholder="hello@company.com" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-1  control-label col-form-label">Position</label>
                        <div class="col-sm-11">
                            <input type="number" min="1" class="form-control" id="position" name="position" placeholder="Display order (leave blank to add at the end)">
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-1 control-label col-form-label required">Content :</label>
                        <div class="col-sm-11">
                            <textarea class="form-control" id="summernote" name="content" placeholder="Enter Description" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-1 control-label col-form-label required">Photo :</label>
                        <div class="col-sm-11">
                            <input type="file" class="form-control" name="photo" required>
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