<?php include("config/db_config.php");


session_start();
// Als de admin niet is ingelogd verwijzen we door naar de inlogpagina
if (!isset($_SESSION['loggedinadmin'])) {
  header('Location: loginadmin.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Innovision Solutions</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
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
    <div class="app-header-left">

<?php 

$sql = "SELECT * FROM project WHERE project_status!='Afgerond' AND project_status!='Gestopt' AND project_status!='On Hold' ORDER BY projectnaam;";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

$sql = "SELECT * FROM tickets WHERE project_status!='Afgerond' ORDER BY projectnaam;";

$resultTickets = mysqli_query($conn, $sql);
$resultCheckTickets = mysqli_num_rows($resultTickets);

$sql = "SELECT * FROM `project` WHERE project_status='Bezig';";

$bezig = mysqli_query($conn, $sql);
$resultBezig = mysqli_num_rows($bezig);


$sql = "SELECT * FROM `project` WHERE project_status='Factuur';";

$factuur = mysqli_query($conn, $sql);
$resultFactuur = mysqli_num_rows($factuur);


$sql = "SELECT * FROM `project` WHERE project_status='In Afwachting';";

$afwachting = mysqli_query($conn, $sql);
$resultAfwachting = mysqli_num_rows($afwachting);


$sql = "SELECT * FROM `project` WHERE project_status='Wacht op start';";

$wachtopstart = mysqli_query($conn, $sql);
$resultWachtopstart = mysqli_num_rows($wachtopstart);


$sql = "SELECT * FROM `project` WHERE project_status='Initiatie';";

$initiatie = mysqli_query($conn, $sql);
$resultInitiatie = mysqli_num_rows($initiatie);

$sql = "SELECT * FROM `project` WHERE project_status='On Hold';";

$hold = mysqli_query($conn, $sql);
$resultHold = mysqli_num_rows($hold);

$sql = "SELECT * FROM `project` WHERE project_status='Gestopt';";

$gestopt = mysqli_query($conn, $sql);
$resultGestopt = mysqli_num_rows($gestopt);

$sql = "SELECT * FROM `project` WHERE project_status='Afgerond' ORDER BY projectnaam;";

$Afgerond = mysqli_query($conn, $sql);
$resultAfgerond = mysqli_num_rows($Afgerond);

// Opleidingen

$sql = "SELECT * FROM `project` WHERE opleiding='Software' AND project_status!='Afgerond' AND project_status!='Gestopt' AND project_status!='On Hold';";

$software = mysqli_query($conn, $sql);
$resultSoftware = mysqli_num_rows($software);


$sql = "SELECT * FROM `project` WHERE opleiding='Media' AND project_status!='Afgerond' AND project_status!='Gestopt' AND project_status!='On Hold';";

$media = mysqli_query($conn, $sql);
$resultMedia = mysqli_num_rows($media);

$sql = "SELECT * FROM `project` WHERE opleiding='Media & Software' AND project_status!='Afgerond' AND project_status!='Gestopt' AND project_status!='On Hold';";

$combinatie = mysqli_query($conn, $sql);
$resultCombinatie = mysqli_num_rows($combinatie);

// Zoekresultaat

$searchresult = $_GET['search'] ?? '';

$sql = "SELECT * FROM `project` WHERE `projectnaam` LIKE '%".$searchresult."%' OR `projectleider` LIKE '%".$searchresult."%' OR `klant` LIKE '%".$searchresult."%' OR `projectleden` LIKE '%".$searchresult."%';";

$resultzoekopdracht = mysqli_query($conn, $sql);
$resultNummerZoek = mysqli_num_rows($resultzoekopdracht);

?>

<svg class="logo" style="fill-rule:nonzero;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1149.04 346.81">
  <defs>
  </defs>
  <path class="cls-1" d="M128.28,237.52a15.73,15.73,0,0,1,11.21-26.93,15,15,0,0,1,11,4.52,16.15,16.15,0,0,1,0,22.41,15,15,0,0,1-11,4.52A15.25,15.25,0,0,1,128.28,237.52Zm25.13,14V391H124.56V261.07a9.55,9.55,0,0,1,9.55-9.55Z" transform="translate(-108.77 -210.59)"/>
  <path class="cls-1" d="M279.31,256.08a48.61,48.61,0,0,1,20.38,20.24q7.33,13.43,7.34,32.4V391h-28.6V313q0-18.72-9.37-28.72t-25.56-10q-16.2,0-25.69,10T208.32,313v78H179.47V251.52h14.85a14,14,0,0,1,14,14v2a47.76,47.76,0,0,1,18.1-13.42,57.94,57.94,0,0,1,23.41-4.81A62.49,62.49,0,0,1,279.31,256.08Z" transform="translate(-108.77 -210.59)"/>
  <path class="cls-1" d="M430.67,256.08A48.53,48.53,0,0,1,451,276.32q7.33,13.43,7.34,32.4L458,416l-28,20-.22-123q0-18.72-9.36-28.72t-25.57-10q-16.2,0-25.69,10T359.67,313v78H330.82V251.52h14.85a14,14,0,0,1,14,14v2a47.76,47.76,0,0,1,18.1-13.42,57.94,57.94,0,0,1,23.41-4.81A62.5,62.5,0,0,1,430.67,256.08Z" transform="translate(-108.77 -210.59)"/>
  <path class="cls-1" d="M507,382.27A64.39,64.39,0,0,1,481.92,357q-9.12-16.32-9.11-37.84,0-21.25,9.36-37.71a64.66,64.66,0,0,1,25.56-25.31,78.36,78.36,0,0,1,72.39,0,64.75,64.75,0,0,1,25.57,25.31q9.36,16.45,9.36,37.71t-9.62,37.71a66.44,66.44,0,0,1-26.19,25.44,75.56,75.56,0,0,1-36.58,9A71.46,71.46,0,0,1,507,382.27Zm56.57-21.38a40.51,40.51,0,0,0,15.82-15.95q6.07-10.63,6.08-25.82t-5.82-25.69a39.43,39.43,0,0,0-15.44-15.82,42.28,42.28,0,0,0-20.76-5.31,41.55,41.55,0,0,0-20.63,5.31,38,38,0,0,0-15.06,15.82q-5.57,10.51-5.56,25.69,0,22.53,11.51,34.8t29,12.28A42.93,42.93,0,0,0,563.54,360.89Z" transform="translate(-108.77 -210.59)"/>
  <path class="cls-1" d="M681.71,360.11l38.42-110.59H741a6.76,6.76,0,0,1,6.31,9.16L700.55,381.25A12,12,0,0,1,689.34,389H671.47a12,12,0,0,1-11.22-7.74l-50-131.72H630.5a15,15,0,0,1,14.17,10.08l34.92,100.51A1.12,1.12,0,0,0,681.71,360.11Z" transform="translate(-108.77 -210.59)"/>
  <path class="cls-1" d="M790.47,262.52V389H761.62V249.52h15.85A13,13,0,0,1,790.47,262.52Z" transform="translate(-108.77 -210.59)"/>
  <path class="cls-1" d="M834.66,385.31A51.77,51.77,0,0,1,814,369.11a40.67,40.67,0,0,1-7-14.87,6.55,6.55,0,0,1,6.38-8h17.08a6.61,6.61,0,0,1,6.25,4.63A21.14,21.14,0,0,0,844.28,361q7.71,6,19.36,5.95,12.15,0,18.86-4.68t6.7-12q0-7.83-7.46-11.64t-23.67-8.35a228.7,228.7,0,0,1-25.56-8.35,44.93,44.93,0,0,1-17.09-12.4q-7.21-8.36-7.21-22a34.32,34.32,0,0,1,6.58-20.38q6.59-9.24,18.86-14.55t28.22-5.32q23.77,0,38.34,12a41.61,41.61,0,0,1,14.66,25,6.53,6.53,0,0,1-6.43,7.74H892.36a6.59,6.59,0,0,1-6.3-4.83,20,20,0,0,0-6.73-10.1q-6.83-5.57-18.47-5.57-11.4,0-17.47,4.3a13.39,13.39,0,0,0-5.92,9.23A14.12,14.12,0,0,0,843,298a29.3,29.3,0,0,0,8.27,4.56q5.82,2.16,17.21,5.45a188.32,188.32,0,0,1,24.93,8.22,46.58,46.58,0,0,1,16.83,12.28q7.08,8.1,7.34,21.51A36,36,0,0,1,911,371.26q-6.59,9.38-18.6,14.68t-28.23,5.32A70.31,70.31,0,0,1,834.66,385.31Z" transform="translate(-108.77 -210.59)"/>
  <path class="cls-1" d="M961.63,262.52V389H932.77V249.52h15.86A13,13,0,0,1,961.63,262.52Z" transform="translate(-108.77 -210.59)"/>
  <path class="cls-1" d="M1010.49,382.27A64.41,64.41,0,0,1,985.43,357q-9.12-16.32-9.11-37.84,0-21.25,9.36-37.71a64.62,64.62,0,0,1,25.57-25.31,78.34,78.34,0,0,1,72.38,0,64.75,64.75,0,0,1,25.57,25.31q9.36,16.45,9.36,37.71t-9.62,37.71a66.44,66.44,0,0,1-26.19,25.44,75.56,75.56,0,0,1-36.58,9A71.4,71.4,0,0,1,1010.49,382.27Zm56.57-21.38a40.56,40.56,0,0,0,15.81-15.95q6.08-10.63,6.08-25.82t-5.82-25.69a39.43,39.43,0,0,0-15.44-15.82,41.41,41.41,0,0,0-20.51-5.35,42.52,42.52,0,0,0-20.88,5.35,38,38,0,0,0-15,15.82q-5.58,10.51-5.57,25.69,0,22.53,11.51,34.8t29,12.28A43,43,0,0,0,1067.06,360.89Z" transform="translate(-108.77 -210.59)"/>
  <path class="cls-1" d="M1230.1,256.08a48.53,48.53,0,0,1,20.37,20.24q7.35,13.43,7.34,32.4V391h-28.6V313q0-18.72-9.36-28.72t-25.57-10q-16.2,0-25.69,10T1159.1,313v78h-28.85V251.52h14.85a14,14,0,0,1,14,14v2a47.76,47.76,0,0,1,18.1-13.42,57.94,57.94,0,0,1,23.41-4.81A62.53,62.53,0,0,1,1230.1,256.08Z" transform="translate(-108.77 -210.59)"/>
  <path class="cls-1" d="M136.59,550.45A51.69,51.69,0,0,1,116,534.25a40.67,40.67,0,0,1-7-14.87,6.54,6.54,0,0,1,6.38-8h17.09a6.6,6.6,0,0,1,6.24,4.62,21.21,21.21,0,0,0,7.55,10.19q7.71,5.94,19.36,5.94,12.15,0,18.86-4.68t6.7-12q0-7.84-7.46-11.64T160,495.4a226.64,226.64,0,0,1-25.56-8.35,44.82,44.82,0,0,1-17.09-12.4q-7.21-8.36-7.21-22a34.37,34.37,0,0,1,6.58-20.38q6.59-9.22,18.86-14.55t28.22-5.31q23.79,0,38.34,12a41.59,41.59,0,0,1,14.66,25,6.53,6.53,0,0,1-6.43,7.73H194.29a6.58,6.58,0,0,1-6.3-4.83,20,20,0,0,0-6.73-10.1q-6.82-5.56-18.47-5.57-11.4,0-17.47,4.31a13.37,13.37,0,0,0-5.92,9.22,14.1,14.1,0,0,0,5.5,12.91,29.46,29.46,0,0,0,8.27,4.57q5.82,2.15,17.21,5.44a186.72,186.72,0,0,1,24.93,8.23,46.44,46.44,0,0,1,16.83,12.27q7.08,8.1,7.34,21.51a36.15,36.15,0,0,1-6.58,21.27q-6.59,9.36-18.6,14.68t-28.22,5.31Q149.61,556.4,136.59,550.45Z" transform="translate(-108.77 -210.59)"/>
  <path class="cls-1" d="M256.51,548.42a64.55,64.55,0,0,1-25.06-25.31q-9.1-16.33-9.11-37.84,0-21.27,9.36-37.72a64.75,64.75,0,0,1,25.57-25.31,78.42,78.42,0,0,1,72.38,0,64.82,64.82,0,0,1,25.57,25.31q9.36,16.45,9.36,37.72T355,523a66.57,66.57,0,0,1-26.19,25.44,75.55,75.55,0,0,1-36.58,9A71.39,71.39,0,0,1,256.51,548.42ZM313.08,527a40.49,40.49,0,0,0,15.81-15.95Q335,500.46,335,485.27t-5.82-25.69a39.37,39.37,0,0,0-15.44-15.82A42.29,42.29,0,0,0,293,438.44a41.52,41.52,0,0,0-20.62,5.32,37.91,37.91,0,0,0-15.06,15.82q-5.58,10.5-5.57,25.69,0,22.53,11.51,34.8t29,12.27A43,43,0,0,0,313.08,527Z" transform="translate(-108.77 -210.59)"/>
  <path class="cls-1" d="M557.48,413V556H542.62a14,14,0,0,1-14-14v-4.33a46.61,46.61,0,0,1-17.84,13.54,56.61,56.61,0,0,1-23.41,4.94,62.5,62.5,0,0,1-29.49-6.84,49.28,49.28,0,0,1-20.5-20.24q-7.47-13.43-7.47-32.4L430,411h28l.51,81.37q0,18.74,9.37,28.72t25.56,10q16.2,0,25.69-10t9.49-28.72V413Z" transform="translate(-108.77 -210.59)"/>
  <path class="cls-1" d="M646.11,412.66V436.2H612.19v81.2q0,7.85,3.67,11.26t12.53,3.42h17.72v24H623.33q-19.49,0-29.86-9.11T583.09,517.4V436.2H566.64V412.66" transform="translate(-108.77 -210.59)"/>
  <path class="cls-1" d="M685.63,426V556H656.78V413h15.85A13,13,0,0,1,685.63,426Z" transform="translate(-108.77 -210.59)"/>
  <path class="cls-1" d="M729.49,548.42a64.61,64.61,0,0,1-25.06-25.31q-9.1-16.33-9.11-37.84,0-21.27,9.37-37.72a64.73,64.73,0,0,1,25.56-25.31,78.44,78.44,0,0,1,72.39,0,64.79,64.79,0,0,1,25.56,25.31q9.36,16.45,9.37,37.72T828,523a66.67,66.67,0,0,1-26.2,25.44,75.48,75.48,0,0,1-36.57,9A71.43,71.43,0,0,1,729.49,548.42ZM786.06,527a40.51,40.51,0,0,0,15.82-15.95Q808,500.46,808,485.27t-5.82-25.69a39.3,39.3,0,0,0-15.44-15.82,42.25,42.25,0,0,0-20.75-5.32,41.56,41.56,0,0,0-20.63,5.32,37.91,37.91,0,0,0-15.06,15.82q-5.57,10.5-5.57,25.69,0,22.53,11.52,34.8t29,12.27A43,43,0,0,0,786.06,527Z" transform="translate(-108.77 -210.59)"/>
  <path class="cls-1" d="M945.1,419.22a48.69,48.69,0,0,1,20.38,20.25q7.34,13.41,7.34,32.4v84.25h-28.6V476.17q0-18.74-9.37-28.73t-25.56-10q-16.2,0-25.69,10t-9.49,28.73v79.95H845.25V413H856.5a17.61,17.61,0,0,1,17.61,17.61h0a47.63,47.63,0,0,1,18.1-13.41,57.73,57.73,0,0,1,23.41-4.81A62.48,62.48,0,0,1,945.1,419.22Z" transform="translate(-108.77 -210.59)"/>
  <path class="cls-1" d="M1008.74,550.45a51.69,51.69,0,0,1-20.63-16.2,40.44,40.44,0,0,1-7-14.86,6.54,6.54,0,0,1,6.37-8h17.08a6.6,6.6,0,0,1,6.25,4.62,21.16,21.16,0,0,0,7.55,10.19q7.71,5.94,19.36,5.94,12.15,0,18.86-4.68t6.7-12q0-7.84-7.46-11.64t-23.67-8.36a226.64,226.64,0,0,1-25.56-8.35,44.82,44.82,0,0,1-17.09-12.4q-7.2-8.36-7.21-22a34.37,34.37,0,0,1,6.58-20.38q6.58-9.22,18.86-14.55t28.22-5.31q23.79,0,38.34,12a41.56,41.56,0,0,1,14.66,25,6.53,6.53,0,0,1-6.43,7.74h-16.07a6.59,6.59,0,0,1-6.31-4.83,20,20,0,0,0-6.73-10.1q-6.83-5.56-18.47-5.57-11.4,0-17.47,4.31a13.37,13.37,0,0,0-5.92,9.22,14.13,14.13,0,0,0,5.5,12.91,29.46,29.46,0,0,0,8.27,4.57q5.82,2.15,17.21,5.44a186.72,186.72,0,0,1,24.93,8.23,46.35,46.35,0,0,1,16.83,12.27q7.08,8.1,7.34,21.51a36.08,36.08,0,0,1-6.58,21.27q-6.58,9.36-18.6,14.68t-28.22,5.31Q1021.78,556.4,1008.74,550.45Z" transform="translate(-108.77 -210.59)"/>
  <path class="cls-1" d="M399.33,410.5V516.7q0,7.84,3.54,11.26t12.1,3.42h17.1v24h-22q-18.82,0-28.83-9.11t-10-29.62V410.5" transform="translate(-108.77 -210.59)"/>
</svg>

<div class="item-status" style="margin-top:-5px;">
    <span class="status-type2"> <?php
      echo " <b>" . $datetime . "</b>";?><br>
      Je bent ingelogd als <b><?=ucfirst($_SESSION['name'])?></b> | Admin Account</span>
  </div>

  <div class="search-wrapper">
        <form action="" method="GET">
        <input class="search-input" type="text" placeholder="Zoeken..." name="search" id="search" value="">
        <button class="button-search" type="submit" name="searchnow"><i class="fas fa-search"></i></button>
        </form>
      </div>
  </div>

  <div class="app-header-right">
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
        <button class="notification-btn" href="logout.php">
        <i class="fas fa-sign-out-alt"></i>
        </button>

        <a href="logout.php" class="profile-btn2">
          <span> Uitloggen
          </span>
        </a>
    </div>

</div>
<div class="app-content">
  <div class="app-sidebar">

  <a href="index.php" class="app-sidebar-link">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
      <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
      <polyline points="9 22 9 12 15 12 15 22" />
    </svg>
  </a>

  <a href="projects.php" class="app-sidebar-link">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder">
      <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
    </svg>
  </a>

  <a href="tickets.php" class="app-sidebar-link">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square">
      <polyline points="9 11 12 14 22 4"></polyline>
      <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11">
      </path>
    </svg>
  </a>

  <a href="admin.php" class="app-sidebar-link active">
    <svg class="link-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-settings" viewBox="0 0 24 24">
      <defs />
      <circle cx="12" cy="12" r="3" />
      <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z" />
    </svg>
  </a>
</div>



  <div class="projects-section">

  <div class="project-boxes jsGridView">

  <article class="box-admin-portaal1">
  <h1>Welkom <?=ucfirst($_SESSION['name'])?></h1>
  <p>Er zijn op dit moment <b><?php echo $resultCheck; ?></b> actieve projecten waarvan <b><?php echo $resultSoftware; ?></b> software en <b><?php echo $resultMedia; ?></b> mediaprojecten. Er zijn <b><?php echo $resultCombinatie; ?></b> combinatieprojecten.</p>
  <p>Op dit moment zijn er <b><?php echo $resultCheckTickets; ?></b> openstaande tickets.</p>
</article>

  <article class="box-admin-portaal">
  <h1>Projecten beheren</h1>
  <p>Status van projecten bijwerken,<br> Projecten bewerken, Etc.</p>
  <button onclick="window.location='admin_projecten.php';" class="breakout-button" type="button">Naar projecten ????</button>
</article>

<article class="box-admin-portaal">
  <h1>Tickets beheren</h1>
  <p>Status van tickets bijwerken,<br> Tickets bewerken, Etc.</p>
  <button onclick="window.location='admin_tickets.php';" class="breakout-button" type="button">Naar tickets ????</button>
</article>

<article class="box-admin-portaal">
  <h1>Accounts beheren</h1>
  <p>Admin en gebruiker accounts beheren<br>& Accountoverzicht</p>
  <button onclick="window.location='registreren.php';" class="breakout-button" type="button">Naar accounts ????</button>
</article>

<!-- <article class="box-admin-portaal">
  <h1>Templates</h1>
  <p>Templates toevoegen, <br>bewerken of verwijderen</p>
  <button class="breakout-button" type="button">Binnenkort ??????</button>
</article> -->

<article class="box-admin-portaal">
  <h1>Project toevoegen</h1>
  <p>Een nieuw project toevoegen aan <br>de projectenlijst</p>
  <button onclick="window.location='newproject.php';" class="breakout-button" type="button">Project toevoegen ????</button>
</article>

<article class="box-admin-portaal">
  <h1>Ticket toevoegen</h1>
  <p>Een nieuw ticket toevoegen aan <br> de ticketlijst</p>
  <button onclick="window.location='newticket.php';" class="breakout-button" type="button">Ticket toevoegen ???</button>
</article>

<article class="box-admin-portaal">
  <h1>Aanwezigheid</h1>
  <p>Aanwezigheid tijdens <br>vergaderingen bijhouden</p>
  <button class="breakout-button" type="button">Nog niet beschikbaar ??????</button>
</article>

<article class="box-admin-portaal">
  <h1>Coaches</h1>
  <p>Overzicht projecten per coach<br>En overzicht per opleiding</p>
  <button onclick="window.location='admin_coach.php';" class="breakout-button" type="button">Coaches ????</button>
</article>

<article class="box-admin-portaal">
  <h1>Templates beheren</h1>
  <p>Templates bewerken, toevoegen <br>of verwijderen</p>
  <button class="breakout-button" type="button">Nog niet beschikbaar ??????</button>
</article>

  </div>

  </div>

</div>
<!-- partial -->
<script src="script/script.js"></script>

</body>
</html>