<?php
// Verbinding met de database

$servername = "localhost";
$username = "root";
$password = "";
$db = "corrosie";

$conn = mysqli_connect($servername, $username, $password, $db);
  if (!$conn) {
    die("Connection with Database failed: " . mysqli_connect_error());
  }
  
  ?>