<?php

$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASSWORD = "";
$DB_NAME = "bca21014";

if (!$this->_con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)) {
    die("connection Error");
}

