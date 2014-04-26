<?php

 require_once 'libs/utilities.php';
 require_once 'libs/models/restaurant.php';
 require_once 'libs/models/blacklist.php';
$id = (int)$_GET['id'];
$ravintola = Ravintola::etsiRavintolaIdlla($id);
$virhe = null;


if (!is_null($ravintola)) {
  $i = $ravintola->getInhokki() - 1;
  $ravintola->setInhokki($i);
  $ravintola->muokkaaInhokkia();
  Inhokit::poistaRavintolaListalta($id, $_SESSION['kirjautunut']);
  $_SESSION['ilmoitus'] = "Ravintola poistettu inhokeista.";
  header('Location: ravintola.php?id='.$id);
  } 
