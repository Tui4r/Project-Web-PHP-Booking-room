<?php
date_default_timezone_set("asia/bangkok");
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'project';

$conn = new mysqli($db_host,$db_user,$db_password,$db_name);
if($conn->connect_errno){
    echo 'Fail to Connect DataBase :('.$conn->connect_errno.')'.$conn->connect_error;
}

$conn->query("SET sql_mode=''");

$conn->set_charset('utf8');

