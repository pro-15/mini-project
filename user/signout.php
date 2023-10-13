<?php 
    include("../config/autoload.php");
    session_unset();
    session_destroy();
    //header("Location : localhost/mini-project/index.php");
    echo "<script>location.replace('../index.php');</script>";
?>