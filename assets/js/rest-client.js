var RestClient = { 
    get: function (url, success, error) { 
    $.ajax({ 
        url: "rest/" + url, 
        type: "GET", 
        beforeSend: function (xhr) { 
            xhr.setRequestHeader( 
                "Authorization",
             localStorage.getItem("user_token") 
          );
        },
        success: function (data) { 
            if (success) success(data); 
        },
        error: function (data) { 
            if (error) error(data); 
        },
      });
    },
  };
  