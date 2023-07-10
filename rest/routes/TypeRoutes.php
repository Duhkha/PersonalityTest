<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


/**
 * @OA\Get(path="/types", tags={"types"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all types from the API. ",
 *         @OA\Response( response=200, description="List of types.")
 * )
 */
Flight::route("GET /types", function(){
    Flight::json(Flight::type_service()->get_all());
});

/**
  * @OA\Get(path="/type_by_id", tags={"types"}, security={{"ApiKeyAuth": {}}},
  *     @OA\Parameter(in="query", name="id", example=1, description="Type ID", required = true, @OA\Schema(
 *             type="integer",
 *             format="int64",
 *             example=17
 *         )
 *         ),
  *     @OA\Response(response="200", description="Fetch individual types")
  * )
  */
Flight::route("GET /type_by_id", function(){
    Flight::json(Flight::type_service()->get_by_id(Flight::request()->query['id']));
 });

/**
  * @OA\Get(path="/types/{id}", tags={"types"}, security={{"ApiKeyAuth": {}}},
  *     @OA\Parameter(in="path", name="id", example=1, description="Type ID"),
  *     @OA\Response(response="200", description="Fetch individual type")
  * )
  */
Flight::route("GET /types/@id", function($id){
    Flight::json(Flight::type_service()->get_by_id($id));
});

/**
 * @OA\Delete(
 *     path="/types/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Delete type",
 *     tags={"types"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Type ID"),
 *     @OA\Response(
 *         response=200,
 *         description="Type deleted"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */
Flight::route("DELETE /types/@id", function($id){
    Flight::type_service()->delete($id);
    Flight::json(['message'=>"type deleted successfully"]);
});

/**
* @OA\Post(
*     path="/types", security={{"ApiKeyAuth": {}}},
*     description="Add type",
*     tags={"types"},
*     @OA\RequestBody(description="Add new type", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="name", type="string", example="Tech Support",	description="Type"),
*    				@OA\Property(property="description", type="string", example="Tech Support professionals ensure smooth operation of computer systems, hardware, and software. They provide essential assistance by diagnosing and resolving any technical issues that users might encounter, making tech support a vital component of any successful business.",	description="Description" ),
*                   @OA\Property(property="responsibilities", type="string", example="Diagnose and troubleshoot software and hardware problems",	description="Responsibilities" ),
*                   @OA\Property(property="requirements", type="string", example="Strong problem-solving and communication skills",	description="Requirements" ),
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Type has been added"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route("POST /types", function(){
    $request= Flight::request()->data->getData();
    Flight::json(['message'=>"type added successfully",
                  'data'=>Flight::type_service()->add($request)
                ]);
    
});

/**
 * @OA\Put(
 *     path="/types/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Edit type",
 *     tags={"types"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Type ID"),
 *     @OA\RequestBody(description="Type info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				@OA\Property(property="name", type="string", example="Tech Support",	description="Type"),
 *    				@OA\Property(property="description", type="string", example="Tech Support professionals ensure smooth operation of computer systems, hardware, and software. They provide essential assistance by diagnosing and resolving any technical issues that users might encounter, making tech support a vital component of any successful business.",	description="Description" ),
 *                  @OA\Property(property="responsibilities", type="string", example="Diagnose and troubleshoot software and hardware problems",	description="Responsibilities" ),
 *                  @OA\Property(property="requirements", type="string", example="Strong problem-solving and communication skills",	description="Requirements" ),
 *        )
 *     )),
 *     @OA\Response(
 *         response=200,
 *         description="Type has been edited"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */
//update
Flight::route("PUT /types/@id", function($id){
    $type = Flight::request()->data->getData();
    #$response=$users_dao->update($user,$id);
    Flight::json(['message'=>"type edit successfully",
                  'data'=>Flight::type_service()->update($type,$id)
                ]);
    
});



?>