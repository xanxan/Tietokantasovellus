
<?php 
  //Otetaan käyttöön kirjastotiedosto, joka hakee kasan omatekoisia yleistoimintoja, sekä malliluokka:
  require_once 'libs/utilities.php';
  require_once 'libs/models/user.php';
  
  //Selvitetään onko käyttäjä tehnyt haun
  $hakusana = null;
  if (!empty($_GET['haku'])) {
    $hakusana = $_GET['haku'];
  }

  //Kutsutaan malliluokan staattista metodia
  $kayttajat = Kayttaja::etsiHakusanalla($hakusana);
  
  //Näytetään näkymä lähettäen sille muutamia muuttujia
  naytaNakymä("kayttajalista", array(
    'title' => "Kayttajalista",
    'kayttajat' => $kayttajat
  ));
