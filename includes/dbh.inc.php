<?php
$servername = 'localhost';
$dbUsername = 'root';
$dbPwd = '';
$dbName = 'blogapp';

$conn = mysqli_connect($servername, $dbUsername, $dbPwd, $dbName);

if(!$conn){
  die("Connection Failed: ".mysqli_connect_error());
}


?>
