// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the login form
    $("form[name='login']").validate({
        // Specify validation rules
        rules: {
            username: "required",
            password: "required"
        },
        // Specify validation error messages
        messages: {
            username: "Please enter your username",
            password: "Please enter your password"
        },
        // Submit the form if it is valid
        submitHandler: function(form) {
            form.submit();
        }
    });
});
