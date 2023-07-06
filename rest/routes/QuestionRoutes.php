<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
//require '../vendor/autoload.php';

/**
 * @OA\Get(path="/questions", tags={"questions"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all questions from the API. ",
 *         @OA\Response( response=200, description="List of questions.")
 * )
 */
//works
Flight::route("GET /questions", function(){
    Flight::json(Flight::question_service()->get_all());
});

/**
  * @OA\Get(path="/question_by_id", tags={"questions"}, security={{"ApiKeyAuth": {}}},
  *     @OA\Parameter(in="query", name="id", example=1, description="Question ID", required = true, @OA\Schema(
 *             type="integer",
 *             format="int64",
 *             example=17
 *         )
 *         ),
  *     @OA\Response(response="200", description="Fetch individual question")
  * )
  */
//works
Flight::route("GET /question_by_id", function(){
    Flight::json(Flight::question_service()->get_by_id(Flight::request()->query['id']));
 });

 /**
  * @OA\Get(path="/questions/{id}", tags={"questions"}, security={{"ApiKeyAuth": {}}},
  *     @OA\Parameter(in="path", name="id", example=1, description="Question ID"),
  *     @OA\Response(response="200", description="Fetch individual question")
  * )
  */
//works
Flight::route("GET /questions/@id", function($id){
    Flight::json(Flight::question_service()->get_by_id($id));
});

 /**
 * @OA\Delete(
 *     path="/questions/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Delete question",
 *     tags={"questions"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Question ID"),
 *     @OA\Response(
 *         response=200,
 *         description="Question deleted"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */
Flight::route("DELETE /questions/@id", function($id){
    Flight::question_service()->delete($id);
    Flight::json(['message'=>"Question deleted successfully"]);
});

/**
* @OA\Post(
*     path="/questions", security={{"ApiKeyAuth": {}}},
*     description="Add question",
*     tags={"questions"},
*     @OA\RequestBody(description="Add new question", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="question", type="string", example="How do you approach problem-solving in your work?",	description="Question"),
*    				@OA\Property(property="category", type="string", example="Creativity",	description="Category" ),
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Question has been added"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route("POST /questions", function(){
    $request= Flight::request()->data->getData();
    Flight::json(['message'=>"Question added successfully",
                  'data'=>Flight::question_service()->add($request)
                ]);
    
});

/**
 * @OA\Put(
 *     path="/questions/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Edit question",
 *     tags={"questions"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Question ID"),
 *     @OA\RequestBody(description="Question info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				@OA\Property(property="question", type="string", example="How do you approach problem-solving in your work?",	description="Question"),
*    				@OA\Property(property="category", type="string", example="Creativity",	description="Category" ),
 *        )
 *     )),
 *     @OA\Response(
 *         response=200,
 *         description="Question has been edited"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */
//update
Flight::route("PUT /questions/@id", function($id){
    $question = Flight::request()->data->getData();
    #$response=$users_dao->update($user,$id);
    Flight::json(['message'=>"Question edit successfully",
                  'data'=>Flight::question_service()->update($question,$id)
                ]);
    
});



?>