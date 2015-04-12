<?php

require_once 'libs/utilities.php';
require_once 'libs/models/user.php';
require_once 'libs/models/yllapitaja.php';

//admin koodataan suoraan näin aluksi
$id = 5;



$kayttaja = Kayttaja::etsiKayttajaIdlla($id);

$admin = new Yllapitaja();
$admin->setId($kayttaja->getId());
$admin->setTunnus($kayttaja->getTunnus());

$admin->lisaaAdmin();
