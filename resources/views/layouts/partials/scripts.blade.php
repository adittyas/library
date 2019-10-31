<!-- Scripts -->
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
<script src="{{ asset('assets/argon-dashboard/assets/js/plugins/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/argon-dashboard/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}">
</script>
<script type="text/javascript" charset="utf8" src="{{ asset('assets/dataTables/dataTables.min.js') }}"></script>
<!--   Optional JS   -->
<script src="{{ asset('assets/argon-dashboard/assets/js/plugins/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('assets/argon-dashboard/assets/js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
<!--   Argon JS   -->
<script src="{{ asset('assets/argon-dashboard/assets/js/argon-dashboard.min.js?v=1.1.0') }}" .></script>

<script>
    $(document).ready(function(){
        $('#users-table').DataTable({
            "language": {
                "paginate": {
                    "next": "<i class='fas fa-angle-right'/>",
                    "previous": "<i class='fas fa-angle-left'/>",
            }
        },
        processing: true,
        serverSide: true,
        ajax: {
        url: '{{ route('data.user') }}',
        type: 'GET'
        data: {
            'headers' => [
            'Authorization' => 'Bearer '.$token,
            'Accept' => 'application/json',
            ],
        }
        },
        columns: [
        { data: 'id', name: 'id' },
        { data: 'name', name: 'name' },
        { data: 'email', name: 'email' },
        { data: 'created_at', name: 'created_at' },
        { data: 'updated_at', name: 'updated_at' }
        ]
        });

        let sa = $('#users-table #users-table_next').attr('class');
        console.log(sa);
    });

</script>
<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"> </script>
<script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
</script>
