<?php
   
   require_once 'libs/utilities.php';
   require_once 'libs/models/restaurant.php';
   require_once 'libs/models/favoritelist.php';
   require_once 'libs/models/blacklist.php';

   $id = (int)$_GET['id'];
   $ravintola = Ravintola::etsiRavintolaIdlla($id);
   $suosikki = Suosikit::onkoSuosikeissa($_SESSION["kirjautunut"], $id);
   $inhokki = Inhokit::onkoinhokeissa($_SESSION["kirjautunut"], $id);
   if ($ravintola != null) {
 	 naytaNakyma("ravintolasivu.php", array(
         'ravintola' => $ravintola,
	 'suosikki' => $suosikki,
	 'inhokki' => $inhokki
         ));
   } else {
 	 naytaNakyma("ravintolasivu.php", array(
         'ravintola' => null,
         'virheet' => array('Ravintolaa ei löytynyt!')
         ));
  }
