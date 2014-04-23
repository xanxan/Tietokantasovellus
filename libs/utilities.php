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
