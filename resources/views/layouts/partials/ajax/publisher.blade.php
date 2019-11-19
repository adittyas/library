<script>
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var route = '{{ route("publisher.index") }}';
    var token = '{{ auth()->user()->api_token }}';
      $.ajaxSetup({
        headers: {
                'Authorization': `Bearer ${token}`,
                'Accept': 'application/json',
            },
    });
    var detailRows = [];

$('#publishers-table tbody').on('click', 'tr td.details-control', function () {
    var tr = $(this).closest('tr');
    var row = dt.row(tr);
    var idx = $.inArray(tr.attr('id'), detailRows);
    if (row.child.isShown()) {
        tr.removeClass('details');
        row.child.hide();
        // Remove from the 'open' array
        detailRows.splice(idx, 1);
    } else {
        tr.addClass('details');
        row.child(format(row.data())).show();
        // Add to the 'open' array
        if (idx === -1) {
            detailRows.push(tr.attr('id'));
        }
    }
});
    function format(d) {
        return `
            <div class='row'>
                <div class='col-lg-2'>Name<br>Email<br>Contact<br>Address<br>Created<br>update
                </div>
                <div class='col-lg-10'>
                : ${d.name}<br>: ${d.email}<br>: ${d.address}<br>: ${d.contact}<br>: ${d.created}<br>: ${d.updated}
                </div>
            </div>`;
    }
    var dt = $('#publishers-table').DataTable({
        "language": {
            "paginate": {
                "previous": "<i class='fas fa-angle-left' />",
                "next": "<i class='fas fa-angle-right' />",
            }
        },

        serverSide: true,
        processing: true,
        ajax: {
            url: "{{ route('publisher.index') }}",
            headers: {
                'Authorization': `Bearer ${token}`,
                'Accept': 'application/json',
            },
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
        function modalUp() {
            $('#publisherModal').modal('show');
            $('#publisherForm').trigger('reset')
        }
         $("#new-publisher").on('click', function (e) {
            method = 'store';
            e.preventDefault();
            modalUp();
            $('#publisherModalLabel').text('Create New publisher');
            $('#publisherForm button[type="submit"]').text('Save');
            $('#publisherForm #id').remove();
            $('#publisherForm input[name="_method"]').val('post');

        });
         $("#publishers-table").on('click','.edit-publisher', function (e) {
            method = 'update';
            e.preventDefault();
            modalUp();
            $('#publisherModalLabel').text('Edit Data publisher');
            $('#publisherForm button[type="submit"]').text('Update');
            $('#publisherForm #id').remove();
            $('#publisherForm').append(`<input type='hidden' id='id' />`);
            $('#publisherForm input[name="_method"]').val('patch');
            let id = $(this).data('id');
            $.ajax({
                url : `{{ route('publisher.index') }}/${id}/edit`,
                type : 'get',
                success: function (data) {
                    let addressing = {
                        province : data.profile.province,
                        district : data.profile.district,
                        sub_district : data.profile.sub_district,
                        urban_village : data.profile.urban_village,
                        postal_code : data.profile.postal_code,
                    };
                    ajx(addressing);
                    $('#id').val(data.publisher.id);
                    $('#address').val(data.profile.address);
                    $('#postal-code').val(data.profile.postal_code);
                    $('#contact').val(data.profile.contact);
                    $('#first-name').val(data.publisher.first_name);
                    $('#last-name').val(data.publisher.last_name);
                    $('#email').val(data.publisher.email);
                    $('#id-employee').val(data.publisher.id_employee);
                    $('#role option').each(function (e,i) {
                        if(i.value.toLowerCase()==data.publisher.role.toLowerCase()){
                            i.selected = true;
                        }
                    });
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });

</script>
