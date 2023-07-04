<?php


//gets question and answers for test
Flight::route('GET /test', function(){
    $questions = Flight::question_service()->get_all(); 
    foreach ($questions as &$question) {
        $answers = Flight::answer_service()->get_by_question_id($question['questionid']);
        $question['answers'] = $answers;
    }
    Flight::json($questions);
});


Flight::route('POST /test_results', function(){
    $request = Flight::request()->data->getData();
    $results = Flight::result_service()->add_results($request['userid'], $request['categoryApoints'], $request['categoryBpoints'], $request['categoryCpoints'], $request['categoryDpoints']);
    Flight::json(['message'=>"Test results saved successfully", 'data'=> $results]);
});



Flight::route('POST /test_results', function(){
    $request = Flight::request()->data->getData();
    $type_id = calculate_type_id($request['categoryApoints'], $request['categoryBpoints'], $request['categoryCpoints'], $request['categoryDpoints']);
    $results_id = Flight::results_service()->add_test_results($request['user_id'], $request['categoryApoints'], $request['categoryBpoints'], $request['categoryCpoints'], $request['categoryDpoints']);
    $history_id = Flight::history_service()->add(['userid' => $request['user_id'], 'typeid' => $type_id, 'resultid' => $results_id]);
    Flight::json(['message'=>"Test results saved successfully", 'data'=> $history_id]);
});




function calculate_type_id($categoryApoints, $categoryBpoints, $categoryCpoints, $categoryDpoints) {
    $type_id = "";

    $type_id .= ($categoryApoints > 0) ? "1" : "0";
    $type_id .= ($categoryBpoints > 0) ? "1" : "0";
    $type_id .= ($categoryCpoints > 0) ? "1" : "0";
    $type_id .= ($categoryDpoints > 0) ? "1" : "0";

    return $type_id;
}


?>