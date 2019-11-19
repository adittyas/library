{{-- <!-- Scripts --> --}}
<script src="{{ asset('assets/argon-dashboard/assets/js/plugins/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/argon-dashboard/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}">
</script>
{{-- <script src="{{ asset('assets/bootstrap-validate/dist/bootstrap-validate.js') }}"></script> --}}
{{-- <!--   Optional JS Chart  --> --}}
{{-- <script src="{{ asset('assets/argon-dashboard/assets/js/plugins/chart.js/dist/Chart.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/argon-dashboard/assets/js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
--}}
{{-- <!--   Argon JS   --> --}}
<script src="{{ asset('assets/argon-dashboard/assets/js/argon-dashboard.min.js?v=1.1.0') }}"></script>
{{-- sweetalert --}}
<script src="{{ asset('assets/sweetalert/dist/sweetalert2.all.min.js') }}"></script>
{{-- datatables --}}
<script src="{{ asset('assets/dataTables/dataTables.min.js') }}"></script>
{{-- bootstrap custom file --}}
<script src="{{ asset('js/bs-file-input.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
<script src="{{ asset('js/form-validation.js') }}"></script>
{{-- data API --}}
{{-- <script src="{{ asset('js/publisher.js') }}"></script> --}}
{{-- datatables --}}
@include('sweetalert::alert')
@auth
@includeWhen(auth()->user()->role == 'master','layouts.partials.ajax.user')
@includeWhen(url()->current()===route('index.publisher'), 'layouts.partials.ajax.publisher')
@includeWhen(url()->current()===route('index.member'), 'layouts.partials.ajax.member')
@includeWhen(url()->current()===route('index.book'), 'layouts.partials.ajax.book')

@endauth
