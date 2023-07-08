var UserService = {
    init: function() {
      var token = localStorage.getItem("user_token");
      if (token) {
        window.location.replace("index.html");
      }
      $("#login-form").validate({
        submitHandler: function(form) {
          var entity = Object.fromEntries(new FormData(form).entries());
          UserService.login(entity);
        },
      });
  /*
      $("#signup-form").validate({
        submitHandler: function(form) {
          var entity = {
            name: form.elements.name.value,
            surname: form.elements.surname.value,
            email: form.elements.email.value,
            password: form.elements.password.value
          };
          UserService.signup(entity);
        },
      });*/
    },

    login: function(entity) {
      $.ajax({
        url: "rest/login",
        type: "POST",
        data: JSON.stringify(entity),
        contentType: "application/json",
        dataType: "json",
        success: function(result) {
          console.log(result);
          localStorage.setItem("user_token", result.token);
          window.location.replace("index.html");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          toastr.error(XMLHttpRequest.responseJSON.message);
        },
      });
    },
  /*
    signup: function(entity) {
      $.ajax({
        url: "rest/signup",
        type: "POST",
        data: JSON.stringify(entity),
        contentType: "application/json",
        dataType: "json",
        success: function(result) {
          console.log(result);
          localStorage.setItem("user_token", result.token);
          window.location.replace("index.html");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          toastr.error(XMLHttpRequest.responseJSON.message);
        },
      });
    },
  
  
    signup: function(entity) {
        $.ajax({
          url: "rest/signup",
          type: "POST",
          data: entity, // Remove JSON.stringify() as it is not required when sending data as an object
          dataType: "json",
          success: function(result) {
            console.log(result);
            localStorage.setItem("user_token", result.token);
            window.location.replace("index.html");
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            toastr.error(XMLHttpRequest.responseJSON.message);
          },
        });
      },
    */
    logout: function() {
      localStorage.clear();
      window.location.replace("login.html");
    },
  };
  