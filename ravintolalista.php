<?php

   require_once 'libs/utilities.php';
   require_once 'libs/models/restaurant.php';

   $sivu = 1;
   if (isset($_GET['sivu'])) {
    $sivu = (int)$_GET['sivu'];

    //Sivunumero ei saa olla pienempi kuin yksi
    if ($sivu < 1) $sivu = 1;
  }
  $montako = 10;
  
  //Kysytään mallilta ravintoloita sivulla $sivu, 
  $ravintolat = Ravintola::getRavintolatSivulla($sivu, $montako);

  //Ravintoloiden kokonaislukumäärä haetaan, jotta tiedetään montako sivua ravintoloita kokonaisuudessa on:
  $ravintolaLkm = Ravintola::lukumaara();
  $sivuja = ceil($ravintolaLkm/$montako);

  	naytaNakyma("views/ravintolalista.php", array(
		'sivuja' => $sivuja,

	));
