<?php 

// initializing variables
$username = "";
$errors = 0;

// connect to the database
include("config/db_config.php");

// REGISTER USER
if (isset($_POST['reg_user'])) {
	// receive all input values from the form
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
  
	// form validation: ensure that the form is correctly filled ...
	// by adding (array_push()) corresponding error unto $errors array
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($password_1)) { array_push($errors, "Password is required"); }
	if ($password_1 != $password_2) {
        $errors = $errors + 1;
		echo'<div class="auth-status">';
		echo'<span class="status-type"><b>Whoopsie floepsie! </b><br> Er bestaat al een account met deze gebruikersnaam.<br><br>';
		echo'<a href="registreren.php" class="authbutton">Opnieuw proberen</a></span>';
		echo'</div><br>';
	}
  
	// first check the database to make sure 
	// a user does not already exist with the same username and/or email
	$user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
	$result = mysqli_query($conn, $user_check_query);
	$user = mysqli_fetch_assoc($result);
	
	if ($user) { // if user exists
	  if ($user['username'] === $username) {
        $errors = $errors + 1;
		echo'<div class="auth-status">';
		echo'<span class="status-type"><b>Whoopsie floepsie! </b><br> Er bestaat al een account met deze gebruikersnaam.<br><br>';
		echo'<a href="registreren.php" class="authbutton">Opnieuw proberen</a></span>';
		echo'</div><br>';
	  }
	}
  
	// Finally, register user if there are no errors in the form
	if ($errors == 0) {
		$password = password_hash($password_1, PASSWORD_DEFAULT);
		//encrypt the password before saving in the database
  
		$query = "INSERT INTO users (username, password) VALUES('$username', '$password')";
		mysqli_query($conn, $query);

        echo'<div class="auth-status">';
		echo'<span class="status-type"><b>Account toegevoegd: </b><br> Let op! Bewaar de inloggegevens goed, Het wachtwoord kan niet gewijzigd worden!<br><br>';
		echo'<a href="registreren.php" class="authbutton">Terug naar het accountoverzicht</a></span>';
		echo'</div><br>';
	}
  }  

  ?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Innovision Solutions</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link rel="preconnect" href="https://fonts.gstatic.com"> 
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,500;1,500&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500&display=swap" rel="stylesheet">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>