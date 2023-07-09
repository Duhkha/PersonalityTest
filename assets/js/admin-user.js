$(document).ready(function () {
    // AJAX REQUEST TO GET ALL USERS
    getUsers();

    function getUsers() {
        $.ajax({
            url: 'rest/users',
            type: 'GET',
            success: function (data) {
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td>' + data[i].name + '</td>' +
                        '<td>' + data[i].surname + '</td>' +
                        '<td>' + data[i].email + '</td>' +
                        '<td>' + data[i].password + '</td>' +
                        '<td><button class="btn btn-info" onClick="editUser(' + data[i].id + ')">Edit User</button></td>' +
                        '</tr>';
                }
                $("#users-table").html(html);
                console.log(data);
            },
            error: function () {
                toastr.error("Failed to retrieve users");
            }
        });
    }

    $.validator.addMethod(
        "email",
        function (value, element) {
            return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i.test(value);
        },
        "Please enter a valid email address!"
    );

    $("#addUserForm").validate({
        focusCleanup: true,
        errorElement: "em",
        rules: {
            name: "required",
            surname: "required",
            password: {
                required: true,
                minlength: 2,
                maxlength: 10,
            },
        },
        messages: {
            name: "Please enter your first name",
            surname: "Please enter your last name",
            email: "Please enter a valid email address",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 2 characters long",
                maxlength: "Your password cannot exceed 10 characters",
            }
        },
        highlight: function (element, errorClass) {
            $(element).fadeOut(function () {
                $(element).fadeIn();
            });
        },
        errorPlacement: function (error, element) {
            error.appendTo("#messageBox1");
        },
        submitHandler: function (form) {
            $.ajax({
                url: "rest/users",
                type: "POST",
                data: $("#addUserForm").serialize(),
                success: function () {
                    toastr.success("User added");
                    $("#addUserModal").modal("toggle");
                    getUsers();
                    form.reset();
                },
                error: function () {
                    toastr.error("User not added");
                }
            });
        }
    });
});

/*
$(document).ready(function () {
    // AJAX REQUEST TO GET ALL USERS
    getUsers();

    function getUsers() {
        $.get('rest/users', function (data) {
            var html = '';
            for (var i = 0; i < data.length; i++) {
                html += '<tr>' +
                    '<td>' + data[i].name + '</td>' +
                    '<td>' + data[i].surname + '</td>' +
                    '<td>' + data[i].email + '</td>' +
                    '<td>' + data[i].password + '</td>' +
                    '<td><button class="btn btn-info" onClick="editUser(' + data[i].id + ')">Edit User</button></td>' +
                    '</tr>';
            }
            $("#users-table").html(html);
            console.log(data);
        });
    }

    $.validator.addMethod(
        "email",
        function (value, element) {
            return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i.test(value);
        },
        "Please enter a valid email address!"
    );

    $("#addUserForm").validate({
        focusCleanup: true,
        errorElement: "em",
        rules: {
            name: "required",
            surname: "required",
            password: {
                required: true,
                minlength: 2,
                maxlength: 10,
            },
        },
        messages: {
            name: "Please enter your first name",
            surname: "Please enter your last name",
            email: "Please enter a valid email address",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 2 characters long",
                maxlength: "Your password cannot exceed 10 characters",
            }
        },
        highlight: function (element, errorClass) {
            $(element).fadeOut(function () {
                $(element).fadeIn();
            });
        },
        errorPlacement: function (error, element) {
            error.appendTo("#messageBox1");
        },
        submitHandler: function (form) {
            $.post("rest/users", $("#addUserForm").serialize())
                .done(function () {
                    toastr.success("User added");
                    $("#addUserModal").modal("toggle");
                    getUsers();
                    form.reset();
                })
                .fail(function () {
                    toastr.error("User not added");
                });
        }
    });

});*/
