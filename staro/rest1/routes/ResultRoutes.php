<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
//require '../vendor/autoload.php';

/**
 * @OA\Get(path="/results", tags={"results"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all results from the API. ",
 *         @OA\Response( response=200, description="List of results.")
 * )
 */

Flight::route("GET /results", function(){
  $user = Flight::get('user');
  if(isset($user)){
    Flight::json(Flight::result_service()->get_all());
  } else {
    Flight::json(["message" => "User token doesn't exist."], 404);
  }
});
    

/**
  * @OA\Get(path="/result_by_id", tags={"results"}, security={{"ApiKeyAuth": {}}},
  *     @OA\Parameter(in="query", name="id", example=1, description="Result ID", required = true, @OA\Schema(
 *             type="integer",
 *             format="int64",
 *             example=17
 *         )
 *         ),
  *     @OA\Response(response="200", description="Fetch individual result")
  * )
  */
Flight::route("GET /result_by_id", function(){
  $user = Flight::get('user');
  if(isset($user)){
    Flight::json(Flight::result_service()->get_by_id(Flight::request()->query['id']));
  } else {
    Flight::json(["message" => "User token doesn't exist."], 404);
  }
});
    


 /**
  * @OA\Get(path="/results/{id}", tags={"results"}, security={{"ApiKeyAuth": {}}},
  *     @OA\Parameter(in="path", name="id", example=1, description="Result ID"),
  *     @OA\Response(response="200", description="Fetch individual result")
  * )
  */
Flight::route("GET /results/@id", function($id){
  $user = Flight::get('user');
  if(isset($user)){
    Flight::json(Flight::result_service()->get_by_id($id));
  } else {
    Flight::json(["message" => "User token doesn't exist."], 404);
  }
});
    
 /**
 * @OA\Delete(
 *     path="/results/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Delete result",
 *     tags={"results"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Result ID"),
 *     @OA\Response(
 *         response=200,
 *         description="Result deleted"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */
Flight::route("DELETE /results/@id", function($id){
  $user = Flight::get('user');
  if(isset($user)){
    Flight::result_service()->delete($id);
    Flight::json(['message'=>"result deleted successfully"]);
  } else {
    Flight::json(["message" => "User token doesn't exist."], 404);
  }
});
    

/**
* @OA\Post(
*     path="/results", security={{"ApiKeyAuth": {}}},
*     description="Add result",
*     tags={"results"},
*     @OA\RequestBody(description="Add new result", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="categoryApoints", type="int", example="-1",	description="Category A point"),
*    				@OA\Property(property="categoryBpoints", type="int", example="3",	description="Category B point"),
*                   @OA\Property(property="categoryCpoints", type="int", example="1",	description="Category C point"),
*                   @OA\Property(property="categoryDpoints", type="int", example="-1",	description="Category D point"),
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Result has been added"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route("POST /results", function(){
  $user = Flight::get('user');
  if(isset($user)){
    $request= FLight::request()->data->getData();
    Flight::json(['message'=>"result added successfully",
                  'data'=>Flight::result_service()->add($request)
                ]);
  } else {
    Flight::json(["message" => "User token doesn't exist."], 404);
  }
});
 

/**
 * @OA\Put(
 *     path="/results/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Edit result",
 *     tags={"results"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Result ID"),
 *     @OA\RequestBody(description="Result info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				@OA\Property(property="categoryApoints", type="int", example="-1",	description="Category A point"),
 *    				@OA\Property(property="categoryBpoints", type="int", example="3",	description="Category B point"),
 *                   @OA\Property(property="categoryCpoints", type="int", example="1",	description="Category C point"),
 *                   @OA\Property(property="categoryDpoints", type="int", example="-1",	description="Category D point"),
 *        )
 *     )),
 *     @OA\Response(
 *         response=200,
 *         description="Result has been edited"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */
//update
Flight::route("PUT /results/@id", function($id){
  $user = Flight::get('user');
  if(isset($user)){
    $result = Flight::request()->data->getData();
    #$response=$users_dao->update($user,$id);
    Flight::json(['message'=>"result edit successfully",
                  'data'=>Flight::result_service()->update($result,$id)
                ]);
  } else {
    Flight::json(["message" => "User token doesn't exist."], 404);
  }
});
    


?>