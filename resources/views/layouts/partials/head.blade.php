<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}


    <!-- Favicon -->
    <link href="{{ asset('assets/argon-dashboard/assets/img/brand/favicon.png') }}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('assets/argon-dashboard/assets/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/argon-dashboard/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}"
        rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('assets/argon-dashboard/assets/css/argon-dashboard.css?v=1.1.0') }}" rel="stylesheet" />
    {{-- datatables --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dataTables/dataTables.min.css') }}">
    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <!-- Animate -->
    <link href="{{ asset('assets/animation/animate.css') }}" rel="stylesheet">
    {{-- sweetalert --}}
    <link href="{{ asset('assets/sweetalert/dist/sweetalert2.all.min.css') }}" rel="stylesheet">
    {{-- sweetalert 2 --}}

</head>
