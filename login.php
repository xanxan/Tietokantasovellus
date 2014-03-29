<?php
   
   require_once 'libs/utilities.php';
   require_once 'libs/models/user.php';
   if (empty($_POST["username"])) {
	naytaNakyma("kirjautumislomake.php", array(
	  'virhe' => "Virhe kirjautumisessa, et antanut käyttäjätunnusta.",
	));
   }
   $kayttaja = $_POST["username"];

   if (empty($_POST["password"])) {
   
  	 naytaNakyma("kirjautumislomake.php", array(
       		 'kayttaja' => $kayttaja,
		 'virhe' => "Virhe kirjautumisessa, et antanut salasanaa.",
       		 )); 
   } 

	
	$salasana = $_POST["password"];
	$tulos = Kayttaja::etsiKayttajaTunnuksilla($kayttaja, $salasana);
	if ($kayttaja == $tulos->getTunnus()  && $salasana == $tulos->getSalasana()) {
		$_SESSION['kirjautunut'] = $kayttaja;
		header('Location: /html-demo/Profiilisivu.html');
	} else {
		naytaNakyma("kirjautumislomake.php", array(
		 'kayttaja' => $kayttaja,
                 'virhe' => "Virhe kirjautumisessa, virheellinen käyttäjätunnus tai salasana!", request
                 ));
        }  
