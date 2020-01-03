export default function (update = null) {

    let url = 'http://dev.farizdotid.com/api/daerahindonesia/provinsi';

    function errorAjax(err, loc) {
        Swal.fire({
            type: 'error',
            title: `API server${ loc ? loc : ''}`,
            text: err,
        })
    }
    $('#province').empty().append(`<option value='' >Loading...</option>`);
    $.ajax({
        url: url,
        type: 'GET',
        success: function (provinces) {

            provinces = JSON.parse(provinces);
            $('#provinces_user').empty().append(`<option value='' >Select...</option>`);
            if (provinces.error == false) {
                $(provinces.semuaprovinsi).each(function (i, val) {
                    if (update != null && update.province.toLowerCase() == val.nama.toLowerCase()) {
                        $('#provinces_user').append(`<option selected value='${val.nama}' data-id-province='${val.id}'>${val.nama}</option>`);
                    } else {
                        $('#provinces_user').append(`<option value='${val.nama}' data-id-province='${val.id}'>${val.nama}</option>`);
                    }
                });
                // console.log($('#province option:not(.ignore)').find(':selected'));
                $('#provinces_user').find(':selected').trigger('change');
                $('#provinces_user').change(function () {
                    let idProvince = $(this).find(':selected').attr('data-id-province');
                    $('#districts_user').empty().append(`<option value='' >Loading...</option>`);
                    $.get(`${url}/${idProvince}/kabupaten`, function (districts, status) {
                        districts = JSON.parse(districts);
                        console.log(districts);
                        if (districts.error == false) {
                            $('#districts_user').empty().append(`<option value='' >Select...</option>`);
                            $(districts.kabupatens).each(function (ib, xal) {
                                if (update != null && update.district.toLowerCase() == xal.nama.toLowerCase()) {
                                    $('#districts_user').append(`<option selected value='${xal.nama}' data-id-districts='${xal.id}'>${xal.nama}</option>`);
                                } else {
                                    $('#districts_user').append(`<option value='${xal.nama}' data-id-districts='${xal.id}'>${xal.nama}</option>`);
                                }
                            });
                            $('#districts_user').find(':selected').trigger('change');
                            $('#districts_user').change(function () {
                                let idDistricts = $(this).find(':selected').attr('data-id-districts');
                                $('#subDistricts_user').empty().append(`<option value='' >Loading...</option>`);
                                $.get(`${url}/kabupaten/${idDistricts}/kecamatan`, function (subDistricts, status) {
                                    subDistricts = JSON.parse(subDistricts);
                                    if (subDistricts.error == false) {
                                        $('#subDistricts_user').empty().append(`<option value='' >Select...</div option>`);
                                        $(subDistricts.kecamatans).each(function (ic, zal) {
                                            if (update != null && update.sub_district.toLowerCase() == zal.nama.toLowerCase()) {
                                                $('#subDistricts_user').append(`<option selected value='${zal.nama}' data-id-sub-districts='${zal.id}'>${zal.nama}</option>`).trigger('change');
                                            } else {
                                                $('#subDistricts_user').append(`<option value='${zal.nama}' data-id-sub-districts='${zal.id}'>${zal.nama}</option>`);
                                            }

                                        });
                                        $('#subDistricts_user').change(function () {
                                            let idSubDistricts = $(this).find(':selected').attr('data-id-sub-districts');
                                            $('#urbanVillages_user').empty().append(`<option value='' >Loading...</option>`);
                                            $.get(`${url}/kabupaten/kecamatan/${idSubDistricts}/desa`, function (urbanVillage, status) {
                                                urbanVillage = JSON.parse(urbanVillage);
                                                if (urbanVillage.error == false) {
                                                    $('#urbanVillages_user').empty().append(`<option value='' >Select...</di option>`);
                                                    $(urbanVillage.desas).each(function (id, pal) {
                                                        if (update != null && update.urban_village.toLowerCase() == pal.nama.toLowerCase()) {
                                                            $('#urbanVillages_user').append(`
                                                             <option selected value='${pal.nama}' data-id-sub-districts='${pal.id}'>${pal.nama}</option>`);
                                                        } else {
                                                            $('#urbanVillages_user').append(`
                                                     <option value='${pal.nama}' data-id-sub-districts='${pal.id}'>${pal.nama}</option>`);
                                                        }
                                                    });
                                                } else if (urbanVillage.error == true) {
                                                    $('#urbanVillages_user').empty().append(`<option value='' disabled selected>error: ${urbanVillage.message}</option>`);
                                                }
                                            });
                                        });
                                    } else if (subDistricts.error == true) {
                                        $('#subDistricts_user').empty().append(`<option value='' disabled selected>error: ${subDistricts.message}</option>`);
                                    }
                                });
                            });
                        } else if (districts.error == true) {
                            $('#districts_user').empty().append(`<option value='' disabled selected>error: ${districts.message}</option>`);
                        }
                    });
                });
            } else if (provinces.error == true) {
                $('#province_user').empty().append(`<option value='' selected selected>error!!!</option>`);
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
};
