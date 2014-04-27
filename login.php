<?php
   
   require_once 'libs/utilities.php';
   require_once 'libs/models/user.php';
   require_once 'libs/models/admin.php';

   if(empty($_POST["username"]) && empty($_POST["password"])) {
	naytaNakyma("kirjautumislomake.php", array(
		
	));
   }

    $kayttaja = htmlspecialchars($_POST["username"]);
    $salasana =  htmlspecialchars($_POST["password"]);

   if (empty($_POST["username"])) {
	naytaNakyma("kirjautumislomake.php", array(
	  'virhe' => "Virhe kirjautumisessa, et antanut käyttäjätunnusta.",
	));
   }
   $kayttaja =  htmlspecialchars($_POST["username"]);

   if (empty($_POST["password"])) {
   
  	 naytaNakyma("kirjautumislomake.php", array(
       		 'kayttaja' => $kayttaja,
		 'virhe' => "Virhe kirjautumisessa, et antanut salasanaa.",
       		 )); 
   } 

	
   $salasana = htmlspecialchars($_POST["password"]);

	$tulos = Kayttaja::etsiKayttajaTunnuksilla($kayttaja, $salasana);
	if ($tulos == false) {
		naytaNakyma("kirjautumislomake.php", array(
                 'kayttaja' => $kayttaja,
                 'virhe' => "Virhe kirjautumisessa, virheellinen käyttäjätunnus tai salasana!", request
                 ));
		
	} else {
		if (!is_null(Yllapitaja::EtsiAdminIdlla($tulos->getId()))) { 
			$_SESSION['admin'] = $tulos->getId();
		}
		$_SESSION['kirjautunut'] = $tulos->getId();
		
                header('Location: etusivu.php');
        }  
