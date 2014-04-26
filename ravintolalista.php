<?php

   require_once 'libs/utilities.php';
   require_once 'libs/models/restaurant.php';

   $sivu = 1;
   if (isset($_GET['sivu'])) {
    $sivu = (int)$_GET['sivu'];

//    Sivunumero ei saa olla pienempi kuin yksi
    if ($sivu < 1) {$sivu = 1;}
  }
  $montako = 10;
  $jarjestys =1;
  $tyyppi = 'is not null';
  $hintataso = 'is not null';
  
  //Kysytään mallilta ravintoloita sivulla $sivu, 
  $ravintolat = Ravintola::getRavintolatSivulla($hintataso, $tyyppi, $jarjestys, $sivu, $montako);

  //Ravintoloiden kokonaislukumäärä haetaan, jotta tiedetään montako sivua ravintoloita kokonaisuudessa on:
  $ravintolaLkm = Ravintola::lukumaara();
  $sivuja = ceil($ravintolaLkm/$montako);
 
 // $ravintolat = Ravintola::etsiKaikkiRavintolat();
  if(empty($_GET["jarjestys"]) && empty($_GET["hintataso"]) && empty($_GET["tyyppi"])) {
  	naytaNakyma("views/ravintolalista.php", array(
		'sivuja' => $sivuja,
		'lista' => $ravintolat,
		'sivu' => $sivu
	));
  }
  if (!empty($_GET["hintataso"]) && onkoHintataso($_GET["hintataso"]) == true) {
 	 $hintataso = "= '".htmlspecialchars($_GET["hintataso"])."'";
  } 
  if (!empty($_GET["tyyppi"]) && onkoTyyppi($_GET["tyyppi"]) == true) {
  	$tyyppi = "= '".htmlspecialchars($_GET["tyyppi"])."'";
  }
  $jarjestys = htmlspecialchars($_GET["jarjestys"]);

  $tulos = Ravintola::getRavintolatSivulla($hintataso, $tyyppi, $jarjestys, $sivu, $montako);
  naytaNakyma("views/ravintolalista.php", array(
		'sivuja' => $sivuja,
		'lista' => $tulos,
		'sivu' => $sivu
   ));
