<?php 

 require_once 'libs/utilities.php';
 require_once 'libs/models/user.php';
 require_once 'libs/models/restaurant.php';
 require_once 'libs/models/reviews.php';

 $id = (int)$_GET['id'];
 $ravintola = Ravintola::etsiRavintolaIdlla($id);
 $virhe = null;
 $arvostelu = new Arvostelu();
 $nimi = Kayttaja::etsiKayttajaIdlla($_SESSION['kirjautunut']);
 if (!is_null($ravintola) && !is_null($_SESSION['kirjautunut'])) {
	if(empty($_GET['yleisarvio']) && empty($_GET['ruoka']) && empty($_GET['hintalaatu']) && empty($_GET['palvelu']) && empty($_GET['juomat'])) {	
	naytaNakyma("views/arviolomake.php", array(
		'ravintola' => $ravintola
	)); }
  
  } 

	$arvostelu->setArvostelija_id($_SESSION['kirjautunut']);
        $arvostelu->setRavintola_id($id);
        $arvostelu->setArvostelija_tunnus($nimi->getTunnus());
        $arvostelu->setHintaLaatu($_POST['hintalaatu']);
        $arvostelu->setJuomatarjonta($_POST['juomat']);
        $arvostelu->setPalvelu($_POST['palvelu']);
        $arvostelu->setRavintolanimi($ravintola->getNimi());
        $arvostelu->setRuoka($_POST['ruoka']);
        $arvostelu->setYleisarvio($_POST['yleisarvio']);

	if (is_null($_POST['yleisarvio'])) {
		naytaNakyma("views/arviolomake.php", array(
                	'ravintola' => $ravintola,
			'virheet' => "yleisarvio on pakollinen!"

        	));
 	}
	
 	$arvostelu->lisaaKantaan();
	header('Location: ravintola.php?id='.$id);
	
	$_SESSION['ilmoitus'] = "Arvostelu lisätty onnistuneesti!";
