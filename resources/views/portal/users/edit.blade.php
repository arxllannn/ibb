@extends('portal.layouts.app')
@section('title') Edit Users @endsection
@section('content')        
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Users</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('portal.dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item">Users</li>
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
                        <form class="form" class="form-horizontal" method="POST" data-route="{{ route('portal.users.update',$users->id) }}">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-1 control-label col-form-label"> Name</label>
                                        <div class="col-sm-11">
                                            <input type="text" class="form-control" value="{{ old('name', $users->name) }}" id="name" name="name" placeholder="Micheal Ashley" required>
                                        </div>
                                    </div>
                                    

                                    <div class="form-group row">
                                        <label for="Role"
                                            class="col-sm-1 control-label col-form-label"> Role</label>
                                        <div class="col-sm-11">
                                            <select class="form-control" name="role">
                                                <option value="" selected="selected" disabled>Choose Role</option>
                                                @foreach($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">                       
                                        <button type="submit" class="btn btn-primary float-right">Save</button>               
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
@endsection
