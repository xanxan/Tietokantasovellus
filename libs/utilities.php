<?php
  session_start();  

  function naytaNakyma($sivu, $data = array()) {
    $data = (object)$data;
    require 'views/pohja.php';
    exit();
  }

  function issetEcho($var, $tuloste) {
	if(isset($var)) {
		echo $tuloste;
	}
  }

  function tarkistaKirjautuminen() {	
	return isset($_SESSION['kirjautunut']); 
  }

  function kirjauduUlos() {
	unset ($_SESSION["kirjautunut"]);
	unset ($_SESSION["admin"]);
	header('Location: ../etusivu.php');
  }

  function tarkistaOikeudet() {
	
	return isset($_SESSION['admin']); 

  }

  function tulostaTahdet($maara) {
	for ($x=1; $x<=$maara; $x++) { 
	   ?><span class="glyphicon glyphicon-star"></span>
	<?php }
  }

  function onkoTrue($arvo) {
	if ($arvo === true) {
	   return false;
	}  else {

	   return true;
        }
  }
 
  function onkoHintataso($arvo) {
	if ($arvo === '€' || $arvo === '€€' || $arvo === '€€€' || $arvo === '€€€€' || $arvo === '€€€€€') {
		return true;
	} else {
		return false;
	}
  }

 function onkoTyyppi($tyyppi) {
	if ($tyyppi === 'eurooppalainen' || $tyyppi === 'aasialainen' || $tyyppi === 'amerikkalainen' || $tyyppi === 'pikaruokaravintola' || $tyyppi === 'kasvisravintola' || $tyyppi === 'kahvila' || $tyyppi === 'baari' || $tyyppi === 'muu') {
		return true;
	} else {
		return false;
	}
}
