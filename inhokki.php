<?php

 require_once 'libs/utilities.php';
 require_once 'libs/models/restaurant.php';
 require_once 'libs/models/favoritelist.php';
 require_once 'libs/models/blacklist.php';

$id = (int)$_GET['id'];
$ravintola = Ravintola::etsiRavintolaIdlla($id);
$virhe = null;


if (!is_null($ravintola)) {
  Inhokit::lisaaKantaan($id, $_SESSION['kirjautunut']);
  $_SESSION['ilmoitus'] = "Ravintola lisätty inhokkeihin!";
  header('Location: ravintola.php?id='.$id);
  } 
