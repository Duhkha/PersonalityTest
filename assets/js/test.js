$(document).ready(function() {

  $("#testSpinner").show();
    $("#submitButton").hide();

  

    $.ajax({
      url: "rest/test", //replace
      method: "GET",
      beforeSend: function (xhr) {
        xhr.setRequestHeader(
          "Authorization",
          localStorage.getItem("user_token")
        );
      },
      success: function(response) {
        
        console.log(response);
        renderTest(response);
        attachCheckForCompletion();
        $("#testSpinner").hide();
        $("#submitButton").show();
        
      },
      error: function(error) {
        
        console.log("Error: ", error);
        $("#testSpinner").hide();
      }
    });
  
    function renderTest(questions) {
      questions.forEach((question, index) => {
        const questionHTML = `
          <div class="question py-5" data-aos="fade-left" data-category="${question.category}">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
              <h4 class="title" style="color: #2be4a2;">${index + 1}. ${question.question}</h4>
              <ul class="list-unstyled">
                ${question.answers
                  .map(
                    (answer) => `
                      <li>
                        <div class="answer">
                          <input type="radio" name="q${index + 1}" value="${answer.points}">
                          <label> ${answer.answer}</label>
                        </div>
                      </li>
                    `
                  )
                  .join("")}
              </ul>
            </div>
          </div>`;
        document.querySelector("#questionsDiv").insertAdjacentHTML("beforeend", questionHTML);
      });
    }
    
    
    
    
  
  
  
    function attachCheckForCompletion() {
        const submitButton = document.getElementById("submitButton");
        submitButton.addEventListener("click", function() {
          let categoryApoints = 0;
          let categoryBpoints = 0;
          let categoryCpoints = 0;
          let categoryDpoints = 0;
          const questions = Array.from(document.querySelectorAll(".question"));
      
          let isAllAnswered = true; // flag to track if all questions are answered
      
          questions.forEach((question, index) => {
            const selectedAnswer = document.querySelector(`input[name=q${index + 1}]:checked`);
            if (selectedAnswer) {
              const category = question.getAttribute("data-category");
              switch (category) {
                case "creativity":
                  categoryApoints += Number(selectedAnswer.value);
                  break;
                case "work-time":
                  categoryBpoints += Number(selectedAnswer.value);
                  break;
                case "aptitude":
                  categoryCpoints += Number(selectedAnswer.value);
                  break;
                case "teamwork":
                  categoryDpoints += Number(selectedAnswer.value);
                  break;
              }
            } else {
              isAllAnswered = false; // if any question is unanswered, set the flag to false
            }
          });
      
          if (!isAllAnswered) {
            // Check if all questions are answered
            event.preventDefault(); // Stop form submission
            document.getElementById("errorMsg").style.display = "block"; 
          } else {
            // Send the points to the backend

            $("#submitButton").hide();
            $("#testSpinner").show();
            document.getElementById("questionsDiv").style.display = "none";





            $.ajax({
              url: "rest/results", 
              method: "POST",
              contentType: "application/json",
              beforeSend: function (xhr) {
                xhr.setRequestHeader(
                  "Authorization",
                  localStorage.getItem("user_token")
                );
              },
              data: JSON.stringify({
                categoryApoints: categoryApoints,
                categoryBpoints: categoryBpoints,
                categoryCpoints: categoryCpoints,
                categoryDpoints: categoryDpoints,
              }),
              success: function(response) {
                
                console.log(response);
                const typeId = getCategoryTypeId(categoryApoints, categoryBpoints, categoryCpoints, categoryDpoints);
                const userId = getUserIdFromToken();
                const resultId = response.data.id; 
      

                //document.getElementById("questionsDiv").style.display = "none";
                //document.getElementById("submitButton").style.display = "none";
                
                // Insert data into histories table
                $.ajax({
                  url: "rest/histories", // Replace 
                  method: "POST",
                  contentType: "application/json",
                  beforeSend: function (xhr) {
                    xhr.setRequestHeader(
                      "Authorization",
                      localStorage.getItem("user_token")
                    );
                  },
                  data: JSON.stringify({
                    userid: userId,
                    typeid: typeId,
                    resultid: resultId,
                  }),
                  success: function(historyResponse) {
                    
                    console.log(historyResponse);
                  },
                  error: function(historyError) {
                    console.log("Error:", historyError);
                  },
                });

                $.ajax({
                  url: "rest/types/" + typeId, // Replace 
                  method: "GET",
                  beforeSend: function (xhr) {
                    xhr.setRequestHeader(
                      "Authorization",
                      localStorage.getItem("user_token")
                    );
                  },
                  success: function(typeResponse) {
                      console.log(typeResponse);
              
                      // Hide the submit button
                     // document.getElementById("submitButton").style.display = "none";
                     $("#testSpinner").hide();
                      // Update the type name and description
                      var typeName = document.getElementById("typeName");
                      typeName.textContent = typeResponse[0].name;  //ovdje je name od type
                      typeName.style.display = "block";
              
                      var typeDesc = document.getElementById("typeDesc");
                      typeDesc.textContent = typeResponse[0].description;  //i description
                      typeDesc.style.display = "block";
              
                      let randomIndex = Math.floor(Math.random() * 4) + 1; // Generate a random number between 1 and 4
                      let resultImage = document.getElementById("resultImage");
                      resultImage.innerHTML = `<img src="assets/img/details-${randomIndex}.png" class="img-fluid" alt="${typeName.textContent}">`;
                      

                     
                  },
                  error: function(typeError) {
                      console.log("Error:", typeError);
                  },
              });
              





              },
              error: function(error) {
                console.log("Error:", error);
              },
            });
          }
        });
      
        document.querySelectorAll("input[type=radio]").forEach((radio) => {
          radio.addEventListener("change", function() {
            document.getElementById("errorMsg").style.display = "none"; 
          });
        });
      }
      
      function getCategoryTypeId(categoryApoints, categoryBpoints, categoryCpoints, categoryDpoints) {
        const categoryA = categoryApoints > 0 ? "1" : "0";
        const categoryB = categoryBpoints > 0 ? "1" : "0";
        const categoryC = categoryCpoints > 0 ? "1" : "0";
        const categoryD = categoryDpoints > 0 ? "1" : "0";
      
       
        let typeId = categoryA + categoryB + categoryC + categoryD;
      
       
        return typeId;
      }

      function getUserIdFromToken() {
        const userToken = localStorage.getItem("user_token");
        // Decode the JWT to extract the payload
        const tokenPayload = atob(userToken.split(".")[1]);
        // Parse the payload as JSON
        const payloadJson = JSON.parse(tokenPayload);
        // Extract the user ID from the payload
        const userId = payloadJson.userid;
        return userId;
      }
      
      
      
      
      
      
      
  });
  