<?php

 require_once 'libs/utilities.php';
 require_once 'libs/models/restaurant.php';
 require_once 'libs/models/blacklist.php';
 require_once 'libs/models/user.php';

$id = (int)$_GET['id'];
$ravintola = Ravintola::etsiRavintolaIdlla($id);
$kayttaja = Kayttaja::etsiKayttajaIdlla($_SESSION['kirjautunut']);


if (!is_null($ravintola)) {
  $i = $ravintola->getInhokki() - 1;
  $ravintola->setInhokki($i);
  $ravintola->muokkaaInhokkia();
  $k = $kayttaja->getInhokkeja() -1;
  $kayttaja->setInhokkeja($k);
  $kayttaja->muokkaaInhokkeja();
  Inhokit::poistaRavintolaListalta($id, $_SESSION['kirjautunut']);
  $_SESSION['ilmoitus'] = "Ravintola poistettu inhokeista.";
  header('Location: ravintola.php?id='.$id);
  } 
