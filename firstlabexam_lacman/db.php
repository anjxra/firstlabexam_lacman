<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "db_lacman";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
  die("Connection failed");
}
?>