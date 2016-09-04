<?php
//connect to the mysql database
$con = mysqli_connect('localhost', 'root', 'whargarbl', 'shoutit');

if(mysqli_connect_errno()){
  echo 'Failed to connect to database: '.mysqli_connect_errno();
}

?>
