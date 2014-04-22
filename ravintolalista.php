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
 
  $ravintolat = Ravintola::etsiKaikkiRavintolat();
  if(empty($_GET["hintataso"]) && empty($_GET["arvio"]) && empty($_GET["aukioloajat"]) && empty($_GET["tyyppi"]) && empty($_GET["sopivuustieto"]) && empty($_GET["järjestys"])) {
  	naytaNakyma("views/ravintolalista.php", array(
		'sivuja' => $sivuja,
		'lista' => $ravintolat

	));
  }
  $hintataso = htmlspecialchars($_GET["hintataso"]);
  $arvio = htmlspecialchars($_GET["yleisarvio"]);
  $tyyppi = htmlspecialchars($_GET["tyyppi"]);
  $jarjestys = htmlspecialchars($_GET["jarjestys"]);

  $tulos = Ravintola::etsiRavintolat($hintataso, $arvio, $tyyppi, $jarjestys);
  naytaNakyma("views/ravintolalista.php", array(
		'sivuja' => $sivuja,
		'lista' => $tulos
   ));
