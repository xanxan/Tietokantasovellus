<?php
   
   require_once 'libs/utilities.php';
   require_once 'libs/models/restaurant.php';
   require_once 'libs/models/user.php';
   require_once 'libs/models/favoritelist.php';
   require_once 'libs/models/blacklist.php';
   require_once 'libs/models/comments.php';
$id = (int)$_GET['id'];

$kayttaja = Kayttaja::etsiKayttajaIdlla($id);
$suosikkilista = Suosikit::etsiSuosikit($kayttaja);
$inhokkilista = Inhokit::etsiInhokit($kayttaja);
$kommentit = Kommentit::etsiKayttajanKommentit($id);


if ($kayttaja != null) {
  naytaNakyma("user.php", array(
    'kayttaja' => $kayttaja,
    'suosikkilista' => $suosikkilista,
    'inhokkilista' => $inhokkilista,
    'kommentit' => $kommentit
  ));
} else {
  naytaNakyma("views/user.php", array(
    'kayttaja' => null,
    'virhe' => array('Käyttäjää ei löytynyt!')
  ));
}
