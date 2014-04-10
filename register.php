<?php

require_once 'libs/utilities.php';
require_once 'libs/models/user.php';


if(empty($_POST["username"]) && empty($_POST["password1"]) && empty($_POST["password2"])) {
	naytaNakyma("views/rekisteröityminen.php", array(
		'kayttaja' => $kayttaja,

	));
}
$kayttaja = $_POST["username"];
$salasana1 = $_POST["password1"];
$salasana2 = $_POST["password2"];
$kuvaus = $_POST["kuvaus"];
$kuva = $_POST["kuva"];

if (empty($_POST["username"])) {
	naytaNakyma("rekisteröityminen.php", array(
		'virhe' => "Virhe rekisteröitymisessä, et antanut käyttäjätunnusta.",
));
   }
   $kayttaja = $_POST["username"];


   if (empty($_POST["password1"]) && empty($_POST["password2"])) {
   
   naytaNakyma("rekisteröityminen.php", array(
        'kayttaja' => $kayttaja,
	'virhe' => "Virhe rekisteröitymisessä, et antanut salasanaa.",
        ));
   }


   $salasana1 = $_POST["password1"];
   $salasana2 = $_POST["password2"];

   if($salasana1 == $salasana2) {
	$tulos = Kayttaja::etsiKayttaja($kayttaja);
	if($tulos == true) {
	   naytaNakyma("rekisteröityminen.php", array(
        'kayttaja' => $kayttaja,
        'virhe' => "Virhe rekisteröitymisessä, käyttäjätunnus on jo varattu.",
        ));
	} else {

	   Kayttaja::lisaaUusiKayttaja($tunnus, $salasana1, $kuvaus, $kuva);
	   $_SESSION['kirjautunut'] = $tulos->getId();
	   header('Location: etusivu.php');
	}
   } else {

	naytaNakyma("rekisteröityminen.php", array(
        'kayttaja' => $kayttaja,
        'virhe' => "Virhe rekisteröitymisessä, salasanat eivät täsmänneet.", request
        ));
   }



