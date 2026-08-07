@extends('portal.layouts.app')
@section('title') Messages @endsection
@section('content')        
    <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Messages</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('portal.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Messages</li>
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
                                
                              
                                
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th >Email</th>
                                    <th >Subject</th>
                                    <th>Message</th>
                                    <th>Received At</th>
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
        ajax: "{{ route('portal.message.list') }}",
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
            { data: 'email' },
            { 
                data: 'subject',
                render: function(data, type, row) {
                    var plainText = $('<div>').html(data).text().trim();
                    var words = plainText.match(/\b(\w+)\b/g); // Match only word characters
                    var truncatedText = words ? words.slice(0, 5).join(' ') : '';
                    if (words && words.length > 5) {
                        truncatedText += '......<a href="#" class="view-more">View More</a>';
                    }
                    return truncatedText;
                },


             },
            { 
                data: 'message',
                render: function(data, type, row) {
                    var plainText = $('<div>').html(data).text().trim();
                    var words = plainText.match(/\b(\w+)\b/g); // Match only word characters
                    var truncatedText = words ? words.slice(0, 3).join(' ') : '';
                    if (words && words.length > 5) {
                        truncatedText += '......<a href="#" class="view-more">View More</a>';
                    }

                    return truncatedText;
                },
                orderable: false, // Disable ordering for this column
            },
            {
                data:'created_at'
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
        $('#modalContent').text(data.message); // Set the full message in the modal
        $('#contentModal').modal('show'); // Show the modal
    });
});
</script>
@endsection
