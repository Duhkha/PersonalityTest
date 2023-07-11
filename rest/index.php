<?php

require "../vendor/autoload.php";

require "services/UserService.php";
require "services/QuestionService.php";
require "services/AnswerService.php";
require "services/HistoryService.php";
require "services/TypeService.php";
require "services/ResultService.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

/*
Flight::route('/', function () {
    echo 'hello world!';
});
*/
/*
Flight::route('/*', function(){
    Flight::json(['request'=>Flight::request()]);
    $path = Flight::request()->url;
    });
*/
// middleware method for login

Flight::route('/*', function(){
    $path = Flight::request()->url;
    if ($path == '/login' || $path == '/signup' || $path == '/docs.json' ) return TRUE; // exclude login and signup route from middleware
  
    $headers = getallheaders();
    if (@!$headers['Authorization']){
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
  

Flight::register('user_service',"UserService");
Flight::register('question_service',"QuestionService");
Flight::register('answer_service',"AnswerService");
Flight::register('history_service',"HistoryService");
Flight::register('type_service',"TypeService");
Flight::register('result_service',"ResultService");

require_once 'routes/UserRoutes.php';
require_once 'routes/QuestionRoutes.php';
require_once 'routes/AnswerRoutes.php';
require_once 'routes/HistoryRoutes.php';
require_once 'routes/TypeRoutes.php';
require_once 'routes/ResultRoutes.php';
require_once 'routes/TestRoute.php'; 

/* REST API documentation endpoint */
Flight::route('GET /docs.json', function(){
  $openapi = \OpenApi\scan('routes');
  header('Content-Type: application/json'); 
  echo $openapi->toJson(); 
});

Flight::start();
?>