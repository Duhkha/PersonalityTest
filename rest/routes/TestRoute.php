<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

/**
 * @OA\Get(path="/test", tags={"test"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all tests from the API. ",
 *         @OA\Response( response=200, description="List of tests.")
 * )
 */
//gets question and answers for test
Flight::route('GET /test', function(){
    $user = Flight::get('user');
    if(isset($user)){
        $questions = Flight::question_service()->get_all(); 
        foreach ($questions as &$question) {
            $answers = Flight::answer_service()->get_by_question_id($question['questionid']);
            $question['answers'] = $answers;
        }
        Flight::json($questions);
    } else {
        Flight::json(["message" => "User token doesn't exist."], 404);
    };
});

/**
 * @OA\Post(
 *     path="/test_results",
 *     tags={"test"},
 *     security={{"ApiKeyAuth": {}}},
 *     description="Save test results",
 *     @OA\RequestBody(
 *         description="Test results data",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(property="userid", type="integer", example=1, description="User ID"),
 *                 @OA\Property(property="categoryApoints", type="integer", example=3, description="Category A points"),
 *                 @OA\Property(property="categoryBpoints", type="integer", example=2, description="Category B points"),
 *                 @OA\Property(property="categoryCpoints", type="integer", example=1, description="Category C points"),
 *                 @OA\Property(property="categoryDpoints", type="integer", example=4, description="Category D points")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Test results saved successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Test results saved successfully"),
 *             @OA\Property(property="data", type="object")
 *         )
 *     )
 * )
 */
Flight::route('POST /test_results', function(){
    $user = Flight::get('user');
    if(isset($user)){
        $request = Flight::request()->data->getData();
        $type_id = calculate_type_id($request['categoryApoints'], $request['categoryBpoints'], $request['categoryCpoints'], $request['categoryDpoints']);
        $results_id = Flight::results_service()->add_test_results($request['user_id'], $request['categoryApoints'], $request['categoryBpoints'], $request['categoryCpoints'], $request['categoryDpoints']);
        $history_id = Flight::history_service()->add(['userid' => $request['user_id'], 'typeid' => $type_id, 'resultid' => $results_id]);
        Flight::json(['message'=>"Test results saved successfully", 'data'=> $history_id]);
    } else {
        Flight::json(["message" => "User token doesn't exist."], 404);
    };
});


?>