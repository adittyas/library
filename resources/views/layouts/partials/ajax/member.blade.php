<script>
    // member page javascript //
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var route = '{{ route("member.index") }}';
    var token = '{{ auth()->user()->api_token }}';
     $.ajaxSetup({
        headers: {
                'Authorization': `Bearer ${token}`,
                'Accept': 'application/json',
            },
    });
    function format(d) {
        return `
            <div class='row'>
                <div class='col-lg-2'>Name<br>NIM<br>Email<br>Contact<br>Address<br>Created<br>update
                </div>
                <div class='col-lg-10'>
                : ${d.name}<br>: ${d.nim}<br>: ${d.email}<br>: ${d.contact}<br>: ${d.address}<br>: ${d.created}<br>: ${d.updated}
                </div>
            </div>`;
    }

    var dt = $('#members-table').DataTable({
        "language": {
            "paginate": {
                "previous": "<i class='fas fa-angle-left' />",
                "next": "<i class='fas fa-angle-right' />",
            }
        },

        serverSide: true,
        processing: true,
        ajax: {
            url: "{{ route('member.index') }}",
            type: 'get',
        },
        columns: [{
                class: "details-control",
                orderable: false,
                searchable: false,
                data: null,
                defaultContent: ""
            },
            {
                data: 'name',
            },
            {
                data: 'contact',
            },
            {
                data: 'action',
                name: 'action',
                searchable: false,
                orderable: false
            }
        ],
        order: [
            [2, 'desc']
        ]
    });
      // On each draw, loop over the `detailRows` array and show any child rows
        dt.on( 'draw', function () {
            $.each( detailRows, function ( i, id ) {
                $('#'+id+' td.details-control').trigger( 'click' );
            } );
        } );
</script>
