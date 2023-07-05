<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;


//works
Flight::route('GET /users', function () {
    
    //$results=Flight::user_service()->get_all();
    //print_r($results);
    Flight::json(Flight::user_service()->get_all());

});

//works
Flight::route('GET /users/@id', function($id){
    Flight::json(Flight::user_service()->get_by_id($id));
});

//http://localhost/Dedsec/rest/user_by_id?id=4
//works
Flight::route('GET /user_by_id', function(){
    Flight::json(Flight::user_service()->get_by_id(Flight::request()->query['id']));
 });

//treba staviti status:active or not
Flight::route('DELETE /users/@id', function($id){
    Flight::user_service()->delete($id);
    Flight::json(['message'=>"User deleted successfully"]);
});

//works
Flight::route('POST /users', function(){
    $request= Flight::request()->data->getData();
    Flight::json(['message'=>"User added successfully",
                  'data'=>Flight::user_service()->add($request)
                ]);
    
});

//update
//works
Flight::route('PUT /users/@id', function($id){
    $user= Flight::request()->data->getData();
    #$response=$users_dao->update($user,$id);
    Flight::json(['message'=>"User edit successfully",
                  'data'=>Flight::user_service()->update($user,$id)
                ]);
    
});

//we will skip the service and do everything in the routes when it comes to login

Flight::route('POST /login', function(){
    $login = Flight::request()->data->getData();
    $user = Flight::user_service()->get_user_by_email($login['email']); //userDao preimenovala u user_Service
    if(count($user) > 0){
        $user = $user[0];
    }
    if (isset($user['id'])){
      if($user['password'] == md5($login['password'])){
        unset($user['password']);
        $user['is_admin'] = true;
        $jwt = JWT::encode($user, Config::JWT_SECRET(), 'HS256');
        Flight::json(['token' => $jwt]);
      }else{
        Flight::json(["message" => "Wrong password"], 404);
      }
    }else{
      Flight::json(["message" => "User doesn't exist"], 404);
  }
});

//other routes

// User registration
/*
//works
Flight::route('POST /users/register', function(){
    $request = Flight::request()->data->getData();
    try {
        Flight::json(['message'=>"User registered successfully",
                  'data'=>Flight::user_service()->register($request)
                ]);
    } catch (Exception $e) {
        Flight::json(['error' => $e->getMessage()], 400);
    }
});


// User login
//works

Flight::route('POST /users/login', function(){
    $request = Flight::request()->data->getData();
    try {
        Flight::json(['message'=>"User logged in successfully",
                      'data'=>Flight::user_service()->login($request['email'], $request['password'])
                    ]);
    } catch (Exception $e) {
        Flight::json(['error' => $e->getMessage()], 400);
    }
});
*/
Flight::route('GET /users/@id/history', function($id){
    Flight::json(Flight::history_service()->get_by_user_id($id));
});






?>