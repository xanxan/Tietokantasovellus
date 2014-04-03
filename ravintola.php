<?php
   
   require_once 'libs/utilities.php';
   require_once 'libs/models/restaurant.php';

   $id = (int)$_GET['id'];
   $ravintola = Ravintola::etsiRavintolaIdlla($id);

   if ($ravintola != null) {
 	 naytaNakyma("ravintolasivu.php", array(
         'ravintola' => $ravintola,
	 
         ));
   } else {
 	 naytaNakyma("ravintolasivu.php", array(
         'ravintola' => null,
         'virheet' => array('Ravintolaa ei löytynyt!')
         ));
  }
