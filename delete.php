<?php

require_once 'libs/utilities.php';
require_once 'libs/models/user.php';

$id = (int)$_GET['id'];
$kayttaja = Kayttaja::etsiKayttajaIdlla($id);

if (!is_null($kayttaja)) {
	kirjauduUlos();
        $kayttaja->poistaKayttaja();
	header('Location: etusivu.php');
} else { 
        naytaNakyma("views/login.php", array(
                'kayttaja' => null,
        ));
}
