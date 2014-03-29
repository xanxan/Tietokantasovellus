<?php
  session_start();  

  function naytaNakyma($sivu, $data = array()) {
    $data = (object)$data;
    require 'views/pohja.php';
    exit();
  }

  function tarkistaKirjautuminen() {	
	if (isset($_SESSION['kayttaja'])) {
   	   $kayttaja = $_SESSION['kayttaja'];
   		return true;
 	 } else {
	   header('Location: login.php');
	 }
  }

  function kirjauduUlos() {
	unset ($_SESSION["kirjautunut"]);
	header('Location: login.php');
  }
