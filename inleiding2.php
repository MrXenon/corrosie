<?php include 'content/header.php'; ?>

<?php 

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit;
}
?>

<div class=" inleiding container px-4 ">
  <div class="row gx-5">
    <div class="col">
      <div class="p-3">
        <p>
          Corrosie kunnen we omschrijven als zijnde een aantasting van een materiaal door een chemische of
          elektrochemische reactie met de omgeving.
          Het materiaal wordt aangevallen door elementen in de omgeving. Deze aantasting heeft tot gevolg dat de
          eigenschappen van het materiaal achteruitgaan,
          simpel gezegd het materiaal loopt schade op. Deze schade kan van invloed zijn op onder andere de mechanische
          eigenschappen zoals bijvoorbeeld de sterkte van een materiaal.
          Het kan ook op het zogenaamde esthetische vlak zijn, dus het uiterlijk van het materiaal verandert in
          negatieve zin. Het roesten van koper, kan daarentegen een esthetisch kwaliteit zijn die als mooi wordt
          ervaren.
          Denk maar aan het groene koperoxide op sommige kerktorens en het Vrijheidsbeeld in new York,

          <br><br>
          Het functioneren van een onderdeel,
          een installatie of een constructie kan worden be&#239;nvloed.
          Hierbij zou je als voorbeeld kunnen denken aan lekkages in leidingsystemen of nog erger,
          het falen van remsysteem of een (kern)reactor.


        </p>



        <div class="container">
          <div class="row gx-5">
            <div class="col">
              <div class="card text-bg-primary w-60">
                <div class="card-header">Definitie van corrosie</div>
                <div class="card-body">
                  <p class="card-text">&#34;Corrosie is een ongewenste aantasting van een materiaal ten gevolge van
                    chemische of elektrochemische reacties met componenten uit de omgeving&#34;.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col text-center">
      <div class="p-3 vrijheid">
        <h5> Vrijheidsbeeld in New York </h5>
        <img src="images/Vrijheidsbeeld_NewYork.png" alt="Vrijheidsbeeld in New York" width="400" height="500">
      </div>
    </div>
  </div>

  <div class="container pagimenu-1">
    <div class="d-flex justify-content-center">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="index.php">Previous</a></li>
          <li class="page-item"><a class="page-link" href="index.php">1</a></li>
          <li class="page-item"><a class="page-link" href="inleiding2.php">2</a></li>
        </ul>
      </nav>
    </div>
  </div>


</div>



<?php include 'content/footer.php'; ?>