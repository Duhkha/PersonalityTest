const questionElement = document.getElementById('question');
const optionsContainer = document.getElementById('options-container');
const nextButton = document.getElementById('next-btn');
const resultContainer = document.getElementById('result-container');
const resultElement = document.getElementById('result');

const questions = [
  {
    question: 'Choose an answer:',
    options: ['Option 1', 'Option 2', 'Option 3', 'Option 4']
  }
];

let currentQuestionIndex = 0;

// Display the current question and options
function displayQuestion() {
  const currentQuestion = questions[currentQuestionIndex];
  questionElement.textContent = `Question ${currentQuestionIndex + 1}: ${currentQuestion.question}`;

  // Clear previous options
  optionsContainer.innerHTML = '';

  // Display options
  currentQuestion.options.forEach((option, index) => {
    const button = document.createElement('button');
    button.classList.add('option');
    button.textContent = option;
    button.addEventListener('click', () => selectOption(index));
    optionsContainer.appendChild(button);
  });

  nextButton.style.display = 'none';
  resultContainer.style.display = 'none';
}

// Handle option selection
function selectOption(optionIndex) {
  const currentQuestion = questions[currentQuestionIndex];
  const selectedOption = currentQuestion.options[optionIndex];

  // Perform any desired actions with the selected option

  nextButton.style.display = 'block';
}

// Handle next button click
nextButton.addEventListener('click', () => {
  currentQuestionIndex++;
  if (currentQuestionIndex < questions.length) {
    displayQuestion();
  } else {
    showResult();
  }
});

// Display the result
function showResult() {
  resultElement.textContent = 'Your result will be displayed here';
  resultContainer.style.display = 'block';
}

// Start the test
displayQuestion();
