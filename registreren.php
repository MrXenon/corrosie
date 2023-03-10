<?php include("config/db_config.php");

//session_start();
// Als de admin niet is ingelogd verwijzen we door naar de inlogpagina
//if (!isset($_SESSION['loggedinadmin'])) {
// header('Location: loginadmin.php');
//exit;
//}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Innovision Solutions</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,500;1,500&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500&display=swap" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
  <div class="app-container">
    <div class="app-header">
      <div class="app-header-left">

        <div class="projects-section">
          <div class="projects-section-header">
            <p>Accounts</p>

            <div class="newprojectbutton">
              <a href="admin.php"><button><i class="fas fa-arrow-circle-left"></i> Terug naar admin portaal</button></a>
            </div>

          </div>
          <div class="projects-section-line">
            <div class="projects-status">
            </div>
          </div>

          <div class="login-box" style="margin-top: -20px">
            <div class="container_reg">
              <div class="box_reg">
                <h3>Registreer een gebruiker</h3>
                <form name="register" action="auth_register.php" method="post">
                  <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="Gebruikersnaam*" name="username" id="username" value="" required>
                  </div>

                  <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Wachtwoord*" name="password_1" id="password_1" value=""
                      required>
                    <input type="checkbox" onclick="ShowPW1()">
                  </div>

                  <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Herhaal wachtwoord*" name="password_2" id="password_2" value=""
                      required>
                    <input type="checkbox" onclick="ShowPW2()">
                  </div><br>
                  <button type="submit" class="authbutton" name="reg_user">Gebruiker aanmaken</button>
                </form>
              </div>

              <div class="box_reg">
                <h3>Registreer een Admin</h3>
                <form name="register" action="auth_registeradmin.php" method="post">
                  <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="Gebruikersnaam*" name="username" id="username" value="" required>
                  </div>

                  <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Wachtwoord*" name="password_1" id="password_1" value=""
                      required>
                    <input type="checkbox" onclick="ShowPW1()">
                  </div>

                  <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Herhaal wachtwoord*" name="password_2" id="password_2" value=""
                      required>
                    <input type="checkbox" onclick="ShowPW2()">
                  </div><br>
                  <button type="submit" class="authbutton" name="reg_admin">Admin aanmaken</button>
                </form>
              </div>
            </div>

            <div class="container_reg">
              <div class="box_reg">
                <h3>Gebruiker verwijderen</h3>
                </form>

                <form method="POST">
                  <p class="admin-box-content"><strong>Vul het USER Account ID in:</strong></p>
                  <p class="admin-box-content"><input class="form-control-number" type="number" name="id_delete_user"
                      min=0 placeholder="User ID"><br><br>

                    <button type="submit" name="delete_user" value="delete" class="projectstatusbuttondelete"
                      onclick="return confirm('Weet je zeker dat je dit account wilt verwijderen? Deze actie kan niet ongedaan gemaakt worden. Druk op OK om te verwijderen.')"
                      ;><i class="fas fa-trash-alt"></i> Gebruiker verwijderen</button>
                </form>
              </div>

              <div class="box_reg">
                <h3>Admin account verwijderen</h3>
                </form>

                <form method="POST">
                  <p class="admin-box-content"><strong>Vul het ADMIN Account ID in:</strong></p>
                  <p class="admin-box-content"><input class="form-control-number" type="number" name="id_delete_admin"
                      min=0 placeholder="Admin ID"><br><br>

                    <button type="submit" name="delete_admin" value="delete" class="projectstatusbuttondelete"
                      onclick="return confirm('Weet je zeker dat je dit account wilt verwijderen? Deze actie kan niet ongedaan gemaakt worden. Druk op OK om te verwijderen.')"
                      ;><i class="fas fa-trash-alt"></i> Admin verwijderen</button>
                </form>
              </div>
            </div>

            <?php

            // Delete User
            
            if (!$conn) {
              die("Connection with Database failed: " . mysqli_connect_error());
            }

            if (isset($_POST['delete_user'])) // when click on delete button
            {
              $users_id_delete = $_POST['id_delete_user'];

              $sql = "DELETE FROM users WHERE users.id = $users_id_delete;";

              if ($conn->query($sql) === TRUE) {
                echo "Account verwijderen...";
                echo "<meta http-equiv='refresh' content='0'>";
              } else {
                echo "<b><i class='fas fa-exclamation-circle' style='color:#FF5F57'></i> Error:</b><br><br> Invalid value, Fill in a valid ID number." //. $conn->error
                ;
              }

              $conn->close();
            }

            // Delete Admin
            
            if (!$conn) {
              die("Connection with Database failed: " . mysqli_connect_error());
            }

            if (isset($_POST['delete_admin'])) // when click on delete button
            {
              $account_id_delete = $_POST['id_delete_admin'];

              $sql = "DELETE FROM accounts WHERE accounts.id = $account_id_delete;";

              if ($conn->query($sql) === TRUE) {
                echo "Account verwijderen...";
                echo "<meta http-equiv='refresh' content='0'>";
              } else {
                echo "<b><i class='fas fa-exclamation-circle' style='color:#FF5F57'></i> Error:</b><br><br> Invalid value, Fill in a valid ID number." //. $conn->error
                ;
              }

              $conn->close();
            }

            ?>

          </div>
        </div>

        <div class="admin-section">
          <button class="admin-close">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-x-circle">
              <circle cx="12" cy="12" r="10" />
              <line x1="15" y1="9" x2="9" y2="15" />
              <line x1="9" y1="9" x2="15" y2="15" />
            </svg>
          </button>
          <div class="projects-section-header">
            <p>Accounts in gebruik</p>

          </div>
          <div class="admin">
            <div class="admin-box">
              <div class="admin-content-footer">

                <?php

                echo '<h3>Admin accounts:</h3>';
                echo '<br>';

                $query = "SELECT * FROM accounts";
                $rows = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($rows)) {
                  echo 'Gebruikersnaam: <b>', $row["username"], '</b>';
                  echo '<br>';
                  echo 'Account ID: <b>', $row["id"], '</b>';
                  echo '<br><hr>';
                }

                echo '<br>';
                echo '<h3>Gebruiker accounts:</h3>';
                echo '<br>';

                $query = "SELECT * FROM users";
                $rows = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($rows)) {
                  echo 'Username: <b>', $row["username"], '</b>';
                  echo '<br>';
                  echo 'Account ID: <b>', $row["id"], '</b>';
                  echo '<br><hr>';
                }

                ?>

              </div>
            </div>
          </div>

          <script>
            function ShowPW1() {
              var x = document.getElementById("password_1");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }

            function ShowPW2() {
              var x = document.getElementById("password_2");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
          </script>

        </div>
        <!-- partial -->
        <script src="script/script.js"></script>

</body>

</html>