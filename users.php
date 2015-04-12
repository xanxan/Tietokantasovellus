
<?php 
  //Otetaan käyttöön kirjastotiedosto, joka hakee kasan omatekoisia yleistoimintoja, sekä malliluokka:
  require_once 'libs/utilities.php';
  require_once 'libs/models/user.php';
  
  //Selvitetään onko käyttäjä tehnyt haun
  $hakusana = null;
  if (!empty($_GET['haku'])) {
    $hakusana = $_GET['haku'];
  }
    $haetutkayttajat = Kayttaja::etsiHakusanalla($hakusana);
     $sivu = 1;
   if (isset($_GET['sivu'])) {
    $sivu = (int)$_GET['sivu'];

    //Sivunumero ei saa olla pienempi kuin yksi
    if ($sivu < 1) $sivu = 1;
  }
  $montako = 10;

  //Kutsutaan malliluokan staattista metodia
  $kayttajat = Kayttaja::getKayttajatSivulla($sivu, $montako);
  $kayttajaaLkm = Kayttaja::lukumaara();
  $sivuja = ceil($kayttajaLkm/$montako);
  //Näytetään näkymä lähettäen sille muutamia muuttujia
  $kayttajat = Kayttaja::etsiKaikkiKayttajat();
  naytaNakyma("views/userlist.php", array(
    'sivuja' => $sivuja,
    'title' => "Kayttajalista",
    'lista' => $kayttajat
  ));
