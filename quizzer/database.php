<?php
//create a connection to the database
$db_host = "localhost";
$db_name = "quizzer";
$db_user = "root";
$db_password = "whargarbl";

//create mysqli object
$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);

//handle errors
if($mysqli->connect_error){
  printf("Connection failed: %s\n", $mysqli->connect_error);
  exit();
}
