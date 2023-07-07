var AdminUserService = {
    init: function () {
      $("#addUserForm").validate({
        submitHandler: function (form) {
          var user = Object.fromEntries(new FormData(form).entries());
          AdminUserService.addUser(user);
          form.reset();
        },
      });
      $("#editUserForm").validate({
        submitHandler: function (form) {
          var user = Object.fromEntries(new FormData(form).entries());
          AdminUserService.editUser(user);
        },
      });
  
      AdminUserService.getUsers();
    },
  
    getUsers: function () {
      $.get('rest/users', function (data) {
        var html = '';
        $("#users-table").html(html);
        console.log(data);
        for (var i = 0; i < data.length; i++) {
          html +=
            '<tr>' +
            '<td>' + data[i].name + '</td>' +
            '<td>' + data[i].surname + '</td>' +
            '<td>' + (data[i].email ? data[i].email : "No email address entered") + '</td>' +
            '<td>' + data[i].password + '</td>' +
            '<td><button class="btn btn-info" onclick="AdminUserService.showEditDialog(' + data[i].id + ')">Edit User</button></td>' +
            '</tr>';
        }
  
        $("#users-table").html(html);
        console.log(data);
  
        Utils.datatable(
          "users-table",
          [
            { data: "name", title: "Name" },
            { data: "surname", title: "Surname" },
            { data: "password", title: "Password" },
            { data: "email", title: "Email" },
            { data: "edit_user", title: "Edit User" },
          ],
          data
        );
  
        console.log(data);
      })
      .fail(function (error) {
        toastr.error("Failed to retrieve users: " + error.responseText);
      });
    },
  
    addUser: function (user) {
      console.log("post");
      $.ajax({
        url: "rest/users",
        type: "POST",
        data: JSON.stringify(user),
        contentType: "application/json",
        dataType: "json",

        beforeSend: function (xhr) {
          xhr.setRequestHeader(
              "Authorization",
              localStorage.getItem("user_token")
          );
            },
        success: function () {
          $("#addUserModal").modal("hide");
          toastr.success("User has been added!");
          AdminUserService.getUsers();
        },
        error: function (error) {
          toastr.error("Failed to add user: " + error.responseText);
        },
      });
    },
  
    showEditDialog: function (id) {
      $("#editUserModal").modal("show");
      $("#editModalSpinner").show();
      $("#editUserForm").hide();
      $.get("rest/users/" + id, function (data) {
        console.log(data);
        $("#edit_first_name").val(data.name);
        $("#edit_last_name").val(data.surname);
        $("#edit_email").val(data.email);
        $("#edit_password").val(data.password);
        $("#edit_user_id").val(data.id);
        $("#editModalSpinner").hide();
        $("#editUserForm").show();
      })
      .fail(function (error) {
        toastr.error("Failed to retrieve user: " + error.responseText);
      });
    },
  
    editUser: function (user) {
      console.log("edit");
      $.ajax({
        url: "rest/users/" + user.id,
        type: "PUT",
        data: JSON.stringify(user),
        contentType: "application/json",
        dataType: "json",
        beforeSend: function (xhr) {
          xhr.setRequestHeader(
              "Authorization",
              localStorage.getItem("user_token")
          );
            },
        success: function () {
          toastr.success("User has been updated successfully");
          $("#editUserModal").modal("toggle");
          AdminUserService.getUsers();
        },
        error: function (error) {
          toastr.error("Failed to update user: " + error.responseText);
        },
      });
    },
  };
  
  AdminUserService.init();
  