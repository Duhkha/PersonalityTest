var StudentService = { //This line declares a variable named StudentService and assigns it an object literal. This object will hold various methods related to student operations in the single-page application.
    init: function () { //This line defines the init method within the StudentService object. This method is used to initialize the student service and perform various setup tasks.
      $("#addStudentForm").validate({ //This line uses the jQuery library to apply form validation to the form with the id "addStudentForm". It sets up the form's validation rules and behavior.
        submitHandler: function (form) { //This line defines a callback function to be executed when the form is submitted successfully.
          var student = Object.fromEntries(new FormData(form).entries()); //This line retrieves the form data using the FormData API and converts it into an object using Object.fromEntries(). It creates a student object that represents the form data.
          StudentService.addStudent(student); // This line calls the addStudent method of the StudentService object and passes the student object as a parameter. It adds the student to the system.
          form.reset(); //This line resets the form fields to their default values after successful form submission.
        },
      });
      $("#editStudentForm").validate({ // This line applies form validation to the form with the id "editStudentForm". It sets up the form's validation rules and behavior.
        submitHandler: function (form) { //This line defines a callback function to be executed when the edit form is submitted successfully.
          var student = Object.fromEntries(new FormData(form).entries()); //This line retrieves the form data from the edit form and converts it into an object using Object.fromEntries(). It creates a student object representing the edited student data.
          StudentService.editStudent(student); //This line calls the editStudent method of the StudentService object and passes the student object as a parameter. It updates the student's information.
        },
      });
  
      StudentService.get_students_rest(); //This line calls the get_students_rest method of the StudentService object. It retrieves the list of students from the server and displays them.
    },
    getStudents: function () {
      $.get("rest/students", function (data) { //This line makes an AJAX GET request using the jQuery $.get method. It sends a request to the "rest/students" endpoint and expects a JSON response. The second argument is a callback function that will be executed when the response is received.
        var html = ""; //This initializes an empty string variable named html, which will be used to store the generated HTML code for displaying the student data.
        for (var i = 0; i < data.length; i++) {//This starts a loop to iterate over each student object in the data array.
          data[i].email = data[i].email ? data[i].email : "-"; // This line checks if the email property of the current student object (data[i]) exists. If it does, the value remains unchanged. Otherwise, it sets the value to a dash ("-").
          data[i].edit_student = //This line creates an edit_student property for the current student object and assigns it a string value representing an HTML button element. The button has a click event that calls the showEditDialog function from the StudentService object and passes the student's id as an argument.
            '<button class="btn btn-info" onClick="StudentService.showEditDialog(' +
            data[i].id +
            ')">Edit Student</button>';
          data[i]._student = // This line creates a _student property for the current student object and assigns it a string value representing an HTML button element. The button has a click event that calls the openConfirmationDialog function from the StudentService object and passes the student's id as an argument.
            '<button class="btn btn-danger" onClick="StudentService.openConfirmationDialog(' +
            data[i].id +
            ')"> Student</button>';
          /*html +=
            "<tr>" +
            "<td>" +
            data[i].first_name +
            "</td>" +
            "<td>" +
            data[i].last_name +
            "</td>" +
            "<td>" +
            (data[i].email ? data[i].email : "No data") +
            "</td>" +
            "<td>" +
            (data[i].password ? data[i].password : "No data") +
            "</td>" +
            '<td><button class="btn btn-info" onClick="StudentService.showEditDialog(' +
            data[i].id +
            ')">Edit Student</button></td>' +
            '<td><button class="btn btn-danger" onClick="StudentService.openConfirmationDialog(' +
            data[i].id +
            ')"> Student</button></td>' +
            "</tr>";*/
        }
        //$("#students-table").html(html);
  
        Utils.datatable( // This line calls a function named datatable from the Utils object (assuming it's defined elsewhere in the code). It passes three arguments to the function.
          "students-table", //This is the first argument and represents the ID of the HTML element where the data table will be initialized. It's likely a table element with the ID "students-table".
          [ //This is the second argument and represents an array of objects defining the columns of the data table. Each object contains the data and title properties.
            { data: "first_name", title: "Name" },
            { data: "last_name", title: "Surname" },
            { data: "password", title: "Password" },
            { data: "email", title: "Email" },
            { data: "edit_student", title: "Edit Student" },
            { data: "_student", title: " Student" },
          ],
          data //This is the third argument, which represents the data to be displayed in the data table. It's likely the data array obtained from the AJAX GET request earlier in the code.
        );
  
        console.log(data); //This line logs the data variable to the console. It's useful for debugging purposes to see the actual data received from the server.
      });
    },
  
    addStudent: function (student) {
      console.log("post"); //This line logs the string "post" to the console. It's likely used for debugging purposes to indicate that a POST request is being made.
      $.ajax({ //This line initiates an AJAX request using the $.ajax() function.
        url: "rest/student", //This specifies the URL to which the POST request will be sent. It's likely the endpoint for adding a new student.
        type: "POST", // This specifies the HTTP method of the request, which is "POST" in this case.
        beforeSend: function (xhr) { //This is a callback function that is executed before the request is sent. It's used to set custom headers on the request. In this case, it sets the "Authorization" header using the value obtained from localStorage.getItem("user_token").
          xhr.setRequestHeader(
            "Authorization",
            localStorage.getItem("user_token")
          );
        },
        data: JSON.stringify(student), // This specifies the data to be sent with the request. The student object is converted to a JSON string using JSON.stringify().
        contentType: "application/json", //This specifies the content type of the request payload, which is "application/json" in this case.
        dataType: "json", //This specifies the type of data expected in the response, which is JSON. This helps jQuery automatically parse the response as JSON.
        success: function (student) { //This is a callback function that is executed when the request is successful. It takes the response data as a parameter (which is also named student in this case).
          $("#addStudentModal").modal("hide");//This line hides the "addStudentModal" element, which is likely a modal dialog box for adding a student
          toastr.success("Student has been added!");//This displays a success message using the Toastr library. It indicates that the student has been successfully added.
          StudentService.getStudents();//This line calls the getStudents function of the StudentService object, likely to refresh the student list after a new student has been added.
        },
      });
    },
  
    showEditDialog: function (id) { //This defines a function named showEditDialog that takes an id parameter.
      $("#editStudentModal").modal("show"); //This line shows the "editStudentModal" element, which is likely a modal dialog box for editing a student.
      $("#editModalSpinner").show();//This line shows the "editModalSpinner" element, which is likely a spinner or loading indicator shown while the data is being fetched for editing the student.
      $("#editStudentForm").hide(); // This line hides the "editStudentForm" element, which is likely a form for editing the student.
      $.ajax({ //This line initiates an AJAX request using the $.ajax() function.
        url: "rest/students/" + id, //This specifies the URL to which the GET request will be sent. It's likely the endpoint for retrieving the details of a specific student based on the provided id.
        beforeSend: function (xhr) { //This is a callback function that is executed before the request is sent. It's used to set custom headers on the request. In this case, it sets the "Authorization" header using the value obtained from localStorage.getItem("user_token").
          xhr.setRequestHeader(
            "Authorization",
            localStorage.getItem("user_token")
          );
        },
        type: "GET", //This specifies the HTTP method of the request, which is "GET" in this case.
        success: function (data) { //This is a callback function that is executed when the request is successful. It takes the response data as a parameter (which is named data in this case).
          console.log(data); //This line logs the response data to the console. It's likely used for debugging purposes to inspect the retrieved student data.
          $("#edit_first_name").val(data.first_name); //This sets the value of the element with the ID "edit_first_name" to the first_name property of the retrieved student data.
          $("#edit_last_name").val(data.last_name);
          $("#edit_email").val(data.email);
          $("#edit_password").val(data.password);
          $("#edit_student_id").val(data.id);
          $("#editModalSpinner").hide();
          $("#editStudentForm").show();
        },
      });
    },
  //The editStudent function is responsible for updating a student's information by sending an AJAX request to the server using the HTTP PUT method. 
    editStudent: function (student) {
      console.log("edit"); //This line logs the message "edit" to the console. It can be used for debugging purposes.
      $.ajax({ //This line initiates an AJAX request using the jQuery library.
        url: "rest/student/" + student.id, // This line specifies the URL endpoint for the request. It appends the id property of the student object to the URL to indicate the specific student to update.
        beforeSend: function (xhr) { //This line sets up a callback function that is executed before the AJAX request is sent. It is used to modify the request headers. In this case, it sets the "Authorization" header using the value retrieved from the localStorage.
          xhr.setRequestHeader(
            "Authorization",
            localStorage.getItem("user_token")
          );
        },
        type: "PUT", //This line specifies the HTTP method of the request as PUT, indicating that the intention is to update the resource on the server.
        data: JSON.stringify(student), //This line converts the student object into a JSON string using JSON.stringify() and sets it as the request payload. It sends the updated student data to the server.
        contentType: "application/json", // This line specifies the content type of the request payload as JSON. It informs the server that the data being sent is in JSON format.
        dataType: "json", // This line specifies the expected data type of the response from the server. It indicates that the response should be parsed as JSON.
        success: function (result) { //- This line sets up a callback function to handle the successful response from the server. It receives the result parameter, which contains the response data.
          toastr.success("Student has been updated successfully"); //This line displays a success message using the Toastr library to notify the user that the student's information has been successfully updated.
          $("#editStudentModal").modal("toggle"); //This line toggles the visibility of the "editStudentModal" modal, closing it after the update operation.
          StudentService.getStudents(); // This line calls the getStudents method of the StudentService object. It retrieves the updated list of students from the server to reflect the changes made.
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) { //This line sets up a callback function to handle errors that occur during the AJAX request. It receives the XMLHttpRequest, textStatus, and errorThrown parameters, which provide details about the error.
          toastr.error("Error! Student has not been updated.");
        },
      });
    },
  
    openConfirmationDialog: function (id) { //This function is responsible for opening a confirmation dialog for deleting a student. It takes the id of the student as a parameter.
      $("#deleteStudentModal").modal("show"); //opens the modal dialog with the ID "deleteStudentModal", displaying it on the screen.
      $("#delete-student-body").html( //sets the HTML content of an element with the ID "delete-student-body". It displays a message asking the user if they want to delete the student with the given ID.
        "Do you want to delete student with ID = " + id
      );
      $("#student_id").val(id); //sets the value of an input field with the ID "student_id" to the provided id. This allows the value to be accessed later when deleting the student.
    },
    
    deleteStudent: function () {
      $.ajax({
        url: "rest/students/" + $("#student_id").val(),
        beforeSend: function (xhr) { //is a callback function that sets the "Authorization" header using the value retrieved from the localStorage. This is used for authentication purposes.
          xhr.setRequestHeader(
            "Authorization",
            localStorage.getItem("user_token")
          );
        },
        type: "DELETE",
        success: function (response) { //is a callback function that is executed when the AJAX request is successful. It receives the response from the server.
          console.log(response); //logs the response to the console.
          $("#deleteStudentModal").modal("hide"); //hides the modal dialog with the ID "deleteStudentModal".
          toastr.success(response.message); // displays a success message using the Toastr library, showing the message received from the server.
          StudentService.getStudents(); //calls the getStudents function of the StudentService object to refresh the student list after the deletion.
          //alert('deleted')
        },
        error: function (XMLHttpRequest, textStatus, errorThrow) {
          console.log("Error: " + errorThrow);
        },
      });
    },
    
    get_students_rest: function () {
      RestClient.get(
        "students",
        function (data) {
          for (var i = 0; i < data.length; i++) { 
            data[i].email = data[i].email ? data[i].email : "-"; 
            data[i].edit_student =
              '<button class="btn btn-info" onClick="StudentService.showEditDialog(' +
              data[i].id +
              ')">Edit Student</button>'; 
              data[i].delete_student =
              '<button class="btn btn-danger" onClick="StudentService.openConfirmationDialog(' +
              data[i].id +
              ')">Delete Student</button>'; 
          }
  
          Utils.datatable( 
            "students-table", 
            [ 
                { data: "first_name", title: "Name" },
              { data: "last_name", title: "Surname" },
              { data: "password", title: "Password" },
              { data: "email", title: "Email" },
              { data: "edit_student", title: "Edit Student" },
              { data: "delete_student", title: "Delete Student" },
            ],
            data 
            );
  
          console.log(data); 
        },
        function (data) {
          toastr.error(data.responseText); 
        }
      );
    },
  };
  