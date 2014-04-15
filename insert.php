<?php
 require_once 'libs/utilities.php';
 require_once 'libs/models/restaurant.php';

$uusiravintola = new Ravintola();
if(empty($_POST['nimi']) && empty($_POST['osoite']) && empty($_POST['aukioloajat'])) {
	naytaNakyma("views/ravintolalomake.php", array(
	  'ravintola' => new Ravintola(),
	));
}
$uusiravintola->setNimi($_POST['nimi']);
$uusiravintola->setTyyppi($_POST['tyyppi']);
$uusiravintola->setId($_POST['id']);
$uusiravintola->setAukioloajat($_POST['aukioloajat']);
$uusiravintola->setArvosteluja($_POST['arvosteluja']);
$uusiravintola->setHintataso($_POST['hintataso']);
$uusiravintola->setInhokki($_POST['inhokki']);
$uusiravintola->setKommentteja($_POST['kommentteja']);
$uusiravintola->setKuva($_POST['kuva']);
$uusiravintola->setKuvaus($_POST['kuvaus']);
$uusiravintola->setOsoite($_POST['osoite']);
$uusiravintola->setSuosikki($_POST['suosikki']);


if ($uusiravintola->onkoKelvollinen()) {
  $uusiravintola->lisaaKantaan();
  $_SESSION['ilmoitus'] = "Ravintola lisätty onnistuneesti.";


  //ravintola lisättiin kantaan onnistuneesti, lähetetään käyttäjä eteenpäin
  header('Location: ravintolalista.php');
 
} else {
  $virheet = $uusiravintola->getVirheet();

  //Virheet voidaan nyt välittää näkymälle syötettyjen tietojen kera
  naytaNakyma("views/ravintolalomake.php", array(
    'ravintola' => $uusiravintola,
    'virheet' => $uusiravintola->getVirheet()
  ));
}



