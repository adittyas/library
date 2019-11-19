<script>
    $(document).ready(function(){
        var url = 'http://dev.farizdotid.com/api/daerahindonesia/provinsi';

function errorAjax(err, loc) {
    Swal.fire({
        type: 'error',
        title: `API server${ loc ? loc : ''}`,
        text: err,
    })
}

const ajx = function (update=null) {
    let xx = [];
    $('#province').empty().append(`<option value='ignore' class='ignore' select hidden>Loading...</option>`);
    $.ajax({
        url: url,
        type: 'GET',
        success: function (provinces) {
            provinces = JSON.parse(provinces);
            $('#province').empty().append(`<option value='ignore' class='ignore' select hidden>Select...</option>`);
            if (provinces.error == false) {
                $(provinces.semuaprovinsi).each(function (i, val) {
                    if(update!=null && update.province.toLowerCase() == val.nama.toLowerCase()){
                        $('#province').append(`<option selected value='${val.nama}' data-id-province='${val.id}'>${val.nama}</option>`);
                    }else{
                        $('#province').append(`<option value='${val.nama}' data-id-province='${val.id}'>${val.nama}</option>`);
                    }
                });
                // console.log($('#province option:not(.ignore)').find(':selected'));
                $('#province').find(':selected').trigger('change');
                $('#province').change(function () {
                    let idProvince = $(this).find(':selected').attr('data-id-province');
                    $('#districts').empty().append(`<option value='ignore' class='ignore' select hidden>Loading...</option>`);
                    $.get(`${url}/${idProvince}/kabupaten`, function (districts, status) {
                        districts = JSON.parse(districts);
                        if (districts.error == false) {
                            $('#districts').empty().append(`<option value='ignore' class='ignore' select hidden>Select...</option>`);
                            $(districts.kabupatens).each(function (ib, xal) {
                                if(update!=null && update.district.toLowerCase() == xal.nama.toLowerCase()){
                                    $('#districts').append(`<option selected value='${xal.nama}' data-id-districts='${xal.id}'>${xal.nama}</option>`);
                                }else{
                                    $('#districts').append(`<option value='${xal.nama}' data-id-districts='${xal.id}'>${xal.nama}</option>`);
                                }
                            });
                            $('#districts').find(':selected').trigger('change');
                            $('#districts').change(function () {
                                let idDistricts = $(this).find(':selected').attr('data-id-districts');
                                $('#sub-districts').empty().append(`<option value='ignore' class='ignore' select hidden>Loading...</option>`);
                                $.get(`${url}/kabupaten/${idDistricts}/kecamatan`, function (subDistricts, status) {
                                    subDistricts = JSON.parse(subDistricts);
                                    if (subDistricts.error == false) {
                                        $('#sub-districts').empty().append(`<option value='ignore' class='ignore' select hidden>Select...</ option>`);
                                        $(subDistricts.kecamatans).each(function (ic, zal) {
                                            if(update!=null && update.sub_district.toLowerCase() == zal.nama.toLowerCase()){
                                                $('#sub-districts').append(`<option selected value='${zal.nama}' data-id-sub-districts='${zal.id}'>${zal.nama}</option>`).trigger('change');
                                            }else{
                                                $('#sub-districts').append(`<option value='${zal.nama}' data-id-sub-districts='${zal.id}'>${zal.nama}</option>`);
                                            }

                                        });
                                        $('#sub-districts').change(function () {
                                            let idSubDistricts = $(this).find(':selected').attr('data-id-sub-districts');
                                            $('#urban-village').empty().append(`<option value='ignore' class='ignore' select hidden>Loading...</option>`);
                                            $.get(`${url}/kabupaten/kecamatan/${idSubDistricts}/desa`, function (urbanVillage, status) {
                                                urbanVillage = JSON.parse(urbanVillage);
                                                if (urbanVillage.error == false) {
                                                    $('#urban-village').empty().append(`<option value='ignore' class='ignore' select hidden>Select...</ option>`);
                                                    $(urbanVillage.desas).each(function (id, pal) {
                                                        if(update!=null && update.urban_village.toLowerCase() == pal.nama.toLowerCase()){
                                                            $('#urban-village').append(`
                                                            <option selected value='${pal.nama}' data-id-sub-districts='${pal.id}'>${pal.nama}</option>`);
                                                        }else{
                                                            $('#urban-village').append(`
                                                    <option value='${pal.nama}' data-id-sub-districts='${pal.id}'>${pal.nama}</option>`);
                                                        }
                                                    });
                                                }else if (urbanVillage.error == true) {
                                                    $('#urban-village').empty().append(`<option value='ignore' class='ignore' disabled selected>error: ${urbanVillage.message}</option>`);
                                                }
                                            });
                                        });
                                    } else if (subDistricts.error == true) {
                                        $('#sub-districts').empty().append(`<option value='ignore' class='ignore' disabled selected>error: ${subDistricts.message}</option>`);
                                    }
                                });
                            });
                        } else if (districts.error == true) {
                            $('#districts').empty().append(`<option value='ignore' class='ignore' disabled selected>error: ${districts.message}</option>`);
                        }
                    });
                });
            } else if (provinces.error == true) {
                $('#province').empty().append(`<option value='ignore' class='ignore' selected selected>error!!!</option>`);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            if (XMLHttpRequest.readyState == 4) {
                // HTTP error (can be checked by XMLHttpRequest.status and XMLHttpRequest.statusText)
            } else if (XMLHttpRequest.readyState == 0) {
                // Network error (i.e. connection refused, access denied due to CORS, etc.)
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Network error to API server!',
                })
            } else {
                // something weird happening
            }
        }
    });
}

        var csrf = $('meta[name="csrf-token"]').attr('content');
        var route = '{{ route('user.index') }}';
        var token = '{{ auth()->user()->api_token }}';
        function format ( d ) {
            let uri = '{{ asset('images') }}/';
            return `
            <div class='row'>
                <div class='col-lg-2'>
                Full Name<br>ID Employee<br>Email<br>Contact<br>Address<br>Created<br>update
                </div>
                <div class='col-lg-7'>
                : ${d.first_name +' '+ d.last_name}<br>: ${d.id_employee}<br>: ${d.email}<br>: ${d.contact}<br>: ${d.address}<br>: ${d.created}<br>: ${d.updated}
                </div>
                <div class='col-lg-3'>
                <img style='max-width: 128px;' class='mx-auto d-block rounded-circle img-fluid' src='${d.avatar}'/>
                </div>
            </div>`;
        }

        var dt = $('#users-table').DataTable({
            "language": {
                "paginate": {
                    "previous": "<i class='fas fa-angle-left' />",
                    "next": "<i class='fas fa-angle-right' />",
                }
            },

            serverSide: true,
            processing: true,
            ajax: {
                url: '{{ route('user.index') }}',
                headers: {
                'Authorization' : `Bearer ${token}`,
                'Accept' : 'application/json',
                },
                type: 'get',
            },
            columns: [
                {
                    class: "details-control",
                    orderable: false,
                    searchable: false,
                    data: null,
                    defaultContent: ""
                },
                { data: 'first_name', name:'first_name'},
                { data: 'last_name', name:'last_name'},
                { data: 'email', name: 'email'},
                { data: 'action', name: 'action', searchable: false, orderable:false}
            ],
            order: [[4, 'desc']]
        });
        // Array to track the ids of the details displayed rows
        var detailRows = [];

        $('#users-table tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );
            if ( row.child.isShown() ) {
        tr.removeClass( 'details' );
        row.child.hide();
        // Remove from the 'open' array
        detailRows.splice( idx, 1 );
        }
        else {
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
        // todo: timer the alert
        var timer = 2000;
        $("#users-table_wrapper .row:not(:nth-child(2))" ).addClass( "px-4" );

        $("#users-table").on('click','.delete-user', function () {
            let id = $(this).data('id');
            let url = `${route}/${id}`
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#5e72e4',
                cancelButtonColor: '#f5365c',
                focusCancel: true,
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        type: 'success',
                        timer: timer,
                        showConfirmButton: false
                    })
                    $.ajax({
                        url : url,
                        type: 'DELETE',
                        headers: {
                        'Authorization' : `Bearer ${token}`,
                        'Accept' : 'application/json',
                        },
                        data : {
                            '_token': csrf
                        },
                        success: function (data) {
                            dt.ajax.reload();
                        },
                        error: function (data) {
                            Swal.fire({
                            title: 'Error!',
                            text: data.statusText,
                            type: 'success',
                            })
                            console.log(data);
                        }

                    });
                }
            })
        });

        $("#users-table").on('click','.edit-user', function (e) {
            method = 'update';
            e.preventDefault();
            $('#userModalLabel').text('Edit Data User');
            $('#userForm').trigger('reset');
            $('#userForm #id').remove();
            $('#userForm').append(`<input type='hidden' id='id' />`);
            $('#userModal').modal('show');
            $('#userForm input[name="_method"]').val('patch');
            let id = $(this).data('id');
            $.ajax({
                url : `{{ route('user.index') }}/${id}/edit`,
                type : 'get',
                headers: {
                'Authorization' : `Bearer ${token}`,
                'Accept' : 'application/json',
                },
                success: function (data) {
                    let addressing = {
                        province : data.profile.province,
                        district : data.profile.district,
                        sub_district : data.profile.sub_district,
                        urban_village : data.profile.urban_village,
                        postal_code : data.profile.postal_code,
                    };
                    ajx(addressing);
                    $('#id').val(data.user.id);
                    $('#address').val(data.profile.address);
                    $('#postal-code').val(data.profile.postal_code);
                    $('#contact').val(data.profile.contact);
                    $('#first-name').val(data.user.first_name);
                    $('#last-name').val(data.user.last_name);
                    $('#email').val(data.user.email);
                    $('#id-employee').val(data.user.id_employee);
                    $('#role option').each(function (e,i) {
                        if(i.value.toLowerCase()==data.user.role.toLowerCase()){
                            i.selected = true;
                        }
                    });
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });

        $("#new-user").on('click', function (e) {
            method = 'store';
            e.preventDefault();
            $('#userModal').modal('show');
            $('#userModalLabel').text('Create New User');
            $('#userForm #id').remove();
            $('#userForm').trigger('reset');
            $('.customValidate').formReset();
            $('#userForm input[name="_method"]').val('post');
            ajx();
        });

        var route = '{{ route('user.store') }}';
        $(function () {
            $('#userForm').submit(function (e) {
                e.preventDefault();
                if ($(this).valid()) {
                     var url,id = $(this).find('#id').val();
                if(method=='store'){
                    url = route;
                    var title = 'Create new data!';
                    var text = 'new data has been addded.';
                }
                else if(method=='update'){
                    url = `${route}/${id}`;
                    var title = 'Update data success';
                    var text = 'Data has been updated';
                }
                var form = new FormData($(this).get(0));
                $.ajax({
                    url : url,
                    type : 'POST',
                    contentType: false,
                    processData: false,
                    headers: {
                    'Authorization' : `Bearer ${token}`,
                    'Accept' : 'application/json',
                    },
                    data : form,
                    success : function (data) {
                        console.log(url);
                        console.log(data);
                        if(data=='200'){
                            $('#userModal').modal('hide');
                            dt.ajax.reload();
                            setTimeout(
                                function(){
                                    Swal.fire({
                                        title: title,
                                        text: text,
                                        type: 'success',
                                        timer: timer,
                                        showConfirmButton: false
                                     })
                                 }, 500);
                        }
                    },
                    error : function (data) {
                        console.log(url);
                        console.log(data);
                    if(data.status==500){
                        $('#userModal').modal('hide');
                        setTimeout(
                        function(){
                            Swal.fire({
                            title: 'erorr!',
                            text: 'Duplicate entry in ID Employee or Email',
                            type: 'error',
                            timer: timer,
                            showConfirmButton: false
                        })
                        }, 500);
                        setTimeout(() => {
                            $('#userModal').modal('show');
                        }, 2500);
                        }
                        else{
                            $('#userModal').modal('hide');
                            Swal.fire({
                                title: 'erorr!',
                                text: data.statusText,
                                type: 'error',
                                timer: timer,
                            });
                        }
                    }
                });
                }

            });
        });
    });

</script>
