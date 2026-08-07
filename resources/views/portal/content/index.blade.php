@extends('portal.layouts.app')
@section('title') Content Managment | {{$page_name}}@endsection
@section('content')        
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Contents For {{$page_name}}</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('portal.dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">About us</li>
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
                                
                               <!-- <a href="{{route( 'portal.content.add',$page_name) }}"> <button type="button" class="btn btn-primary btn-sm float-right">Add</button></a> -->
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Value</th>
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

    var pageName = @json($page_name);
    alert
    $('#zero_config').DataTable({
        processing: true,
        serverSide: true,
        orderable: false,
        ajax: "{{ route('portal.content.list', '') }}/" + pageName, // Pass pageName dynamically to the route
        responsive: true,
        columns: [
            { 
                data: 'title', // Use `null` to indicate a computed column
              //  render: function (data, type, row, meta) {
              //      return meta.row + 1; // Serial number starts from 1
              //  },
                orderable: false, // Disable ordering for this column
            },
            
            { 
                data: 'value',
                render: function(data, type, row) {
                    var plainText = $('<div>').html(data).text().trim();
                    var words = plainText.match(/\b(\w+)\b/g); // Match only word characters
                    var truncatedText = words ? words.slice(0, 20).join(' ') : '';
                    if (words && words.length > 20) {
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
        
    });
});
</script>
@endsection