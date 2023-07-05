// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the registration form
    $("form[name='registration']").validate({
        // Specify validation rules
        rules: {
            firstname: "required",
            lastname: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            }
        },
        // Specify validation error messages
        messages: {
            firstname: "Please enter your first name",
            lastname: "Please enter your last name",
            email: "Please enter a valid email address",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters long"
            }
        },
        /*
        highlight: function(element, errorClass){
            $(element).fadeOut(function(){
                $(element).fadeIn();
            })
        },*/
        /*
        submitHandler: function(form, validator){
            $.post("rest/users", $("addUserForm").specialize())
        }
        invalidHandler: function(event, validator){
            var errors = validator.numberOfInvalids();
            toastr.error("Error");
            if(errors){
                var message = 
                    errors == 1
                     ?"You missed 1 field."
                     : "You missed " + errors + " fields.";
                $("div.error span").html(message);
                $("div.error").show();
            }else{
                $("div.error").hide();
            }
        },*/
        // Submit the form if it is valid
        submitHandler: function(form) {
            form.submit();
        }
    });
});

/*$(function() {
    // Initialize form validation on the registration form
    $("form[name='registration']").validate({
        // Specify validation rules
        rules: {
            firstname: "required",
            lastname: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            }
        },
        // Specify validation error messages
        messages: {
            firstname: "Please enter your first name",
            lastname: "Please enter your last name",
            email: "Please enter a valid email address",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters long"
            }
        },
        // Submit the form if it is valid
        submitHandler: function(form) {
            form.submit();
        }
    });

    // Show registration form and hide login form
    $("#register-link").click(function(e) {
        e.preventDefault();
        $(".form-container.login-form-container").hide();
        $(".form-container").show();
    });

    // Show login form and hide registration form
    $("#login-link").click(function(e) {
        e.preventDefault();
        $(".form-container.login-form-container").show();
        $(".form-container").hide();
    });
});
*/

/*// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the registration form
    $("form[name='registration']").validate({
        // Specify validation rules
        rules: {
            firstname: "required",
            lastname: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            }
        },
        // Specify validation error messages
        messages: {
            firstname: "Please enter your first name",
            lastname: "Please enter your last name",
            email: "Please enter a valid email address",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters long"
            }
        },
        // Submit the form if it is valid
        submitHandler: function(form) {
            form.submit();
        }
    });
});
*/