<?php

require_once 'libs/utilities.php';
require_once 'libs/models/restaurant.php';
require_once 'libs/models/preferences.php';
require_once 'libs/models/comments.php';
require_once 'libs/models/reviews.php';
require_once 'libs/models/favoritelist.php';
require_once 'libs/models/blacklist.php';

$id = (int)$_GET['id'];
$ravintola = Ravintola::etsiRavintolaIdlla($id);

if (!is_null($ravintola)) {
	Kommentit::poistaRavintolanKommentit($id);
	Sopivuustiedot::poistaTiedot($id);
	Inhokit::poistaRavintola($id);
	Suosikit::poistaRavintola($id);
	Arvostelu::poistaArvostelut($id);
	$ravintola->poistaRavintola();
	
	header('Location: ravintolalista.php');
	$_SESSION['ilmoitus'] = "Ravintola poistettu kannasta.";
} else {
        naytaNakyma("views/ravintolalista.php", array(
                'virheet' => "Virhe komennossa"
        ));
}
