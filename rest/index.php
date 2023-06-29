<?php

//require 'flight/Flight.php';
require "../vendor/autoload.php";
/*
require "dao/BaseDao.class.php";
require "dao/UserDao.class.php";
*/

require "services/UserService.php";
require "services/QuestionService.php";
require "services/AnswerService.php";
require "services/HistoryService.php";
require "services/TypeService.php";
require "services/ResultService.php";

Flight::route('/', function () {
    echo 'hello world!';
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

Flight::start();
?>