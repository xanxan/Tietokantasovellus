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
  if(empty($_POST["hintataso"]) && empty($_POST["arvio"]) && empty($_POST["aukioloajat"]) && empty($_POST["tyyppi"]) && empty($_POST["sopivuustieto"]) && empty($_POST["järjestys"])) {
  	naytaNakyma("views/ravintolalista.php", array(
		'sivuja' => $sivuja,
		'lista' => $ravintolat

	));
  }
  $hintataso = htmlspecialchars($_POST["hintataso"]);
  $arvio = htmlspecialchars($_POST["arvio"]);
  $aukioloajat = htmlspecialchars($_POST["aukioloajat"]);
  $tyyppi = htmlspecialchars($_POST["tyyppi"]);
  $sopivuustieto = htmlspecialchars($_POST["sopivuustieto"]);
  $jarjestys = htmlspecialchars($_POST["järjestys"]);

  $tulos = Ravintola::etsiRavintolat($hintataso, $arvio, $aukioloajat, $tyyppi, $sopivuustieto, $jarjestys);
  naytaNakyma("views/ravintolalista.php", array(
		'sivuja' => $sivuja,
		'lista' => $tulos
   ));
