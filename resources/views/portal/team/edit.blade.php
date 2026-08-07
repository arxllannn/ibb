@extends('portal.layouts.app')
@section('title') Edit Team Member @endsection
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
                                <li class="breadcrumb-item"><a href="{{ route('portal.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item">Team</li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Member</li>
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
                    <form id="editForm" class="form"  data-route="{{ route('portal.team.update', $flow->id) }}" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label col-form-label required">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ old('name', $flow->name) }}" placeholder="Enter Team Member's Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label col-form-label required">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" value="{{ old('email', $flow->email) }}" placeholder="Enter Email" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label col-form-label required">Designation</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="designation" value="{{ old('designation', $flow->designation) }}" placeholder="Enter Designation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label col-form-label">Position</label>
                            <div class="col-sm-10">
                                <input type="number" min="1" class="form-control" name="position" value="{{ old('position', $flow->position) }}" placeholder="Display order">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label col-form-label required">Content</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="summernote" name="content" placeholder="Enter Content" required>{{ old('content', $flow->content) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label col-form-label">Photo</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="photo" accept="image/*">
                                @if ($flow->photo)
                                    <img src="{{ $flow->photo }}" alt="Current Photo" class="mt-2" width="100">
                                @endif
                            </div>
                        </div>

                        <div class="form-group">                       
                            <button type="submit" class="btn btn-primary float-right">Update Team Member</button>               
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
