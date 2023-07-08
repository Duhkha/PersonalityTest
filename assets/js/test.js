$(document).ready(function() {
  

    $.ajax({
      url: "/Dedsec/rest/test", //replace
      method: "GET",
      success: function(response) {
        
        console.log(response);
        renderTest(response);
        attachCheckForCompletion();
        
      },
      error: function(error) {
        
        console.log("Error: ", error);
       
      }
    });
  
    function renderTest(questions) {
      questions.forEach((question, index) => {
          const questionHTML = `
              <div class="question py-5 centerContent" data-aos="fade-left" data-category="${question.category}">
                  <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                      <h4 class="title" style="color: #2be4a2;">${index + 1}. ${question.question}</h4>
                      <ul class="list-unstyled">
                          ${question.answers
                              .map(
                                  (answer) =>
                                      `<li>
                                          <div class="answer">
                                              <input type="radio" name="q${index + 1}" value="${answer.points}">
                                              <label>${answer.answer}</label>
                                          </div>
                                      </li>`
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
            $.ajax({
              url: "/Dedsec/rest/results", 
              method: "POST",
              contentType: "application/json",
              data: JSON.stringify({
                categoryApoints: categoryApoints,
                categoryBpoints: categoryBpoints,
                categoryCpoints: categoryCpoints,
                categoryDpoints: categoryDpoints,
              }),
              success: function(response) {
                
                console.log(response);
                const typeId = getCategoryTypeId(categoryApoints, categoryBpoints, categoryCpoints, categoryDpoints);
                const userId = 2; // Replace with actual user ID
                const resultId = response.data.id; 
      

                document.getElementById("questionsDiv").style.display = "none";
                document.getElementById("submitButton").style.display = "none";
                
                // Insert data into histories table
                $.ajax({
                  url: "/Dedsec/rest/histories", // Replace 
                  method: "POST",
                  contentType: "application/json",
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
                  url: "/Dedsec/rest/types/" + typeId, // Replace 
                  method: "GET",
                  success: function(typeResponse) {
                      console.log(typeResponse);
              
                      // Hide the submit button
                      document.getElementById("submitButton").style.display = "none";
              
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
      
      
      
      
      
      
      
  });
  