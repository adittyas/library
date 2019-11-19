<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.partials.head')

<body class="bg-default">
    <div id='app' class="main-content">
        <div class="header bg-gradient-primary py-4 py-lg-4">
            <div class="container">
                <div class="header-body text-center mb-8 mb-lg-8">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6">
                            <h1 class="text-white text-uppercase">{{ config('app.name') }}!</h1>
                            <p class="text-lead text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Nulla ornare, turpis at vestibulum cursus,</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-3">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-9">
                    @yield('content')
                </div>
            </div>
        </div>
        <footer class="py-5">
            <div class="container">
                <div class="row ">
                    <div class="col-xl-12">
                        <div class="copyright text-center text-muted">
                            © 2018 <a href="{{ config('app.name', 'Library') }}.test" class="font-weight-bold ml-1"
                                target="_blank">aditTyas</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    @include('layouts.partials.scripts')
</body>

</html>
