<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Veli Bilgilendirme Sistemi</title>
    <!-- CSRF Stuff -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/jquery-ui.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="/assets/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="/assets/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="/assets/css/aos.css">

    <link rel="stylesheet" href="/assets/css/style.css">

</head>
<body style="">

<style>
    .modal-backdrop, .fade show{
        display: none!important;
    }
</style>
<div id='app'>
    <app-component></app-component>
</div>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<script src="/assets/js/jquery-migrate-3.0.1.min.js"></script>
<script src="/assets/js/jquery-ui.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/owl.carousel.min.js"></script>
<script src="/assets/js/jquery.stellar.min.js"></script>
<script src="/assets/js/jquery.countdown.min.js"></script>
<script src="/assets/js/bootstrap-datepicker.min.js"></script>
<script src="/assets/js/jquery.easing.1.3.js"></script>
<script src="/assets/js/aos.js"></script>
<script src="/assets/js/jquery.fancybox.min.js"></script>
<script src="/assets/js/jquery.sticky.js"></script>
<script src="/assets/js/main.js"></script>



</body>
</html>
