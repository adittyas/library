$(document).ready(function () {
    bsCustomFileInput.init()
    $(".dataTables_wrapper .row:not(:nth-child(2))").addClass("px-4");
    $('#contact,#postal_Code,#id-employee,#publisher_contact').keypress(function (e) {

        let char = e.which || e.keyCode;
        if (char >= 48 && char <= 57) {
            return true;
        } else {
            return false;
        }
    });
})
// $('#submit').attr('disabled', true);

function validateForm() {
    var cc = [],
        ss = [],
        tx = [];
    $(".customValidate").each(function () {
        let input = $(this).find('input');
        let select = $(this).find('select');
        let textarea = $(this).find('textarea');
        input.each(function (e, i) {
            cc.push(i);
        })
        select.each(function (e, i) {
            ss.push(i);
        })
        textarea.each(function (e, i) {
            tx.push(i);
        })
    });
    let item = [...cc, ...ss, ...tx];

    if (item.every(e => e.value != '') && item.every(e => e.value != null) && item.every(e => e.value.toLowerCase() != 'ignore')) {
        $('#submit').attr('disabled', false);
    } else {
        $('#submit').attr('disabled', true);
    }

}

// $('.customValidate input, .customValidate textarea').on('input', function () {
//     validateForm();
// });
// $('.customValidate select').on('change', function () {
//     validateForm();
// });


// bootstrapValidate([
//     '#publisher_name', '#publisher_contact', '#publisher_address', '#first-name', '#last-name', '#id-employee', '#departement', '#address', '#province', '#districts', '#sub-districts', '#urban-village', '#postal-code', '#contact'
// ], 'required:Please fill out this field!');
// bootstrapValidate('#id-employee', 'min:4:Enter at least 4 characters!');
// bootstrapValidate('#input', 'min:20:Enter at least 20 characters!');
// bootstrapValidate(['#email', '#publisher_email'], 'email:Enter a valid email address');
// bootstrapValidate(['#contact', '#publisher_contact'], 'numeric:Please only enter numeric characters!');
