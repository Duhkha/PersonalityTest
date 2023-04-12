<?php
//.. da izadje iz rest
require '../vendor/autoload.php';
require "dao/UsersDao.class.php";

Flight::register('user_service',"UsersDao");

Flight::route("/", function(){
    echo "Hello from / route";
});

Flight::route("GET /users", function(){
    //echo "Hello from /users route with name=".$name;
    //$users_dao= new UsersDAO();
    //$results=Flight::user_service()->get_all();
   //print_r($results);
    Flight::json(Flight::user_service()->get_all());
});

Flight::route("GET /users/@id", function($id){
    //echo "Hello from /users route with name=".$name;
   // $users_dao= new UsersDAO();
    //$results=$users_dao->get_by_id($id);
   
    Flight::json(Flight::user_service()->get_by_id($id));
});

Flight::route("DELETE /users/@id", function($id){
    
  //  $users_dao= new UsersDAO();
    //$users_dao->delete($id);
   Flight::user_service()->delete($id);
    Flight::json(['message'=>"User deleted"]);
});

Flight::route("POST /users", function(){
    //echo "Hello from /users route with name=".$name;
    //$users_dao= new UsersDAO();
    $request= FLight::request()->data->getData();

   // $firstname=$request['firstname'];
    //$lastname=$request['lastname'];

    //$results=$users_dao->add($request['firstname'],$request['lastname']);

//or $results=$users_dao->add($request);

    Flight::json(['message'=>"User added",
    'data'=>Flight::user_service()->add($request)]);
    
});

//update
Flight::route("PUT /users/@id", function($id){
    //echo "Hello from /users route with name=".$name;
    //$users_dao= new UsersDAO();
    $user= FLight::request()->data->getData();
    $response=$users_dao->update($user,$id);
    Flight::json(['message'=>"User added",
'data'=>Flight::user_service->update($user,$id)]);
    
});



Flight::start();

?>