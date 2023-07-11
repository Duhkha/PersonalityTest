$(document).ready(function () {
    // AJAX REQUEST TO GET ALL TYPES
    getTypes();

    function getTypes() {
        $.ajax({
            url: 'rest/types',
            type: 'GET',
            dataType: 'json',
            beforeSend: function (xhr) {
                xhr.setRequestHeader(
                  "Authorization",
                  localStorage.getItem("user_token")
                );
              },
            success: function (data) {
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td>' + data[i].name + '</td>' +
                        '<td>' + data[i].description + '</td>' +
                        '<td>' + data[i].responsibilities + '</td>' +
                        '<td>' + data[i].requirements + '</td>' +
                        '</tr>';
                }
                $("#types-table").html(html);
                console.log(data);
            },
            error: function (xhr, status, error) {
                console.log(error); // Log any error messages
            }
        });
    }

});

