<!-- jquery v 3.6 -->
<script src="{{url('/theme')}}/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{url('/theme')}}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{url('/theme')}}/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="{{url('/theme')}}/assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="{{url('/theme')}}/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="{{url('/theme')}}/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="{{url('/theme')}}/dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
<!-- Charts js Files -->
<script src="{{url('/theme')}}/assets/libs/flot/excanvas.js"></script>
<script src="{{url('/theme')}}/assets/libs/flot/jquery.flot.js"></script>
<script src="{{url('/theme')}}/assets/libs/flot/jquery.flot.pie.js"></script>
<script src="{{url('/theme')}}/assets/libs/flot/jquery.flot.time.js"></script>
<script src="{{url('/theme')}}/assets/libs/flot/jquery.flot.stack.js"></script>
<script src="{{url('/theme')}}/assets/libs/flot/jquery.flot.crosshair.js"></script>
<script src="{{url('/theme')}}/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="{{url('/theme')}}/dist/js/pages/chart/chart-page-init.js"></script>
<script src="{{url('/theme')}}/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
<script src="{{url('/theme')}}/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
<script src="{{url('/theme')}}/assets/extra-libs/DataTables/datatables.min.js"></script>
<!-- -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.8/sweetalert2.min.js"></script>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script> -->
<!-- <script src="{{url('/theme')}}/assets/libs/summernote/summernote-lite.js"></script> -->
<script src="{{url('/theme')}}/assets/libs/summernote/summernote-bs5.js"></script>

<script>
    $(document).ready(function(){
        $('#summernote').summernote({
            placeholder: 'Enter Service Description',
            tabsize: 2,
            height: 100
        });
    });
</script>

<!-- <script>
    ClassicEditor
        .create( document.querySelector( '#summernote' ), {
            height: 500 // Set the height to 200px
        } )
        .catch( error => {
            console.error( error );
        } );
</script>  -->
<script>
    // Set CSRF token as a global JavaScript variable
    window.csrfToken = '{{ csrf_token() }}';
</script>
<script>
$(document).ready(function() {
    $('.form').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var form = $(this);
        var route = form.data('route');
        var formData = new FormData(form[0]); // Create FormData object

        $('#loader-overlay').show();
        $('#progress-container').show(); // Show progress bar

        // Send AJAX request
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': window.csrfToken // Include CSRF token in headers
            },
            type: 'POST',
            url: route,
            data: formData,
            processData: false, // Prevent jQuery from automatically transforming the data into a query string
            contentType: false, // Set contentType to false for file uploads
            xhr: function() {
                var xhr = new XMLHttpRequest();
                // Track the progress of the upload
                xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                        var percentComplete = (e.loaded / e.total) * 100;
                        $('#progress-bar').css('width', percentComplete + '%'); // Update progress bar width
                    }
                }, false);
                return xhr;
            },
            success: function(response) {
                // Handle success response
                toastr.success(response.message);
                $('#loader-overlay').hide();
                $('#progress-container').hide(); // Hide progress bar
                form[0].reset(); // Reset the form
                if (response.redirectURL && response.redirectURL != "") {
                    window.location.href = response.redirectURL;
                }

            },
            error: function(xhr, status, error) {
                // Handle error response
                var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : "Something Went Wrong";
                toastr.error(errorMessage);
                $('#loader-overlay').hide();
                $('#progress-container').hide(); // Hide progress bar
            }
        });
    });
});


    function delete_confirmation(link="http://www.google.com", text="You won't be able to revert this!")
    {
        Swal.fire({
            title: 'Are you sure?',
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = link;
            }
        })
    }
</script>

<!-- TOASTER LIBRARY -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- TOASTER LIBRARY ENDS -->
@if (session('success'))
<script type="text/javascript">
    toastr.success("{{ session('success') }}");
</script>
@elseif(session('error'))
<script type="text/javascript">
    toastr.error("{{ session('error') }}");
</script>
@elseif(session('warning'))
<script type="text/javascript">
    toastr.warning("{{ session('warning') }}");
</script>
@elseif(session('info'))
<script type="text/javascript">
    toastr.info("{{ session('info') }}");
</script>
@elseif ($errors->any())
@foreach ($errors->all() as $error)
<script type="text/javascript">
    toastr.error("{{ $error }}");
</script>
@endforeach
@endif

