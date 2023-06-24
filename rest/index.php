<?php
//.. da izadje iz rest
require '../vendor/autoload.php';

/* ne treba jer se pozivaju is service
require "dao/UsersDao.class.php";
require "dao/TypesDao.class.php";
require "dao/ResultsDao.class.php";
require "dao/QuestionsDao.class.php";
require "dao/HistoriesDao.class.php";
require "dao/AnswersDao.class.php";
*/

//added in route
//require "services/UsersService.php";
require "services/TypesService.php";
require "services/ResultsService.php";
require "services/QuestionsService.php";
require "services/HistoriesService.php";
require "services/AnswersService.php";


Flight::register('user_service',"UsersService");
//otherDAOS

require_once 'routes/UserRoutes.php';
//otherDAOS



FLight::route("/", function() {
    echo "hi";
});


Flight::start();

?>