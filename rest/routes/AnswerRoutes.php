<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

/**
 * @OA\Get(path="/answers", tags={"answers"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all answers from the API. ",
 *         @OA\Response( response=200, description="List of answers.")
 * )
 */
Flight::route("GET /answers", function(){
    Flight::json(Flight::answer_service()->get_all());
});

/**
  * @OA\Get(path="/answer_by_id", tags={"answers"}, security={{"ApiKeyAuth": {}}},
  *     @OA\Parameter(in="query", name="id", example=1, description="Answers ID", required = true, @OA\Schema(
 *             type="integer",
 *             format="int64",
 *             example=17
 *         )
 *         ),
  *     @OA\Response(response="200", description="Fetch individual answers")
  * )
  */
Flight::route("GET /answer_by_id", function(){
    Flight::json(Flight::answer_service()->get_by_id(Flight::request()->query['id']));
 });

 /**
  * @OA\Get(path="/answers/{id}", tags={"answers"}, security={{"ApiKeyAuth": {}}},
  *     @OA\Parameter(in="path", name="id", example=1, description="Answers ID"),
  *     @OA\Response(response="200", description="Fetch individual answer")
  * )
  */
Flight::route("GET /answers/@id", function($id){
    Flight::json(Flight::answer_service()->get_by_id($id));
});

/**
 * @OA\Delete(
 *     path="/answers/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Delete answer",
 *     tags={"answers"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Answer ID"),
 *     @OA\Response(
 *         response=200,
 *         description="Answer deleted"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */
Flight::route("DELETE /answers/@id", function($id){
    Flight::answer_service()->delete($id);
    Flight::json(['message'=>"answer deleted successfully"]);
});

/**
* @OA\Post(
*     path="/answers", security={{"ApiKeyAuth": {}}},
*     description="Add answer",
*     tags={"answers"},
*     @OA\RequestBody(description="Add new answer", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="answers", type="string", example="I follow the already established guidelines",	description="Answer"),
*    				@OA\Property(property="points", type="int", example="-1",	description="Point" ),
*                   @OA\Property(property="questionid", type="int", example="9",	description="Answer ID" ),
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Answer has been added"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route("POST /answers", function(){
    $request= Flight::request()->data->getData();
    Flight::json(['message'=>"Answer added successfully",
                  'data'=>Flight::answer_service()->add($request)
                ]);
    
});


/**
 * @OA\Put(
 *     path="/answers/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Edit answers",
 *     tags={"answers"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Answer ID"),
 *     @OA\RequestBody(description="Answers info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				@OA\Property(property="answers", type="string", example="I follow the already established guidelines",	description="Answer"),
*    				@OA\Property(property="points", type="int", example="-1",	description="Point" ),
*                   @OA\Property(property="questionid", type="int", example="9",	description="Answer ID" ),
 *        )
 *     )),
 *     @OA\Response(
 *         response=200,
 *         description="Answers has been edited"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */
//update
Flight::route("PUT /answers/@id", function($id){
    $answer = Flight::request()->data->getData();
    #$response=$users_dao->update($user,$id);
    Flight::json(['message'=>"answer edit successfully",
                  'data'=>Flight::answer_service()->update($answer,$id)
                ]);
    
});


?>