$(document).ready(function () {
    // AJAX REQUEST TO GET ALL TYPES
    getTypes();

    function getTypes() {
        $.ajax({
            url: 'rest/types',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td>' + data[i].name + '</td>' +
                        '<td>' + data[i].description + '</td>' +
                        '<td>' + data[i].responsibilities + '</td>' +
                        '<td>' + data[i].requirements + '</td>' +
                        '<td><button class="btn btn-info" onClick="editType(' + data[i].id + ')">Edit Type</button></td>' +
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

    function editType(id) {
        // Your implementation for editing a type goes here
    }
});


/*$(document).ready(function () {
    // AJAX REQUEST TO GET ALL TYPES
    getTypes();

    function getTypes() {
        $.get('rest/types', function (data) {
            var html = '';
            for (var i = 0; i < data.length; i++) {
                html += '<tr>' +
                    '<td>' + data[i].name + '</td>' +
                    '<td>' + data[i].description + '</td>' +
                    '<td>' + data[i].responsibilities + '</td>' +
                    '<td>' + data[i].requirements + '</td>' +
                    '<td><button class="btn btn-info" onClick="editType(' + data[i].id + ')">Edit Type</button></td>' +
                    '</tr>';
            }
            $("#types-table").html(html);
            console.log(data);
        });
    }

    function editType(id) {
        // Your implementation for editing a type goes here
    }
});*/
