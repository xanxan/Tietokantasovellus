<?php
 require_once 'libs/utilities.php';
 require_once 'libs/models/restaurant.php';

$id = (int)$_GET['id'];
$ravintola = Ravintola::etsiRavintolaIdlla($id);
$virhe = null;

if (!is_null($ravintola)) {
  if(empty($_POST['osoite']) && empty($_POST['aukioloajat'])) {
	naytaNakyma("views/ravintolanpaivitys.php", array(
	'ravintola' => $ravintola,
	'nimi' => $ravintola->getNimi()
	));
  }
  $ravintola->setNimi(htmlspecialchars($_POST['nimi']));
  $ravintola->setTyyppi(htmlspecialchars($_POST['tyyppi']));
  $ravintola->setId(htmlspecialchars($_POST['id']));
  $ravintola->setAukioloajat(htmlspecialchars($_POST['aukioloajat']));
  $ravintola->setArvosteluja(htmlspecialchars($_POST['arvosteluja']));
  $ravintola->setHintataso(htmlspecialchars($_POST['hintataso']));
  $ravintola->setInhokki(htmlspecialchars($_POST['inhokki']));
  $ravintola->setKommentteja(htmlspecialchars($_POST['kommentteja']));
  $ravintola->setKuva(htmlspecialchars($_POST['kuva']));
  $ravintola->setKuvaus(htmlspecialchars($_POST['kuvaus']));
  $ravintola->setOsoite(htmlspecialchars($_POST['osoite']));
  $ravintola->setSuosikki($_POST['suosikki']);


  if ($ravintola->onkoKelvollinen()) {
    $ravintola->paivita();
    $_SESSION['ilmoitus'] = "Ravintola päivitetty onnistuneesti.";


  //ravintola päivitettiin kantaan onnistuneesti, lähetetään käyttäjä eteenpäin
  header('Location: ravintolalista.php');
 
  } else {
   $virheet = $ravintola->getVirheet();

  //Virheet voidaan nyt välittää näkymälle syötettyjen tietojen kera
   naytaNakyma("views/ravintolanpaivitys.php", array(
    'nimi' => $ravintola->getNimi(),
    'ravintola' => $ravintola,
    'virheet' => $ravintola->getVirheet()
   ));
 }

}

