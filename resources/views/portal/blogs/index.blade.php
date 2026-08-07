@extends('portal.layouts.app')
@section('title') Blogs @endsection
@section('content')        
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Blogs</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('portal.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('portal.blog.add') }}">
                    <button type="button" class="btn btn-primary btn-sm float-right">Add Blog</button>
                </a>

                <div class="table-responsive">
                    <table id="blog_table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Banner</th>
                                <th>Content</th>
                                <th>Created At</th>
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
    $('#blog_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('portal.blog.list') }}",
        responsive: true,
        columns: [
            { 
                data: null, // Use `null` to indicate a computed column
                render: function (data, type, row, meta) {
                    return meta.row + 1; // Serial number starts from 1
                },
                orderable: false, // Disable ordering for this column
            },
            { data: 'title' },
            { data: 'category' }, // Column for blog title
            { 
                data: 'banner',
                    render: function (data) {
                        if (data) {
                           
                            return `<a href="#" class="view-photo" data-photo="${data}"><i class="fas fa-image"></i></a>`; // Display image icon
                        } else {
                          
                            return 'NA';
                        }
                    }
            },
            { 
                data: 'content',
                render: function(data, type, row) {
                    var plainText = $('<div>').html(data).text().trim();
                    var words = plainText.match(/\b(\w+)\b/g); // Match only word characters
                    var truncatedText = words ? words.slice(0, 3).join(' ') : '';
                    if (words && words.length > 5) {
                        truncatedText += '......';
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
                orderable: false, // Disable ordering for action column
            },
        ],
        order: [[5, 'desc']], // Adjust order to be based on the 'title' column
    });

    // Event delegation for "View Photo" icon
    $('#blog_table tbody').on('click', 'a.view-photo', function(e) {
        e.preventDefault(); // Prevent default anchor behavior
        var photoUrl = $(this).data('photo'); // Get the photo URL from the data attribute
        $('#modalPhoto').attr('src', photoUrl); // Set the photo in the modal
        $('#photoModal').modal('show'); // Show the photo modal
    });
});
</script>
@endsection
