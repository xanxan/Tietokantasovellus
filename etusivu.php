<?php
   
   require_once 'libs/utilities.php';
   require_once 'libs/models/user.php';
  



   if (tarkistaKirjautuminen()) {
	$id = $_SESSION['kirjautunut'];
	$kayttaja = Kayttaja::etsiKayttajaIdlla($id); 	
	
	naytaNakyma("views/etusivu.php", array(
		'tulos' => "Olet kirjautuneena sisään. "
		
	));
   } else {
	naytaNakyma("views/etusivu.php", array(
		'tulos' => "Et ole kirjautuneena sisään."
	));
  }
