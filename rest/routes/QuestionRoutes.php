<?php

//require '../vendor/autoload.php';

Flight::route("GET /questions", function(){
    Flight::json(Flight::question_service()->get_all());
});

Flight::route("GET /question_by_id", function(){
    Flight::json(Flight::question_service()->get_by_id(Flight::request()->query['id']));
 });

Flight::route("GET /questions/@id", function($id){
    Flight::json(Flight::question_service()->get_by_id($id));
});

Flight::route("DELETE /questions/@id", function($id){
    Flight::question_service()->delete($id);
    Flight::json(['message'=>"Question deleted successfully"]);
});

Flight::route("POST /questions", function(){
    $request= FLight::request()->data->getData();
    Flight::json(['message'=>"Question added successfully",
                  'data'=>Flight::question_service()->add($request)
                ]);
    
});

//update
Flight::route("PUT /questions/@id", function($id){
    $question = FLight::request()->data->getData();
    #$response=$users_dao->update($user,$id);
    Flight::json(['message'=>"Question edit successfully",
                  'data'=>Flight::question_service->update($question,$id)
                ]);
    
});

Flight::start();

?>