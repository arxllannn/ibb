<!-- ============================================================== -->
<script src="{{url('/theme')}}/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{url('/theme')}}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugin js -->
<!-- ============================================================== -->
<!-- TOASTER LIBRARY -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- TOASTER LIBRARY ENDS -->

<script>
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function() {

        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
</script>

<!-- toaster -->
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
            $('#loader-overlay').show();
            // Collect form data
            var formData = form.serialize();

            // Send AJAX request
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': window.csrfToken // Include CSRF token in headers
                },
                type: 'POST',
                url: route,
                data: formData,
                success: function(response) {
                    // Handle success response
                    toastr.success(response.message);
                    $('#loader-overlay').hide();
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
                }
            });
        });
    });
</script>