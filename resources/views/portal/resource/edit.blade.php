@extends('portal.layouts.app')
@section('title') Edit Resource  @endsection
@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Resource</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('portal.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item">Resource</li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                    <form id="editForm" class="form"  data-route="{{ route('portal.resource.update', $flow->id) }}" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label col-form-label required">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ old('name', $flow->name) }}" placeholder="Enter Resource Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label col-form-label required">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="phone" value="{{ old('phone', $flow->phone) }}" placeholder="Enter Phone" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label col-form-label required">website</label>
                            <div class="col-sm-10">
                                <input type="website" class="form-control" name="website" value="{{ old('website', $flow->website) }}" placeholder="https://examplesite.tld" required>
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label class="col-sm-2 control-label col-form-label required">Content</label>
                            <div class="col-sm-10">
                                <textarea class="form-control"  name="content" placeholder="Enter Content" required>{{ old('content', $flow->content) }}</textarea>
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
                            <button type="submit" class="btn btn-primary float-right">Update Resource</button>               
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
