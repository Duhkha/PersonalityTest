<?php

//require '../vendor/autoload.php';

Flight::route("GET /results", function(){
    Flight::json(Flight::result_service()->get_all());
});

Flight::route("GET /result_by_id", function(){
    Flight::json(Flight::result_service()->get_by_id(Flight::request()->query['id']));
 });

Flight::route("GET /results/@id", function($id){
    Flight::json(Flight::result_service()->get_by_id($id));
});

Flight::route("DELETE /results/@id", function($id){
    Flight::result_service()->delete($id);
    Flight::json(['message'=>"result deleted successfully"]);
});

Flight::route("POST /results", function(){
    $request= FLight::request()->data->getData();
    Flight::json(['message'=>"result added successfully",
                  'data'=>Flight::result_service()->add($request)
                ]);
    
});

//update
Flight::route("PUT /results/@id", function($id){
    $result = Flight::request()->data->getData();
    #$response=$users_dao->update($user,$id);
    Flight::json(['message'=>"result edit successfully",
                  'data'=>Flight::result_service()->update($result,$id)
                ]);
    
});



?>