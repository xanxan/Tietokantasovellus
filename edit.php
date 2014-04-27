<?php
 require_once 'libs/utilities.php';
 require_once 'libs/models/restaurant.php';
 require_once 'libs/models/preferences.php';

$id = (int)$_GET['id'];
$ravintola = Ravintola::etsiRavintolaIdlla($id);
$suositukset = Sopivuustiedot::haeRavintolanTiedot($ravintola);

if(tarkistaKirjautuminen() && tarkistaOikeudet() && isset($ravintola) && isset($suositukset)) {
   if(empty($_POST['osoite']) && empty($_POST['aukioloajat']) && empty($_POST['kuvaus'])) {
	naytaNakyma("views/ravintolanpaivitys.php", array(
		'ravintola' => $ravintola,
		'suositukset' => $suositukset
		));
   	}
   $ravintola->setAukioloajat(htmlspecialchars($_POST['aukioloajat']));
   $ravintola->setHintataso(htmlspecialchars($_POST['hintataso']));
   $ravintola->setKuvaus(htmlspecialchars($_POST['kuvaus']));
   $ravintola->setOsoite(htmlspecialchars($_POST['osoite']));
   $ravintola->setKuva(htmlspecialchars($_POST['kuva']));
  

   $suositukset->setRavintola_id($id);
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


   if (!isset($_POST['osoite'])) {
       naytaNakyma("views/ravintolanpaivitys.php", array(
	  'ravintola' => $ravintola,
          'suositukset' => $suositukset,
          'virheet' => "Osoite ei saa olla tyhjä!"
       ));
   }

   $ravintola->setOsoite(htmlspecialchars($_POST['osoite']));

   if (!isset($_POST['aukioloajat'])) {
       naytaNakyma("views/ravintolanpaivitys.php", array(
       	 'ravintola' => $ravintola,
         'suositukset' => $suositukset,
         'virheet' => "Aukioloajat ei saa olla tyhjä!", request
       ));
   }

   $ravintola->setAukioloajat(htmlspecialchars($_POST['aukioloajat']));

 
   $ravintola->paivita();
   $suositukset->paivita();
   header('Location: ravintola.php?id='.$id);
   $_SESSION['ilmoitus'] = "Ravintola päivitetty onnistuneesti.";

} else {

   $virheet = $ravintola->getVirheet();

  naytaNakyma("views/ravintolanpaivitys.php", array(
    'ravintola' => $ravintola,
    'virheet' => $ravintola->getVirheet(), request
  ));
}




