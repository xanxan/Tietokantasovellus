<?php

require_once 'libs/utilities.php';
require_once 'libs/models/user.php';

$id = (int)$_GET['id'];
$kayttaja = Kayttaja::etsiKayttajaIdlla($id);

if (!is_null($kayttaja)) {
	naytaNakyma("views/profiilinpaivitys.php", array(
		'kayttaja' => $kayttaja,
	));
} else { 
	naytaNakyma("views/profiilinpaivitys.php", array(
		'kayttaja' => null,
		'virhe' => "Sinulla ei ole oikeuksia tähän sivuun",
	));
}

if(empty($_POST["password1"]) && empty($_POST["password2"])) {
	naytaNakyma("views/profiilinpaivitys.php", array(
		'kayttaja' => $kayttaja,

	)); }

	$kayttaja = new Kayttaja();
	$kayttaja->setSalasana($_POST['password1']);
	$salasana2 = $_POST["password2"];
	$kayttaja->setKuvaus($_POST['kuvaus']);
	$kayttaja->setKuva($_POST['kuva']);

