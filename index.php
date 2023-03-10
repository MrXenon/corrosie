<?php include("config/db_config.php");

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit;
}
?>


<?php include 'content/header.php'; ?>



<body class="d-flex flex-column min-vh-100">

  <div class="inleiding container">
    <div class="row">
      <div class="col">
        <div class="p-3">
          <h3>Inleiding</h3>
          <p>Corrosie is bij de meeste mensen bekend onder de naam roest. In de volksmond spreekt men van ijzer, waarmee
            men doelt op staal,
            een van de materialen die &#34;last&#34; heeft van roest als en het niet is geschilderd. Tientallen jaren geleden
            werd het synoniem &#34;roestbak&#34; nog wel gebezigd om te verwijzen naar bepaalde automerken.
            Vandaag de dag is dat een term die je niet veel meer hoort ook al vanwege de vele verbeteringen die zijn
            doorgevoerd om auto&#39;s beter te beschermen tegen corrosie. Later in deze cursus worden beschermingstechnieken
            besproken.
            <br> <br>
            Allereerst gaan we kijken naar wat corrosie nu precies is en waarom sommige materialen onderhevig zijn aan
            corrosie en ander materialen weer minder of in het geheel niet.
          </p>
        </div>
      </div>
    </div>



    <div class="container">
      <div class="row">

        <div class="col-6">
          <img src="images/Een-door-corrosie-aangetaste-installatie.jpg" alt="placeholder" width="500" height="300">
        </div>

        <div class="col-6">
          <img src="images/Materiaal-verschillen.jpg" alt="placeholder" width="500" height="300">
        </div>

      </div>
    </div> 
  </div>
 
  <div class="container pagimenu">
    <div class="row">
      <div class="d-flex justify-content-center ">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="index.php">1</a></li>
            <li class="page-item"><a class="page-link" href="inleiding2.php">2</a></li>
            <li class="page-item"><a class="page-link" href="inleiding2.php">Next</a></li>
          </ul>
        </nav>
        </div>
      </div>
    </div>
</body>

<?php include 'content/footer.php'; ?>