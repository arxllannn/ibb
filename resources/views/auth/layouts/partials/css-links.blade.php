<!-- style sheets -->
<link href="{{url('/theme')}}/assets/libs/flot/css/float-chart.css" rel="stylesheet">
<link href="{{url('/theme')}}/dist/css/style.min.css" rel="stylesheet">
<!-- style sheets END -->

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
<!-- Fonts END -->
<!-- CUSTOM STYLE -->
<style>
    body{
        background-image:url('/theme/assets/images/auth-bg.jpg');
        background-size: cover;
    }
    .auth-wrapper {
    display: flex;
    justify-content: center; /* Horizontal centering */
    align-items: center; /* Vertical centering */
    height: 90vh /* Set the height to 100% of the viewport height */
    /* Prevent scroll bars on the container */
}
#loader-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
    z-index: 9999; /* Ensure it's above other content */
    display: none; /* Initially hidden */
}

#loader {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.db img{
    max-width: 200px;
    max-height: 200px;
}
</style>