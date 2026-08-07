@extends('portal.layouts.app')
@section('title') Users @endsection
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
                                    <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                                
                               <a href="{{route('portal.users.add')}}"> <button type="button" class="btn btn-primary btn-sm float-right">Add</button></a>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
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
        <!-- Change Password Modal -->
<div id="changePasswordModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
               
            </div>
            <form id="changePasswordForm" class="form" data-route="{{route('portal.users.change-pass')}}">
            <div class="modal-body">
               
                    <input type="hidden" id="userId" name="userId">
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="newPassword_confirmation" required>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Change Password</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('script')

<script type="text/javascript">
    function showChangePasswordModal(userId) {
    $('#userId').val(userId); // Set the user ID in the hidden input
    $('#changePasswordModal').modal('show'); // Show the modal
}
$(function () {
    $('#zero_config').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('portal.users.list') }}",
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
            { data: 'email' },
            { data: 'role' },
            {
                data: 'action',
                orderable: false, // Disable ordering for action column
            },
        ],
        order: [[1, 'asc']], // Adjust order to be based on the 'name' column or any other column
    });
});
</script>
@endsection