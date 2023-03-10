<?php include("config/db_config.php"); ?>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">

<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>

<nav class="navbar navbar-dark bg-dark mt-auto">

    <div class="item-status" style="margin-top:-5px;">
        <span class="status-type2">
            
        <img src="images/user-icon.png" height="75px" width="75px"> 
            <b>
                <?= ucfirst($_SESSION['name']) ?>
            </b> | student account</span>
    </div>

</nav>

<body>