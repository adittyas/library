{{-- <!-- Core --> --}}
<script src="{{ asset('assets/argon-dashboard/assets/js/plugins/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/argon-dashboard/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}">
</script>

{{-- <!--   Argon JS   --> --}}
<script src="{{ asset('assets/argon-dashboard/assets/js/argon-dashboard.min.js') }}"></script>

{{-- sweetalert --}}
<script src="{{ asset('assets/sweetalert/dist/sweetalert2.all.min.js') }}"></script>

{{-- datatables --}}
<script src="{{ asset('assets/dataTables/DataTables-1.10.20/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/dataTables/DataTables-1.10.20/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dataTables/Buttons-1.6.1/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/dataTables/Buttons-1.6.1/js/buttons.bootstrap4.min.js') }}"></script>
{{-- <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script> --}}
{{-- <script src="{{ asset('assets/dataTables/dataTables.min.js') }}"></script> --}}

{{-- validator --}}
<script src="{{ asset('js/jquery.validate.js') }}"></script>
<script src="{{ asset('js/additional-methods.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

{{-- main --}}
<script type='module' src="{{ asset('js/main.js') }}"></script>

{{-- autocomplete --}}
<script src="{{ asset('js/autocomplete.js') }}"></script>
<script src="{{ asset('js/chart.js') }}"></script>
<script src="{{ asset('assets/chosen_v1.8.7/chosen.jquery.min.js') }}"></script>

{{-- sweetalert for PHP --}}
@include('sweetalert::alert')
{{--
<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
<script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
</script> --}}
@yield('scriptFoot')
