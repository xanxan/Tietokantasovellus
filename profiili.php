<?php
   
   require_once 'libs/utilities.php';
   require_once 'libs/models/user.php';

$id = (int)$_GET['id'];

$kayttaja = Kayttaja::etsiKayttajaIdlla($id);

if (!is_null($kayttaja)) {
  naytaNakyma("views/user.php", array(
    'kayttaja' => $kayttaja,
  ));
} else {
  naytaNakyma("views/user.php", array(
    'kayttaja' => null,
    'virhe' => "Käyttäjää ei löytynyt!",
  ));
}
