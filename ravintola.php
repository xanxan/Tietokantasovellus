<?php
   
   require_once 'libs/utilities.php';
   require_once 'libs/models/restaurant.php';
   require_once 'libs/models/favoritelist.php';
   require_once 'libs/models/blacklist.php';
   require_once 'libs/models/reviews.php';
   require_once 'libs/models/comments.php';
   require_once 'libs/models/user.php';

   $id = (int)$_GET['id'];
   $kayttaja= Kayttaja::etsiKayttajaIdlla($_SESSION["kirjautunut"]);
   $ravintola = Ravintola::etsiRavintolaIdlla($id);
   $suosikki = Suosikit::onkoSuosikeissa($_SESSION["kirjautunut"], $id);
   $inhokki = Inhokit::onkoinhokeissa($_SESSION["kirjautunut"], $id);
   $arvosteltu = Arvostelu::onkoArvosteltu($id, $_SESSION["kirjautunut"]);
   $arvostelut = Arvostelu::etsiRavintolanArvostelut($id);
   $arvosteluja = Arvostelu::lukumaara($id);
   $kommentit = Kommentit::etsiRavintolanKommentit($id);
   $kommentoitu = Kommentit::onkoKommentoitu($_SESSION["kirjautunut"], $id);
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
	if (empty($_POST['kommentti'])) {
		naytaNakyma("ravintolasivu.php", array(
                 'ravintola' => $ravintola,
                 'suosikki' => $suosikki,
                 'inhokki' => $inhokki,
                 'arvosteltu' => $arvosteltu,
                 'yleisarvio' => $yleisarvio / $arvosteluja,
                 'hintalaatu' => $hintalaatu / $arvosteluja,
                 'palvelu' => $palvelu / $arvosteluja,
                 'juomat' => $juomat / $arvosteluja,
                 'ruoka' => $ruoka / $arvosteluja,
                 'kommentit' => $kommentit,
                 'kommentoitu' => $kommentoitu
                 ));
	}
         if (isset($_POST['kommentti'])) {
		Kommentit::lisaaKantaan($_SESSION['kirjautunut'], $id, $ravintola->getNimi(), $kayttaja->getTunnus(), htmlspecialchars($_POST['kommentti']));
		header('Location: ravintola.php?id='.$id);
		$_SESSION['ilmoitus'] = "Kommenttisi on nyt lisätty.";	
	 }
   } else {
 	 naytaNakyma("ravintolasivu.php", array(
         'ravintola' => null,
         'virheet' => array('Ravintolaa ei löytynyt!')
         ));
  }
