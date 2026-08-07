@extends('portal.layouts.app')
@section('title') Resource @endsection
@section('content')        
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Resource</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('portal.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Resource</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('portal.resource.add')}}"> 
                        <button type="button" class="btn btn-primary btn-sm float-right">Add</button>
                    </a>
                    
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Website</th>
                                    <th>Content</th>
                                    <th>Photo</th>
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
        ajax: "{{ route('portal.resource.list') }}",
        responsive: true,
        columns: [
            { 
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1; // Serial number starts from 1
                },
                orderable: false,
            },
            { data: 'name' },
            { data: 'phone' },
            { data: 'website' },
            {
                data: 'content',
                render: function(data) {
                    return data.length > 50 ? data.substring(0, 50) + '... <a href="#" class="view-more">View More</a>' : data;
                }
            },
            {
                data: 'photo',
                render: function (data) {
                    return `<a href="#" class="view-photo" data-photo="${data}"><i class="fas fa-image"></i></a>`; // Display image icon
                }
            },
            {
                data: 'action',
                orderable: false,
            },
        ],
        order: [[1, 'asc']],
    });

    // Event delegation for "View More" link
    $('#zero_config tbody').on('click', 'a.view-more', function(e) {
        e.preventDefault(); // Prevent default anchor behavior
        var row = $(this).closest('tr'); // Get the closest row
        var data = table.row(row).data(); // Get data for that row
        $('#modalContent').text(data.content); // Set the full content in the modal
        $('#contentModal').modal('show'); // Show the content modal
    });

    // Event delegation for "View Photo" icon
    $('#zero_config tbody').on('click', 'a.view-photo', function(e) {
        e.preventDefault(); // Prevent default anchor behavior
        var photoUrl = $(this).data('photo'); // Get the photo URL from the data attribute
        $('#modalPhoto').attr('src', photoUrl); // Set the photo in the modal
        $('#photoModal').modal('show'); // Show the photo modal
    });
});
</script>
@endsection
