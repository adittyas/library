jQuery.validator.setDefaults({
    debug: true,
    success: "valid"
});

const validator = $(".customValidate").validate({
    rules: {
        field1: 'required',
        field2: 'required',
        // user
        firstName_user: "required",
        lastName_user: "required",
        idEmployee_user: "required",
        role_user: {
            required: true
        },
        address_user: "required",
        email_user: {
            required: true,
            email: true
        },
        provinces_user: {
            required: true
        },
        districts_user: {
            required: true
        },
        subDistricts_user: {
            required: true
        },
        urbanVillages_user: {
            required: true
        },
        postalCode_user: {
            required: true,
            number: true
        },
        contact_user: {
            required: true,
            number: true
        },
        // end of user

        // member
        name_member: "required",
        nim_member: {
            required: true,
            number: true,
        },
        email_member: {
            required: true,
            email: true
        },
        contact_member: {
            required: true,
            number: true
        },
        active_member: 'required',
        reason_member: 'required',
        // end of member

        // pubslisher
        name_publisher: "required",
        email_publisher: {
            required: true,
            email: true
        },
        contact_publisher: {
            required: true,
            number: true
        },
        address_publisher: "required",
        // end publisher

        // book
        title_book: "required",
        author_book: 'required',
        hal_book: {
            required: true,
            number: true
        },
        category_book: 'required',
        publisher_book: 'required',
        qty_bookin: "required",
        info_bookIn: {
            required: true
        },
        // end book
        // guest
        iden_guest: 'required',
        type_guest: {
            required: true
        },
        name_guest: {
            required: true,
            maxlength: 32
        },
    },
    messages: {
        email_user: "Please enter a valid email address",
        email_member: "Please enter a valid email address",
        email_publisher: "Please enter a valid email address",
        contact_publisher: "Please enter a valid contact",
        contact_user: "Please enter a valid contact",
        contact_member: "Please enter a valid contact",
        hal_book: "Please enter a valid hal",
        nim_member: "Please enter a valid NIM",
        postalCode_user: "Please enter a valid postal code",
    },
    errorElement: "small",
    errorPlacement: function (error, element) {
        // Add the `help-block` class to the error element
        error.addClass("text-danger");

        // Add `has-feedback` class to the parent div.form-group
        // in order to add icons to inputs
        element.parents(".checkValidate").addClass("has-feedback");

        if (element.prop("type") === "checkbox") {
            error.insertAfter(element.parent("label"));
        } else {
            error.insertAfter(element);
        }

        // Add the span element, if doesn't exists, and apply the icon classes to it.
        // if (!element.next("span")[0]) {
        //     $("<span class='fas fa-check form-control-feedback'></span>").insertAfter(element);
        // }
    },
    success: function (label, element) {
        // Add the span element, if doesn't exists, and apply the icon classes to it.
        // if (!$(element).next("span")[0]) {
        //     $("<span class='fas fa-check form-control-feedback'></span>").insertAfter($(element));
        // }
    },
    highlight: function (element, errorClass, validClass) {
        // $(element).parents(".checkValidate").addClass("has-danger").removeClass("has-success");
        // $(element).next("span").addClass("fas fa-times").removeClass("fas fa-check");
    },
    unhighlight: function (element, errorClass, validClass) {
        // $(element).parents(".checkValidate").addClass("has-success").removeClass("has-danger");
        // $(element).next("span").addClass("fas fa-check").removeClass("fas fa-times");
    }
});

export {
    validator
};
