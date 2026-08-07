@extends('portal.layouts.app')
@section('title') Add Blog @endsection
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Blogs</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('portal.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item">Blogs</li>
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
                <form class="form"  data-route="{{ route('portal.blog.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Title Input -->
                    <div class="form-group row">
                        <label class="col-sm-1 control-label col-form-label required">Title:</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" name="title" placeholder="Blog Title" required>
                        </div>
                    </div>

                    <!-- Banner (Image Upload) -->
                    <div class="form-group row">
                        <label class="col-sm-1 control-label col-form-label required">Banner:</label>
                        <div class="col-sm-11">
                            <input type="file" class="form-control" name="banner" accept="image/*" >
                        </div>
                    </div>

                    <!-- Content Input -->
                    <div class="form-group row">
                        <label class="col-sm-1 control-label col-form-label required">Content:</label>
                        <div class="col-sm-11">
                            <textarea class="form-control" id="summernote" name="content" placeholder="Enter Blog Content" required></textarea>
                        </div>
                    </div>

                    <!-- Category Selection (If Needed) -->
                    <div class="form-group row">
                        <label class="col-sm-1 control-label col-form-label required">Category:</label>
                        <div class="col-sm-11">
                            <select class="form-control" name="category_id" required>
                                <option value="">Select Category</option>
                                <!-- Assuming you are fetching categories in your controller -->
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Submit Button -->
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
