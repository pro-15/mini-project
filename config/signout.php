<?php 
    include("autoload.php");
    session_unset();
    session_destroy();
    //header("Location : localhost/mini-project/index.php");
    echo "<script>location.replace('".BASE_URL."index.php');</script>";