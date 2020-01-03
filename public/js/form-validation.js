$(document).ready(function () {
    const validator = $(".customValidate").validate({
        rules: {
            firstname: "required",
            lastname: "required",
            name: "required",
            title: "required",
            address: "required",
            province: "required",
            contact: {
                required: true,
                number: true
            },
            email: {
                required: true,
                email: true
            },
        },
        messages: {
            firstname: "Please enter field firstname",
            lastname: "Please enter field lastname",
            name: "Please enter field name",
            title: "Please enter field title",
            email: "Please enter a valid email address",
            province: "Please select province",
            agree: "Please accept our policy"
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
            $(element).parents(".checkValidate").addClass("has-danger").removeClass("has-success");
            $(element).next("span").addClass("fas fa-times").removeClass("fas fa-check");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents(".checkValidate").addClass("has-success").removeClass("has-danger");
            $(element).next("span").addClass("fas fa-check").removeClass("fas fa-times");
        }
    });
});
