<?php 

 require_once 'libs/utilities.php';
 require_once 'libs/models/user.php';
 require_once 'libs/models/restaurant.php';
 require_once 'libs/models/reviews.php';

 $id = (int)$_GET['id'];
 $ravintola = Ravintola::etsiRavintolaIdlla($id);
 $arvostelu = new Arvostelu();
 $nimi = Kayttaja::etsiKayttajaIdlla($_SESSION['kirjautunut']);
 $arvostelu->setRavintolanimi($ravintola->getNimi());
 $arvostelu->setArvostelija_id($_SESSION['kirjautunut']);
 $arvostelu->setRavintola_id($id);

 if (!is_null($ravintola->getNimi()) && !is_null($ravintola) && !is_null($_SESSION['kirjautunut'])) {

	if(empty($_POST['yleisarvio']) && empty($_POST['ruoka']) && empty($_POST['hintalaatu']) && empty($_POST['palvelu']) && empty($_POST['juomat'])) {	
		naytaNakyma("views/arviolomake.php", array(
			'ravintola' => $ravintola
		)); }
  
   

        $arvostelu->setArvostelijatunnus($nimi->getTunnus());
        $arvostelu->setHintaLaatu($_POST['hintalaatu']);
        $arvostelu->setJuomatarjonta($_POST['juomat']);
        $arvostelu->setPalvelu($_POST['palvelu']);
        $arvostelu->setRavintolanimi($ravintola->getNimi());
        $arvostelu->setRuoka($_POST['ruoka']);
        $arvostelu->setYleisarvio($_POST['yleisarvio']);
	if (!isset($_POST['yleisarvio'])) {
		naytaNakyma("views/arviolomake.php", array(
                	'ravintola' => $ravintola,
			'virheet' => "yleisarvio on pakollinen!", request
			
        	));
 	}
	$arvostelu->setYleisarvio($_POST['yleisarvio']);
 	$arvostelu->lisaaKantaan();
	$k = $ravintola->getArvosteluja();
        $s = $nimi->getArvosteluja();
	$nimi->setArvosteluja($s + 1);
        $nimi->muokkaaArvosteluja();
        $ravintola->setArvosteluja($k + 1);
	$ravintola->muokkaaArvosteluja();
	header('Location: ravintola.php?id='.$id);
	
	$_SESSION['ilmoitus'] = "Arvostelu lisätty onnistuneesti!";
  } else {
	naytaNakyma("views/arviolomake.php", array(
                        
                        'virheet' => "null!", request

                ));

  }
