<?php include("config/db_config.php");

session_start();

if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn->prepare('SELECT id, password FROM users WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if (password_verify($_POST['password'], $password)) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location: index.php');
        } else {
            // Incorrect password
            echo'<div class="auth-status">';
            echo'<span class="status-type"><b>Ongeldige inloggegevens: </b><br> Voer een juiste gebruikersnaam en wachtwoord in. <br><br>Let er op dat beide velden hoofdlettergevoelig kunnen zijn.<br><br>';
            echo'<a href="login.php" class="authbutton">Opnieuw proberen</a></span>';
            echo'</div>';
        }
    } else {
        // Incorrect username
        echo'<div class="auth-status">';
        echo'<span class="status-type"><b>Ongeldige inloggegevens: </b><br> Gebruikersnaam niet geldig of onbekend. <br><br>Let er op dat beide velden hoofdlettergevoelig kunnen zijn.<br><br>';
        echo'<a href="login.php" class="authbutton">Opnieuw proberen</a></span>';
        echo'</div>';
    }

	$stmt->close();
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