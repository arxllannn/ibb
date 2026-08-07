@extends('portal.layouts.app')
@section('title') franchise @endsection
@section('content')        
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">franchise</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('portal.dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">franchise</li>
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
                                
                               <a href="{{route('portal.franchise.add')}}"> <button type="button" class="btn btn-primary btn-sm float-right">Add</button></a>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Heading</th>
                                                <th>Content</th>
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
        ajax: "{{ route('portal.franchise.list') }}",
        responsive: true,
        columns: [
            // { 
            //     data: null, // Use `null` to indicate a computed column
            //     render: function (data, type, row, meta) {
            //         return meta.row + 1; // Serial number starts from 1
            //     },
            //     orderable: false, // Disable ordering for this column
            // },
            {data:'id'},
            { data: 'heading' },
            { 
                data: 'content',
                render: function(data, type, row) {
                    // Convert HTML content to plain text (remove HTML tags)
                    var plainText = $('<div>').html(data).text().trim();
                    
                    // Split the plain text into words
                    var words = plainText.match(/\b(\w+)\b/g); // Match only word characters
                    
                    // Get the first 5 words or fewer
                    var truncatedText = words ? words.slice(0, 3).join(' ') : '';

                    // Append "..." if the original text has more than 5 words
                    if (words && words.length > 5) {
                        truncatedText += '......';
                    }

                    return truncatedText;
                },
                orderable: false, // Disable ordering for this column
            },
            {
                data: 'action',
                orderable: false, // Disable ordering for action column
            },
        ],
        order: [[0, 'asc']], // Adjust order to be based on heading or any other column
    });
});
</script>
@endsection