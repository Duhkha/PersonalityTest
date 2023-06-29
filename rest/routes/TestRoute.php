<?php


//gets question and answers for test
Flight::route('GET /test', function(){
    $questions = Flight::question_service()->get_all(); // assuming get_all() returns all questions
    foreach ($questions as &$question) {
        $answers = Flight::answer_service()->get_by_question_id($question['QuestionID']); // assuming get_by_question_id() returns all answers for a question
        $question['answers'] = $answers;
    }
    Flight::json($questions);
});




?>