<?php

//.. da izadje iz rest
require '../vendor/autoload.php';
require "dao/UsersDao.class.php";

Flight::register('user_service',"UsersDao");

Flight::route("GET /users", function(){
    Flight::json(Flight::user_service()->get_all());
});

Flight::route("GET /user_by_id", function(){
    Flight::json(Flight::user_service()->get_by_id(Flight::request()->query['id']));
 });

Flight::route("GET /users/@id", function($id){
    Flight::json(Flight::user_service()->get_by_id($id));
});

Flight::route("DELETE /users/@id", function($id){
    Flight::user_service()->delete($id);
    Flight::json(['message'=>"User deleted successfully"]);
});

Flight::route("POST /users", function(){
    $request= FLight::request()->data->getData();
    Flight::json(['message'=>"User added successfully",
                  'data'=>Flight::user_service()->add($request)
                ]);
    
});

//update
Flight::route("PUT /users/@id", function($id){
    $user= FLight::request()->data->getData();
    #$response=$users_dao->update($user,$id);
    Flight::json(['message'=>"User edit successfully",
                  'data'=>Flight::user_service->update($user,$id)
                ]);
    
});

/*
Ilma: ?? Trebamo li ovo?
Flight::route("GET /users/@name", function($name){
    echo "Hello from /users route with name= ".$name;
 });
 
 Flight::route("GET /users/@name/@status", function($name, $status){
    echo "Hello from /users route with name = " . $name . " and status = " . $status;
 });
*/

Flight::start();

?>