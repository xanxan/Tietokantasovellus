<?php

$uusiravintola = new Ravintola();

naytaNakyma("ravintolalomake",array(
  'ravintola' => new Ravintola(),
));

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
  naytaNakymä("ravintolalomake", array(
    'ravintola' => $uusiravintola,
    'virheet' => $uusiravintola->getVirheet()
  ));
}



