@extends('portal.layouts.app')
@section('title') Edit Role @endsection
@section('content')        
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Roles</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('portal.dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item">Roles</li>
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
                        <form class="form" class="form-horizontal" id="loginform" method="POST" data-route="{{ route('portal.roles.update',$role->id) }}">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-1  control-label col-form-label">Role Name</label>
                                        <div class="col-sm-11">
                                            <input type="text" class="form-control" value="{{ old('role', $role->name) }}" id="role" name="role" placeholder="role-name">
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
@section('script')

    <script type="text/javascript">
    $(function () {

        $('#zero_config').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('portal.roles.list')}}",
            responsive:true,
            columns: [
                { data: 'id' },
                { data: 'name' },
                {
                    targets: -1,
                    data: 'action',
                },
            ],
            columnDefs: [ {
                'targets': [1], // column index (start from 0)
                'orderable': false, // set orderable false for selected columns
            }],
            order: [[0, 'desc']],
        });
    });

</script>
@endsection