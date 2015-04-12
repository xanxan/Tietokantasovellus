<?php
//require_once sisällyttää annetun tiedoston vain kerran
require_once "tietokantayhteys.php"; 
require_once "kayttaja.php";
$lista = Kayttaja::etsiKaikkiKayttajat();
?><!DOCTYPE HTML>
<html>
  <head><title>Otsikko</title></head>
  <body>
    <h1>Listaelementtitesti</h1>
    <ul>
    <?php foreach($lista as $asia) { ?>
      <li><?php echo $asia->getTunnus(); ?></li>
    <?php } ?>
    </ul>
  </body>
</html>
