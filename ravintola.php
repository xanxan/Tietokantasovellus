<?php
   
   require_once 'libs/utilities.php';
   require_once 'libs/models/restaurant.php';
   require_once 'libs/models/favoritelist.php';
   require_once 'libs/models/blacklist.php';
   require_once 'libs/models/reviews.php';

   $id = (int)$_GET['id'];
   $ravintola = Ravintola::etsiRavintolaIdlla($id);
   $suosikki = Suosikit::onkoSuosikeissa($_SESSION["kirjautunut"], $id);
   $inhokki = Inhokit::onkoinhokeissa($_SESSION["kirjautunut"], $id);
   $arvosteltu = Arvostelu::onkoArvosteltu($id, $_SESSION["kirjautunut"]);
   $arvostelut = Arvostelu::etsiRavintolanArvostelut($id);
   $arvosteluja = Arvostelu::lukumaara($id);
   $yleisarvio = 0;
   $hintalaatu = 0;
   $palvelu = 0;
   $juomat = 0;
   $ruoka = 0;

   foreach($arvostelut as $arvostelu) {
	$yleisarvio = $yleisarvio + $arvostelu->getYleisarvio();
 	$hintalaatu = $hintalaatu + $arvostelu->getHintaLaatu();
	$palvelu = $palvelu + $arvostelu->getPalvelu();
	$juomat = $juomat + $arvostelu->getJuomatarjonta();
	$ruoka = $ruoka + $arvostelu->getRuoka();
   }
   

   if ($ravintola != null) {
 	 naytaNakyma("ravintolasivu.php", array(
         'ravintola' => $ravintola,
	 'suosikki' => $suosikki,
	 'inhokki' => $inhokki,
	 'arvosteltu' => $arvosteltu,
	 'yleisarvio' => $yleisarvio / $arvosteluja,
         'hintalaatu' => $hintalaatu / $arvosteluja,
	 'palvelu' => $palvelu / $arvosteluja,
	 'juomat' => $juomat / $arvosteluja,
	 'ruoka' => $ruoka / $arvosteluja

	 ));
   } else {
 	 naytaNakyma("ravintolasivu.php", array(
         'ravintola' => null,
         'virheet' => array('Ravintolaa ei löytynyt!')
         ));
  }
