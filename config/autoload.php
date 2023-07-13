<?php 


//your project path goes here
define("BASE_URL","http://localhost/mini-project/");

if(is_dir("../../../htdocs")) {
    define("BASE_PATH","c:xampp/htdocs/mini-project/");
}
else {
    define("BASE_PATH","c:wamp64/www/mini-project/");
}

//set your timezone here
date_default_timezone_set('asia/kolkata');





 session_start();
 require(BASE_PATH.'config/database.php'); 
 require( BASE_PATH .'classes/database.php'); 
 require( BASE_PATH .'classes/FormAssist.class.php'); 
 require(BASE_PATH.'classes/FormValidator.class.php'); 
 require( BASE_PATH .'classes/DataAccess.class.php');
 


?>    