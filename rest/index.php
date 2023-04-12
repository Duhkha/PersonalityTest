<?php
//.. da izadje iz rest
require '../vendor/autoload.php';
require "dao/UsersDao.class.php";
//otherDAOS

require "services/UserService.php";
//other daos


Flight::register('user_service',"UserService");
//otherDAOS

require_once 'routes/UserRoutes.php';
//otherDAOS



Flight::start();

?>