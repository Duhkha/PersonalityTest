<?php
//.. da izadje iz rest
require '../vendor/autoload.php';
require "dao/UsersDao.class.php";
require "dao/TypesDao.class.php";
require "dao/ResultsDao.class.php";
require "dao/QuestionsDao.class.php";
require "dao/HistoriesDao.class.php";
require "dao/AnswersDao.class.php";

require "services/UserService.php";
//other daos


Flight::register('user_service',"UserService");
//otherDAOS

require_once 'routes/UserRoutes.php';
//otherDAOS



Flight::start();

?>