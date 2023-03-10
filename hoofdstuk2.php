<?php include 'content/header.php';

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit;
}
?>

<h1 class=" d-flex justify-content-center">Hoofdstuk 2</h1>

<body class="d-flex flex-column min-vh-100">

 
    <div class="container pagimenu-3">
      <div class="d-flex justify-content-center ">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            
            <li class="page-item"><a class="page-link" href="hoofdstuk2.php">1</a></li>
            <li class="page-item"><a class="page-link" href="hoofdstuk2-1.php">2</a></li>
            <li class="page-item"><a class="page-link" href="hoofdstuk2-2.php">3</a></li>
            <li class="page-item"><a class="page-link" href="hoofdstuk2-1.php">Next</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>

</body>

<?php include 'content/footer.php'; ?>