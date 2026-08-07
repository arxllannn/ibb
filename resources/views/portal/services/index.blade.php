@extends('portal.layouts.app')
@section('title') Services @endsection
@section('content')        
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Services</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('portal.dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Services</li>
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
                                
                               <a href="{{route('portal.services.add')}}"> <button type="button" class="btn btn-primary btn-sm float-right">Add</button></a>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Descriptin</th>
                                                <th>Thumbnail</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        
                                    </table>
                                </div>

                            </div>
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
            ajax: "{{route('portal.users.list')}}",
            responsive:true,
            columns: [
                { data: 'id' },
                { data: 'name' },
                {data: 'role'},
                {
                    targets: -1,
                    data: 'action',
                },
            ],
            columnDefs: [ {
                'targets': [2,3], // column index (start from 0)
                'orderable': false, // set orderable false for selected columns
            }],
            order: [[0, 'desc']],
        });
    });

</script>
@endsection