<?php

//require 'flight/Flight.php';
require "../vendor/autoload.php";
/*
require "dao/BaseDao.class.php";
require "dao/UserDao.class.php";
*/
/*
require "dao/UserDao.php"; //new
*/
require "services/UserService.php";
require "services/QuestionService.php";
require "services/AnswerService.php";
require "services/HistoryService.php";
require "services/TypeService.php";
require "services/ResultService.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

Flight::route('/', function () {
    echo 'hello world!';
});


Flight::register('user_service',"UserService");
Flight::register('question_service',"QuestionService");
Flight::register('answer_service',"AnswerService");
Flight::register('history_service',"HistoryService");
Flight::register('type_service',"TypeService");
Flight::register('result_service',"ResultService");
//Flight::register('userDao', "UserDao"); //new





// middleware method for login
Flight::route('/*', function(){ 
    $path = Flight::request()->url;
    if ($path == '/login' || $path == '/docs.json') return TRUE;  // || $path=="/signup"
    $headers = getallheaders();
    if (!isset($headers['Authorization'])){ //!$headers['Authorization']
      Flight::json(["message" => "Authorization is missing"], 403);
      return FALSE;
    }else{
      try {
        $decoded = (array)JWT::decode($headers['Authorization'], new Key(Config::JWT_SECRET(), 'HS256'));
        Flight::set('user', $decoded);
        return TRUE;
      } catch (\Exception $e) {
        Flight::json(["message" => "Authorization token is not valid"], 403);
        return FALSE;
      }
    }
  });


/* REST API documentation endpoint */
Flight::route('GET /docs.json', function(){
    $openapi = \OpenApi\scan('routes');
    header('Content-Type: application/json'); 
    echo $openapi->toJson(); 
});

require_once 'routes/UserRoutes.php';
require_once 'routes/QuestionRoutes.php';
require_once 'routes/AnswerRoutes.php';
require_once 'routes/HistoryRoutes.php';
require_once 'routes/TypeRoutes.php';
require_once 'routes/ResultRoutes.php';
require_once 'routes/TestRoute.php'; //without s :/

Flight::start();
?>