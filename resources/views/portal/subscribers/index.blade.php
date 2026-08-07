@extends('portal.layouts.app')
@section('title') Subscribers @endsection
@section('content')        
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Subscribers</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('portal.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Subscribers</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                   
                    
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Subsribed At</th>
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
@endsection

@section('script')
<script type="text/javascript">
$(function () {
    var table = $('#zero_config').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('portal.subscriber.list') }}",
        responsive: true,
        columns: [
            { 
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1; // Serial number starts from 1
                },
                orderable: false,
            },
           
            { data: 'email' },
            { data: 'created_at' },
            
            {
                data: 'action',
                orderable: false,
            },
        ],
        order: [[1, 'asc']],
    });   
});
</script>
@endsection
