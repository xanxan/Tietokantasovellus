<?php
 require_once 'libs/utilities.php';
 require_once 'libs/models/restaurant.php';

$uusiravintola = new Ravintola();
if(empty($_POST['nimi']) && empty($_POST['osoite']) && empty($_POST['aukioloajat'])) {
	naytaNakyma("views/ravintolalomake.php", array(
	  'ravintola' => new Ravintola(),
	));
}
$uusiravintola->setNimi(htmlspecialchars($_POST['nimi']));
$uusiravintola->setTyyppi(htmlspecialchars($_POST['tyyppi']));
$uusiravintola->setId(htmlspecialchars($_POST['id']));
$uusiravintola->setAukioloajat(htmlspecialchars($_POST['aukioloajat']));
$uusiravintola->setArvosteluja(htmlspecialchars($_POST['arvosteluja']));
$uusiravintola->setHintataso(htmlspecialchars($_POST['hintataso']));
$uusiravintola->setInhokki(htmlspecialchars($_POST['inhokki']));
$uusiravintola->setKommentteja(htmlspecialchars($_POST['kommentteja']));
$uusiravintola->setKuva(htmlspecialchars($_POST['kuva']));
$uusiravintola->setKuvaus(htmlspecialchars($_POST['kuvaus']));
$uusiravintola->setOsoite(htmlspecialchars($_POST['osoite']));
$uusiravintola->setSuosikki(htmlspecialchars($_POST['suosikki']));


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



