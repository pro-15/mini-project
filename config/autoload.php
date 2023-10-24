<?php


//your project path goes here
define("BASE_URL", "http://localhost/mini-project/");
//define("BASE_PATH","c:xampp/htdocs/mini-project/");
//define("BASE_PATH","c:wamp64/www/mini-project/");


if (file_exists("../../xmp.txt")) $path = "c:xampp/htdocs/mini-project/";
else $path = "c:wamp64/www/mini-project/";
define("BASE_PATH", $path);


//set your timezone here
date_default_timezone_set('asia/kolkata');

session_start();
if (isset($_SESSION['doc'])) {
    if (isset($_SESSION['setTime']) && time() - $_SESSION['setTime'] > 18000) {
        echo "<script> alert('Session Expired!'); </script>";
        echo "location.replace('" . BASE_URL . "/config/signout.php'); </script>";
    }
} else {
    if (isset($_SESSION['setTime']) && time() - $_SESSION['setTime'] > 1800) {
        echo "<script>";
        if ($_SERVER['REQUEST_URI'] != "/mini-project/index.php") echo "alert('Session Expired');";
        echo "location.replace('" . BASE_URL . "/config/signout.php'); </script>";
    }
}


require(BASE_PATH . 'config/database.php');
require(BASE_PATH . 'classes/database.php');
require(BASE_PATH . 'classes/FormAssist.class.php');
require(BASE_PATH . 'classes/FormValidator.class.php');
require(BASE_PATH . 'classes/DataAccess.class.php');
