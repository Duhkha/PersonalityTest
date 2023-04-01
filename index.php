<?php



require 'vendor/autoload.php';

Flight::route("/", function(){
    echo "Hello from /route";
});

Flight::start();

?>