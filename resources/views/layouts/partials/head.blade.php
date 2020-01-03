<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
    <!-- CSRF Token -->
    <meta name="api-token" content="{{ auth()->user()->api_token }}">
    @endauth


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
    <!-- argon Files -->

    {{-- <link href="{{ asset('assets/dataTables/Buttons-1.6.1/css/buttons.dataTables.min.css') }}" rel="stylesheet" />
    --}}
    {{-- <link href="{{ asset('assets/argon-dashboard/assets/css/argon-dashboard.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dataTables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/dataTables/Buttons-1.6.1/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" /> --}}
    {{-- <link href="{{ asset('assets/dataTables/DataTables-1.10.20/css/jquery.dataTables.min.css') }}" rel="stylesheet"
    /> --}}

    {{-- datatables --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/dataTables/dataTables.min.css') }}"> --}}
    <!-- Animate -->
    {{-- <link href="{{ asset('assets/animation/animate.css') }}" rel="stylesheet"> --}}
    {{-- sweetalert --}}
    {{-- <link href="{{ asset('assets/sweetalert/dist/sweetalert2.all.min.css') }}" rel="stylesheet"> --}}
    {{-- autocomplete --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/autocomplete.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/chosen_v1.8.7/chosen.min.css') }}"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <!-- Styles -->
    <link href="{{ asset('css/application.css') }}" rel="stylesheet">

</head>
