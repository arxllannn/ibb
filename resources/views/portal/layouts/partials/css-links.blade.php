 <!-- Custom CSS  -->
 <link href="{{url('/theme')}}/assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
<link href="{{url('/theme')}}/dist/css/style.min.css" rel="stylesheet">
 <!-- TOASTER CSS -->
<link rel="stylesheet" type="text/css" href="{{url('/theme')}}/assets/libs/toastr/build/toastr.min.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.8/sweetalert2.css" rel="stylesheet">

<!-- <link href="{{url('/theme')}}/assets/libs/summernote/summernote-lite.css" rel="stylesheet"> -->
<link href="{{url('/theme')}}/assets/libs/summernote/summernote-bs5.css" rel="stylesheet">

<style>
.float-right{
    float:right;
   
}
    /* Scrollbar Track */
::-webkit-scrollbar-track {
    background: #f1f1f1; /* Change this to your desired color */
}

/* Scrollbar Handle */
::-webkit-scrollbar-thumb {
    background: #888; /* Change this to your desired color */
}

/* Scrollbar Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #555; /* Change this to your desired color */
}
.mr-1{
    margin-left:10px;
}
.nav-logo{
    max-width: 150px !important;
    max-height: 50px !important;
}
#zero_config tbody tr {
        height: 40px; /* Set initial fixed row height */
        max-height: 40px; /* Prevent initial height from expanding */
        overflow: hidden; /* Hide overflow content */
        cursor: pointer; /* Cursor change to indicate interaction */
        transition: height 0.3s ease; /* Smooth transition for height changes */
    }
  
</style>