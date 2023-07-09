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

Flight::route('POST /login', function(){
    $login = Flight::request()->data->getData();
    $user = Flight::user_service()->get_user_by_email($login['email']);
    if(count($user) > 0){
        $user = $user[0];
        if($user['password'] == md5($login['password'])){
            unset($user['password']);
            $user['is_admin'] = false;
            $jwt = JWT::encode($user, Config::JWT_SECRET(), 'HS256');
            Flight::json(['token' => $jwt]);
        }else{
            Flight::json(["message" => "Wrong password"], 401);
        }
    }else{
        Flight::json(["message" => "User doesn't exist"], 404);
    }
});

Flight::route('POST /signup', function(){
    $signup = Flight::request()->data->getData();
    $user = Flight::user_service()->get_user_by_email($signup['email']);
    
    if(count($user) > 0){
        Flight::json(["message" => "User with that email is already registered. Please choose a different email or log in instead."], 400);
    } elseif(strlen($signup['password']) < 6 || !preg_match('/[A-Za-z]/', $signup['password']) || !preg_match('/\d/', $signup['password'])){
        Flight::json(["message" => "Password should contain at least 6 characters and contain at least one letter and one number."], 400);
    } else {
        $new_user = new stdClass();
        $new_user->name = $signup['name'];
        $new_user->surname = $signup['surname'];
        $new_user->email = $signup['email'];
        $new_user->password = $signup['password']; // Hash the password using MD5
        $new_user_array = (array) $new_user;
        $added_user = Flight::user_service()->add($new_user_array);
        unset($added_user['password']);
        $jwt = JWT::encode($added_user, Config::JWT_SECRET(), 'HS256');
        Flight::json(['token' => $jwt]);
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