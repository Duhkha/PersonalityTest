<?php

//require '../vendor/autoload.php';

Flight::route("GET /histories", function(){
    Flight::json(Flight::history_service()->get_all());
});

Flight::route("GET /history_by_id", function(){
    Flight::json(Flight::history_service()->get_by_id(Flight::request()->query['id']));
 });

Flight::route("GET /histories/@id", function($id){
    Flight::json(Flight::history_service()->get_by_id($id));
});

Flight::route("DELETE /histories/@id", function($id){
    Flight::history_service()->delete($id);
    Flight::json(['message'=>"history deleted successfully"]);
});

Flight::route("POST /histories", function(){
    $request= Flight::request()->data->getData();
    Flight::json(['message'=>"history added successfully",
                  'data'=>Flight::history_service()->add($request)
                ]);
    
});

//update
Flight::route("PUT /histories/@id", function($id){
    $history = Flight::request()->data->getData();
    #$response=$users_dao->update($user,$id);
    Flight::json(['message'=>"history edit successfully",
                  'data'=>Flight::history_service()->update($history,$id)
                ]);
    
});



?>