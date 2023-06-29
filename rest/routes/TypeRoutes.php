<?php



Flight::route("GET /types", function(){
    Flight::json(Flight::type_service()->get_all());
});

Flight::route("GET /type_by_id", function(){
    Flight::json(Flight::type_service()->get_by_id(Flight::request()->query['id']));
 });

Flight::route("GET /types/@id", function($id){
    Flight::json(Flight::type_service()->get_by_id($id));
});

Flight::route("DELETE /types/@id", function($id){
    Flight::type_service()->delete($id);
    Flight::json(['message'=>"type deleted successfully"]);
});

Flight::route("POST /types", function(){
    $request= Flight::request()->data->getData();
    Flight::json(['message'=>"type added successfully",
                  'data'=>Flight::type_service()->add($request)
                ]);
    
});

//update
Flight::route("PUT /types/@id", function($id){
    $type = Flight::request()->data->getData();
    #$response=$users_dao->update($user,$id);
    Flight::json(['message'=>"type edit successfully",
                  'data'=>Flight::type_service()->update($type,$id)
                ]);
    
});



?>