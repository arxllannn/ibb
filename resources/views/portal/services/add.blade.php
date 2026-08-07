@extends('portal.layouts.app')
@section('title') Add Services @endsection
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Services</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('portal.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('portal.services.index')}}">Services</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <form class="form-horizontal" method="POST" action="{{ route('portal.services.store') }}" enctype="multipart/form-data">
                @csrf <!-- Include CSRF token -->
                <div class="card-body">
                    <!-- Service Name -->
                    <div class="form-group row">
                        <label for="name" class="col-sm-1  control-label col-form-label">Service Name</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Service Name" required>
                        </div>
                    </div>

                    <!-- Service Description -->
                    <div class="form-group row">
                        <label for="description" class="col-sm-1  control-label col-form-label">Service Description</label>
                        <div class="col-sm-11">
                            <textarea class="form-control" id="summernote" name="description" placeholder="Enter Service Description" required></textarea>
                        </div>
                    </div>

                    <!-- Service Thumbnail -->
                    <div class="form-group row">
                        <label for="thumbnail" class="col-sm-1  control-label col-form-label">Service Thumbnail</label>
                        <div class="col-sm-11">
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
