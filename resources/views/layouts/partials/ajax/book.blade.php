<script>
    // member page javascript //
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var route = '{{ route("book.index") }}';
    var token = '{{ auth()->user()->api_token }}';

    function format(d) {
        return `
            <div class='row'>
                <div class='col-lg-2'>Title<br>Author<br>Category<br>Hal<br>Qty<br>Publisher<br>Created<br>update
                </div>
                <div class='col-lg-10'>
                : ${d.title}<br>: ${d.author}<br>: ${d.category}<br>: ${d.hal}<br>: ${d.qty}<br>: ${d.publisher}<br>: ${d.created}<br>: ${d.updated}
                </div>
            </div>`;
    }
    $.ajaxSetup({
        headers: {
                'Authorization': `Bearer ${token}`,
                'Accept': 'application/json',
            },
    });
    var dt = $('#books-table').DataTable({
        "language": {
            "paginate": {
                "previous": "<i class='fas fa-angle-left' />",
                "next": "<i class='fas fa-angle-right' />",
            }
        },

        serverSide: true,
        processing: true,
        ajax: {
            url: "{{ route('book.index') }}",
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
                data: 'title',
            },
            {
                data: 'category',
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
    var detailRows = [];
      $('#books-table tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );
            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();
                // Remove from the 'open' array
                detailRows.splice( idx, 1 );
            } else {
                tr.addClass( 'details' );
                row.child( format( row.data() ) ).show();
                // Add to the 'open' array
                if ( idx === -1 ) {
                    detailRows.push( tr.attr('id') );
                }
            }
        } );
        // On each draw, loop over the `detailRows` array and show any child rows
        dt.on( 'draw', function () {
            $.each( detailRows, function ( i, id ) {
                $('#'+id+' td.details-control').trigger( 'click' );
            } );
        } );
</script>
