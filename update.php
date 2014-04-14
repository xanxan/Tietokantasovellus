<?php

require_once 'libs/utilities.php';
require_once 'libs/models/user.php';

$id = (int)$_GET['id'];
$kayttaja = Kayttaja::etsiKayttajaIdlla($id);

if (!is_null($kayttaja)) {
	naytaNakyma("views/profiilinpaivitys.php", array(
		'kayttaja' => $kayttaja,
		'nimi' => $kayttaja->getTunnus(),
	));
} else { 
	naytaNakyma("views/profiilinpaivitys.php", array(
		'kayttaja' => null,
		'virhe' => "Sinulla ei ole oikeuksia tähän sivuun",
	));
}


	$kayttaja = new Kayttaja();
	$salasana = $_POST['password'];
	$kayttaja->setSalasana($_POST['password1']);
	$salasana2 = $_POST['password2'];
	$kayttaja->setKuvaus($_POST['kuvaus']);
	$kayttaja->setKuva($_POST['kuva']);


if(empty($_POST["password"])) {
        naytaNakyma("views/profiilinpaivitys.php", array(
                'kayttaja' => $kayttaja,
		'virhe' => "Kirjoitathan nykyisen salasanasi ennen tietojen tallentamista!",
        )); }

 $salasana = $_POST['password'];

if(!empty($_POST["password1"]) && empty($_POST["password2"])) {
	naytaNakyma("views/profiilinpaivitys.php", array(
		'kayttaja' => $kayttaja,
		'virhe' => "Et kirjoittanut uutta salasanaasi uudelleen!",
	)); }

 $kayttaja->setSalasana($_POST['password1']);
 $salasana2 = $_POST["password2"];

if($kayttaja->getSalasana() == $salasana2) {
	$user = Kayttaja::etsiKayttaja($kayttaja);

	if ($salasana == $user->getSalasana()) {
		$kayttaja->paivita();
	        header('Location: etusivu.php');
	} else {
		naytaNakyma("views/profiilinpaivitys.php", array(
			'kayttaja' => $kayttaja,
			'virhe' => "Annoit väärän salasanan",
		));

		$salasana = $_POST['password'];
	}
} else {
	naytaNakyma("views/profiilinpaivitys.php", array(
		'kayttaja' => $kayttaja,
		'virhe' => "Uudet salasanat eivät täsmänneet!", request
	));
}
