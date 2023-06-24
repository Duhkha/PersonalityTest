<?php
//.. da izadje iz rest
require '../vendor/autoload.php';

/* ne treba jer se pozivaju iz service
require "dao/UsersDao.class.php";
require "dao/TypesDao.class.php";
require "dao/ResultsDao.class.php";
require "dao/QuestionsDao.class.php";
require "dao/HistoriesDao.class.php";
require "dao/AnswersDao.class.php";
*/


//require "services/UsersService.php";
require "services/TypesService.php";
require "services/ResultsService.php";
require "services/QuestionsService.php";
require "services/HistoriesService.php";
require "services/AnswersService.php";


Flight::register('user_service',"UsersService");
Flight::register('question_service',"QuestionsService");
Flight::register('answer_service',"AnswersService");
Flight::register('history_service',"HistoriesService");
Flight::register('result_service',"ResultsService");
//otherDAOS

require_once 'routes/UserRoutes.php';
require_once 'routes/QuestionRoutes.php';
require_once 'routes/AnswerRoutes.php';
require_once 'routes/AnswerRoutes.php';
require_once 'routes/HistoryRoutes.php';
require_once 'routes/ResultRoutes.php';
//otherDAOS



Flight::route("/", function() {
    echo "hi";
});


Flight::start();

?>