<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.partials.head')

<body class="">

    @include('layouts.partials.mobileNavigation')

    @include('layouts.partials.main_Open')
    {{-- content --}}
    @yield('content')
    @include('layouts.partials.main_Close')

    @include('layouts.partials.scripts')
</body>

</html>
