<?php

//require '../vendor/autoload.php';

Flight::route("GET /answers
", function(){
    Flight::json(Flight::answer_service()->get_all());
});

Flight::route("GET /answer_by_id", function(){
    Flight::json(Flight::answer_service()->get_by_id(Flight::request()->query['id']));
 });

Flight::route("GET /answers
/@id", function($id){
    Flight::json(Flight::answer_service()->get_by_id($id));
});

Flight::route("DELETE /answers
/@id", function($id){
    Flight::answer_service()->delete($id);
    Flight::json(['message'=>"answer deleted successfully"]);
});

Flight::route("POST /answers
", function(){
    $request= FLight::request()->data->getData();
    Flight::json(['message'=>"Answer added successfully",
                  'data'=>Flight::answer_service()->add($request)
                ]);
    
});

//update
Flight::route("PUT /answers
/@id", function($id){
    $answer = FLight::request()->data->getData();
    #$response=$users_dao->update($user,$id);
    Flight::json(['message'=>"answer edit successfully",
                  'data'=>Flight::answer_service->update($answer,$id)
                ]);
    
});

Flight::start();

?>