<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = 'mealfirst';

$connection = mysqli_connect($servername, $username, $password, $db_name);

if (!$connection) {
  die("connection not established");
}
