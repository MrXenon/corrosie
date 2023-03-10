<?php include("config/db_config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Innovision Solutions</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,500;1,500&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500&display=swap" rel="stylesheet">

  <link rel="icon" type="image/x-icon" href="/img/icon.png">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
  <div class="app-container">
    <div class="app-header">



      <div class="app-content">
        <div class="app-sidebar">
        </div>
        <div class="projects-section">


          <form action="generalauthenticate.php" method="post">
            <div class="login-box">
              <h2>Inloggen</h2>

              <div class="textbox_login">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Gebruikersnaam" name="username" id="username" value="" required>
              </div>

              <div class="textbox_login">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Wachtwoord" name="password" id="password" value="" required>
              </div>

              <input class="projectstatusbutton" style="margin-top: 20px;" type="submit" name="login_user"
                value="Inloggen">
            </div><br>
          </form>

        </div>
      </div>

      <!-- partial -->
      <script src="script/script.js"></script>

</body>

</html>