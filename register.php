<?php

require_once 'libs/utilities.php';
require_once 'libs/models/user.php';


if(empty($_POST["username"]) && empty($_POST["password1"]) && empty($_POST["password2"])) {
	naytaNakyma("views/rekisteröityminen.php", array(
		'kayttaja' => $kayttaja,

	));
}
$kayttaja = new Kayttaja();
$kayttaja->setTunnus(htmlspecialchars($_POST['username']));
$kayttaja->setSalasana(htmlspecialchars($_POST['password1']));
$salasana2 = htmlspecialchars($_POST["password2"]);
$kayttaja->setKuvaus(htmlspecialchars($_POST['kuvaus']));
$kayttaja->setKuva(htmlspecialchars($_POST['kuva']));

if (empty($_POST["username"])) {
	naytaNakyma("rekisteröityminen.php", array(
		'virhe' => "Virhe rekisteröitymisessä, et antanut käyttäjätunnusta.",
));
   }
	$kayttaja->setTunnus(htmlspecialchars($_POST['username']));

   if (empty($_POST["password1"]) && empty($_POST["password2"])) {
   
   naytaNakyma("rekisteröityminen.php", array(
        'kayttaja' => $kayttaja,
	'virhe' => "Virhe rekisteröitymisessä, et antanut salasanaa.",
        ));
   }

   $kayttaja->setSalasana(htmlspecialchars($_POST['password1']));
   $salasana2 = htmlspecialchars($_POST["password2"]);

   if($kayttaja->getSalasana() == $salasana2) {
	$tulos = Kayttaja::etsiKayttaja($kayttaja);
	if($tulos == true) {
	   naytaNakyma("rekisteröityminen.php", array(
       		 'kayttaja' => $kayttaja,
        	 'virhe' => "Virhe rekisteröitymisessä, käyttäjätunnus on jo varattu.",
        ));
	} else {
	 
	   $kayttaja->lisaaKantaan();
	   header('Location: login.php');
	   $_SESSION['ilmoitus'] = "Rekisteröityminen onnistui, kirjaudu sisään.";
	 
	}
   } else {
	
	naytaNakyma("rekisteröityminen.php", array(
        'kayttaja' => $kayttaja,
        'virhe' => "Virhe rekisteröitymisessä, salasanat eivät täsmänneet.", request
        ));
   }



