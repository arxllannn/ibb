@extends('portal.layouts.app')
@section('title') Roles @endsection
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
                                    <li class="breadcrumb-item active" aria-current="page">Roles</li>
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
                                
                               <a href="{{route('portal.roles.add')}}"> <button type="button" class="btn btn-primary btn-sm float-right">Add</button></a>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
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


        <!-- Modal -->
<div class="modal fade" id="permissionsModal" tabindex="-1" aria-labelledby="permissionsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="permissionsModalLabel">Manage Permissions</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     
        <form id="permissionsForm">
            
          <!-- Permissions will be dynamically populated here -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <!-- <button type="submit" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
        
@endsection
@section('script')

    <script type="text/javascript">
        function openPermissionsModal(roleId) {
            $('#role_id_text_box').val(roleId);
    // AJAX request to fetch permissions for the role
    $.get('/admin/roles/' + roleId + '/permissions', function(data) {
        // Populate modal with permissions
        $('#permissionsForm').html(data);

        // Open modal
        $('#permissionsModal').modal('show');
    });
    }


    $(document).ready(function() {
    // Handle switch toggle events
    $('#permissionsForm').on('change', 'input[type="checkbox"]', function() {
        var permissionId = $(this).data('permission-id');
        var roleId = document.getElementById('role_id_text_box').value;  //' $role->id '; // Replace with actual role ID
        var isChecked = $(this).prop('checked') ? 1 : 0;

        // Send AJAX request to update role permissions
        $.ajax({
            url: '{{ route("portal.roles.permissions.toggle", ["role" => ":roleId"]) }}'.replace(':roleId', roleId),
            type: 'POST',
            data: {
                permission_id: permissionId,
                is_checked: isChecked,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
              if(response.message='Permission toggled successfuly'){
                toastr.success("Permission Modified");
              }
              else{
                toastr.success("Permission Could not be toggled");
              }
            },
            error: function(xhr) {
                // Handle error
                console.log(xhr.responseText);
            }
        });
    });
});









$(function () {
    $('#zero_config').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('portal.roles.list') }}",
        responsive: true,
        columns: [
            { 
                data: null, // Use `null` to indicate a computed column
                render: function (data, type, row, meta) {
                    return meta.row + 1; // Serial number starts from 1
                },
                orderable: false, // Disable ordering for this column
            },
            { data: 'name' },
            {
                data: 'action',
                orderable: false, // Disable ordering for action column
            },
        ],
        order: [[1, 'asc']], // Adjust order to be based on the 'name' column
    });
});

</script>
@endsection