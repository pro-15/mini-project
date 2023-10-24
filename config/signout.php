<?php 
    session_start();
    $redirect = '../';
    if(isset($_SESSION['doc'])) $redirect .= 'doctor/login.php';
    else $redirect .= "index.php";
    session_unset();
    session_destroy();
    //header("Location : localhost/mini-project/index.php");
    echo "<script>location.replace('$redirect');</script>";