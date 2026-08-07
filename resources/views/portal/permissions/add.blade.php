@extends('portal.layouts.app')
@section('title') Add Permisson @endsection
@section('content')        
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Permission</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('portal.dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item">Permission</li>
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
                        <form class="form" class="form-horizontal" id="loginform" method="POST" data-route="{{ route('portal.permissions.store') }}">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Permission"
                                            class="col-sm-1  control-label col-form-label">Permission Name</label>
                                        <div class="col-sm-11">
                                            <input type="text" class="form-control" id="permission" name="permission" placeholder="permission-name">
                                        </div>
                                    </div>
                                    <div class="form-group">                       
                                        <button type="submit" class="btn btn-primary float-right">Submit</button>               
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
@endsection
