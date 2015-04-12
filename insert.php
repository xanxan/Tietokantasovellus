<?php
 require_once 'libs/utilities.php';
 require_once 'libs/models/restaurant.php';
 require_once 'libs/models/reviews.php';
 require_once 'libs/models/preferences.php';

$uusiravintola = new Ravintola();

if(tarkistaKirjautuminen() && tarkistaOikeudet()) {
   if(empty($_POST['nimi']) && empty($_POST['osoite']) && empty($_POST['aukioloajat']) && empty($_POST['kuvaus'])) {
	naytaNakyma("views/ravintolalomake.php", array(
	  'ravintola' => $uusiravintola,
	  
	));
   }
   $uusiravintola->setNimi(htmlspecialchars($_POST['nimi']));
   $uusiravintola->setTyyppi(htmlspecialchars($_POST['tyyppi']));
   $uusiravintola->setAukioloajat(htmlspecialchars($_POST['aukioloajat']));
   $uusiravintola->setHintataso(htmlspecialchars($_POST['hintataso']));
   $uusiravintola->setKuvaus(htmlspecialchars($_POST['kuvaus']));
   $uusiravintola->setOsoite(htmlspecialchars($_POST['osoite']));
   $uusiravintola->setKuva(htmlspecialchars($_POST['kuva']));
  
   $suositukset = new Sopivuustiedot();
   $suositukset->setRavintola(htmlspecialchars($_POST['nimi']));
   $suositukset->setKasvissyojat($_POST['kasvis']);
   $suositukset->setLapsiperheet($_POST['lapset']);
   $suositukset->setVegaanit($_POST['vege']);
   $suositukset->setLounas($_POST['lounas']);
   $suositukset->setAamiainenBrunssi($_POST['aamu']);
   $suositukset->setAnniskeluoikeus($_POST['oikeus']);
   $suositukset->setBuffet($_POST['buffet']);
   $suositukset->setK18($_POST['k18']);
   $suositukset->setPukupakko($_POST['puku']);
   $suositukset->setVarauspakko($_POST['varaus']);

   if (!isset($_POST['nimi'])) {
      naytaNakyma("views/ravintolalomake.php", array(
	'ravintola' => $uusiravintola,
	'suositukset' => $suositukset,
	'virheet' => "Nimi ei saa olla tyhjä!"
      ));
   } 

   $uusiravintola->setNimi(htmlspecialchars($_POST['nimi']));
   $suositukset->setRavintola(htmlspecialchars($_POST['nimi']));

   if (!isset($_POST['osoite'])) {
       naytaNakyma("views/ravintolalomake.php", array(
	'ravintola' => $uusiravintola,
        'suositukset' => $suositukset,
        'virheet' => "Osoite ei saa olla tyhjä!"
       ));
   }

   $uusiravintola->setOsoite(htmlspecialchars($_POST['osoite']));

   if (!isset($_POST['aukioloajat'])) {
       naytaNakyma("views/ravintolalomake.php", array(
        'ravintola' => $uusiravintola,
        'suositukset' => $suositukset,
        'virheet' => "Aukioloajat ei saa olla tyhjä!", request
       ));
   }

   $uusiravintola->setAukioloajat(htmlspecialchars($_POST['aukioloajat']));

 
   $id = $uusiravintola->lisaaKantaan();
   $suositukset->lisaaKantaan($id);
   header('Location: ravintolalista.php');
   $_SESSION['ilmoitus'] = "Ravintola lisätty onnistuneesti.";
} else {
   $virheet = $uusiravintola->getVirheet();

  //Virheet voidaan nyt välittää näkymälle syötettyjen tietojen kera
  naytaNakyma("views/ravintolalomake.php", array(
    'ravintola' => $uusiravintola,
    'virheet' => $uusiravintola->getVirheet(), request
  ));
}



