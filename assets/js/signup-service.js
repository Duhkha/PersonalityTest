$(document).ready(function() {
    // Initialize form validation
    $("#addUserForm").validate({
      rules: {
        name: "required",
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
          minlength: 6
        }
      },
      messages: {
        name: "Please enter your first name",
        email: {
          required: "Please enter your email address",
          email: "Please enter a valid email address"
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 6 characters long"
        }
      },
      submitHandler: function(form) {
        // Form is valid, perform the signup request
        var userData = {
          name: $("#name").val(),
          surname: $("#surname").val(),
          email: $("#email").val(),
          password: $("#password").val()
        };
  
        // Make the signup request using AJAX
        $.ajax({
          type: "POST",
          url: "rest/signup", // Replace with the actual URL endpoint for signup
          data: userData,
          success: function(response) {
            // Signup successful, handle the response
            toastr.success("Registration successful");
            // Optionally, redirect the user to another page
            window.location.href = "login.html";
          },
          error: function(xhr, status, error) {
            // Signup failed, handle the error
            var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : "Signup failed";
            toastr.error(errorMessage);
          }
        });
      }
    });
  });
  

  