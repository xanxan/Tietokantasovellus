<?php

require_once 'libs/utilities.php';
require_once 'libs/models/user.php';

$id = $_SESSION['kirjautunut'];
$kayttaja = Kayttaja::etsiKayttajaIdlla($id);
$error = null;


if (!is_null($kayttaja)) {
	if(empty($_POST["password"]) && empty($_POST["password1"]) && empty($_POST["password2"]) && empty($_POST["kuvaus"]) && empty($_POST["kuva"])) {
		naytaNakyma("views/profiilinpaivitys.php", array(
		'kayttaja' => $kayttaja,
		'nimi' => $kayttaja->getTunnus(),
		));
	}

	$salasana = htmlspecialchars($_POST['password']);
       
	if(!empty($_POST['password1']) && !empty($_POST['password2'])) {
 		$kayttaja->setSalasana(htmlspecialchars($_POST['password1']));
        	$salasana2 = htmlspecialchars($_POST['password2']);
        }
 	$kayttaja->setKuvaus(htmlspecialchars($_POST['kuvaus']));
        $kayttaja->setKuva(htmlspecialchars($_POST['kuva']));
	
	if(empty($_POST["password"])) {
	        naytaNakyma("views/profiilinpaivitys.php", array(
                'kayttaja' => $kayttaja,
		'virhe' => "Kirjoitathan nykyisen salasanasi ennen tietojen tallentamista!",
	        )); }

		 $salasana = htmlspecialchars($_POST['password']);

	if(!empty($_POST["password1"]) && empty($_POST["password2"])) {
		naytaNakyma("views/profiilinpaivitys.php", array(
		'kayttaja' => $kayttaja,
		'virhe' => "Et kirjoittanut uutta salasanaasi uudelleen!",
		'virheet' => $kayttaja->getVirheet()
		)); }
	if(!empty($_POST['password1']) && !empty($_POST['password2'])) {
		 $kayttaja->setSalasana(htmlspecialchars($_POST['password1']));
		 $salasana2 = htmlspecialchars($_POST["password2"]);
	}

	if(!empty($_POST["password1"]) && empty($_POST["password2"]) && $kayttaja->getSalasana() != $salasana2) {
		   naytaNakyma("views/profiilinpaivitys.php", array(
                'kayttaja' => $kayttaja,
                'virhe' => "Uudet salasanat eivät täsmänneet!",
                'virheet' => $kayttaja->getVirheet(), request
                ));
        }
	
	$user = Kayttaja::etsiKayttajaTunnuksilla($kayttaja->getTunnus(), $salasana);

		if (!is_null($user)) {
		   if($user->onkoKelvollinen()) {
			$kayttaja->paivita();
		        header('Location: profiili.php?id='.$id);
		  	$_SESSION['ilmoitus'] = "Päivitys onnistui!";
		    } else { 
			$virheet = $user->getVirheet();
			naytaNakyma("views/profiilinpaivitys.php", array(
			'kayttaja' => $kayttaja,
			'virheet' => $virheet, request
			)); }
		} else {
			naytaNakyma("views/profiilinpaivitys.php", array(
			'kayttaja' => $kayttaja,
			'virhe' => "Annoit väärän salasanan",
			'virheet' => $kayttaja->getVirheet(), request
			));

		} $salasana = $_POST['password'];
	
}
