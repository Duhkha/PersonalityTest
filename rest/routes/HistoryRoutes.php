<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

/**
 * @OA\Get(path="/histories", tags={"histories"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all histories from the API. ",
 *         @OA\Response( response=200, description="List of histories.")
 * )
 */
Flight::route("GET /histories", function(){
  $user = Flight::get('user');
  if(isset($user)){
    Flight::json(Flight::history_service()->get_all());
  } else {
    Flight::json(["message" => "User token doesn't exist."], 404);
  };
});

/**
  * @OA\Get(path="/history_by_id", tags={"histories"}, security={{"ApiKeyAuth": {}}},
  *     @OA\Parameter(in="query", name="id", example=1, description="History ID", required = true, @OA\Schema(
 *             type="integer",
 *             format="int64",
 *             example=17
 *         )
 *         ),
  *     @OA\Response(response="200", description="Fetch individual history")
  * )
  */
Flight::route("GET /history_by_id", function(){
  $user = Flight::get('user');
  if(isset($user)){
    Flight::json(Flight::history_service()->get_by_id(Flight::request()->query['id']));
  } else {
    Flight::json(["message" => "User token doesn't exist."], 404);
  };
 });

 /**
  * @OA\Get(path="/histories/{id}", tags={"histories"}, security={{"ApiKeyAuth": {}}},
  *     @OA\Parameter(in="path", name="id", example=1, description="History ID"),
  *     @OA\Response(response="200", description="Fetch individual history")
  * )
  */
Flight::route("GET /histories/@id", function($id){
  $user = Flight::get('user');
  if(isset($user)){
    Flight::json(Flight::history_service()->get_by_id($id));
  } else {
    Flight::json(["message" => "User token doesn't exist."], 404);
  };
});

 /**
 * @OA\Delete(
 *     path="/histories/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Delete history",
 *     tags={"histories"},
 *     @OA\Parameter(in="path", name="id", example=1, description="History ID"),
 *     @OA\Response(
 *         response=200,
 *         description="History deleted"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */
Flight::route("DELETE /histories/@id", function($id){
  $user = Flight::get('user');
  if(isset($user)){
    Flight::history_service()->delete($id);
    Flight::json(['message'=>"history deleted successfully"]);
  } else {
    Flight::json(["message" => "User token doesn't exist."], 404);
  };
});

/**
* @OA\Post(
*     path="/histories", security={{"ApiKeyAuth": {}}},
*     description="Add history",
*     tags={"histories"},
*     @OA\RequestBody(description="Add new history", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="userid", type="int", example="3",	description="User ID"),
*    				@OA\Property(property="date", type="date", example="2023-06-06",	description="Date" ),
*                   @OA\Property(property="typeid", type="int", example="1010",	description="Type ID" ),
*                   @OA\Property(property="resultid", type="int", example="2",	description="Result ID" ),
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="History has been added"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route("POST /histories", function(){
  $user = Flight::get('user');
  if(isset($user)){
    $request= Flight::request()->data->getData();
    Flight::json(['message'=>"history added successfully",
                  'data'=>Flight::history_service()->add($request)
                ]);
  } else {
    Flight::json(["message" => "User token doesn't exist."], 404);
  };
});

/**
 * @OA\Put(
 *     path="/histories/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Edit history",
 *     tags={"histories"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Hsitory ID"),
 *     @OA\RequestBody(description="History info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				@OA\Property(property="userid", type="int", example="3",	description="User ID"),
 *    				@OA\Property(property="date", type="date", example="2023-06-06",	description="Date" ),
 *                   @OA\Property(property="typeid", type="int", example="1010",	description="Type ID" ),
 *                   @OA\Property(property="resultid", type="int", example="2",	description="Result ID" ),
 *        )
 *     )),
 *     @OA\Response(
 *         response=200,
 *         description="History has been edited"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */
Flight::route("PUT /histories/@id", function($id){
  $user = Flight::get('user');
  if(isset($user)){
    $history = Flight::request()->data->getData();
    Flight::json(['message'=>"history edit successfully",
                  'data'=>Flight::history_service()->update($history,$id)
                ]);
  } else {
    Flight::json(["message" => "User token doesn't exist."], 404);
  };
});



?>