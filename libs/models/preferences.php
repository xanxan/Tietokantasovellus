<?php
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/restaurant.php';

class Sopivuustiedot {

  private $ravintola_id;
  private $ravintola;
  private $kasvissyojat;
  private $lapsiperheet;
  private $vegaanit;
  private $lounas;
  private $aamiainenBrunssi;
  private $anniskeluoikeus;
  private $buffet;
  private $k18;
  private $pukupakko;
  private $varauspakko;

  private $virheet = array();


  public function __construct($id, $ravintola, $kasvis, $lapset, $vege, $lounas, $aamiainenBrunssi, $anniskeluoikeus, $buffet, $k18, $pukupakko, $varauspakko) {
    $this->ravintola_id = $id;
    $this->ravintola = $ravintola;
    $this->kasvissyojat = $kasvis;
    $this->lapsiperheet = $lapset;
    $this->vegaanit = $vege;
    $this->lounas = $lounas;
    $this->aamiainenBrunssi = $aamiainenBrunssi;
    $this->anniskeluoikeus = $anniskeluoikeus;
    $this->buffet = $buffet;
    $this->k18 = $k18;
    $this->pukupakko = $pukupakko;
    $this->varauspakko = $varauspakko;
  }

  public function uudetTiedot($tulos) {
	$tiedot = new Sopivuustiedot();
        $tiedot->setRavintola_id($tulos->ravintola_id);
	$tiedot->setRavintola($tulos->ravintola);
	$tiedot->setKasvissyojat($tulos->kasvissyojat);
	$tiedot->setLapsiperheet($tulos->lapsiperheet);
	$tiedot->setVegaanit($tulos->vegaanit);
	$tiedot->setLounas($tulos->lounas);
	$tiedot->setAamiainenBrunssi($tulos->aamiainenBrunssi);
	$tiedot->setAnniskeluoikeus($tulos->anniskeluoikeus);
	$tiedot->setBuffet($tulos->buffet);
	$tiedot->setK18($tulos->k18);
	$tiedot->setPukupakko($tulos->pukupakko);
	$tiedot->setVarauspakko($tulos->varauspakko);

	return $tiedot;
  }

  public function haeRavintolanTiedot($ravintola) {
	$sql = "SELECT ravintola_id, kasvissyojat, lapsiperheet, vegaanit, lounas, aamiainenBrunssi, anniskeluoikeus, buffet, k18, pukupakko, varauspakko, ravintola FROM sopivuustiedot WHERE ravintola_id = ? LIMIT 1";
	$kysely = getTietokantayhteys()->prepare($sql);
	$kysely->execute(array($ravintola->getId()));
	$tulos = $kysely->fetchObject();
	if ($tulos == null) {
		return null;
	} else {
		$tiedot = self::uudetTiedot($tulos);
		return $tiedot;
	} 
  }

  public function lisaaKantaan($id) {
	$sql = "INSERT INTO sopivuustiedot(lapsiperheet, kasvissyojat, vegaanit, lounas, aamiainenBrunssi, anniskeluoikeus, buffet, varauspakko, k18, pukupakko, ravintola, ravintola_id) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
	$kysely = getTietokantayhteys()->prepare($sql);

	$ok = $kysely->execute(array($this->getLapsiperheet(), $this->getKasvissyojat(), $this->getVegaanit(), $this->getLounas(), $this->getAamiainenBrunssi(), $this->getAnniskeluoikeus(), $this->getBuffet(), $this->getVarauspakko(), $this->getK18(), $this->getPukupakko(), $this->getRavintola(), $id));
	return $ok; 
  }

  public function paivita() {
	$sql = "UPDATE sopivuustiedot SET kasvissyojat = ?, lapsiperheet = ?, vegaanit = ?, lounas = ?, aamiainenBrunssi = ?, anniskeluoikeus = ?, buffet = ?, varauspakko = ?, k18 = ?, pukupakko = ? WHERE ravintola_id = ?";
	$kysely = getTietokantayhteys()->prepare($sql);
	$ok = $kysely->execute(array($this->getKasvissyojat(), $this->getLapsiperheet(), $this->getVegaanit(), $this->getLounas(), $this->getAamiainenBrunssi(), $this->getAnniskeluoikeus(), $this->getBuffet(), $this->getVarauspakko(), $this->getK18(), $this->getPukupakko(), $this->getRavintola_id()));
	return $ok;
  }

  public function poistaTiedot($id) {
	$sql = "DELETE FROM sopivuustiedot WHERE ravintola_id = ?";
	$kysely = getTietokantayhteys()->prepare($sql);
	$ok = $kysely->execute(array($id));
	return $ok;
  }

  /* Tähän gettereitä ja settereitä */

  public function getRavintola_id() {
        return $this->ravintola_id;

  }

  public function setRavintola_id($id) {
        $this->ravintola_id = $id;

  }

  public function getRavintola() {
        return $this->ravintola;

  }

  public function setRavintola($ravintola) {
        $this->ravintola = $ravintola;

  }

  public function getAamiainenBrunssi() {
        return $this->aamiainenBrunssi;

  }

  public function setAamiainenBrunssi($ab) {
	if($ab == 'true') {
            $this->aamiainenBrunssi = 'true';
	} else {
	    $this->aamiainenBrunssi = 'false';
	}
  }

  public function getAnniskeluoikeus() {
        return $this->anniskeluoikeus;

  }

  public function setAnniskeluoikeus($aoikeus) {
	if ($aoikeus == 'true') {
        	$this->anniskeluoikeus = 'true';
	} else {
		$this->anniskeluoikeus = 'false';
	}
  }

 public function getBuffet() {
        return $this->buffet;

  }

  public function setBuffet($buffet) {
	if ($buffet == 'true') {
             $this->buffet = 'true';
	} else {
	     $this->buffet = 'false';
	}
  }

  public function getK18() {
        return $this->k18;

  }

  public function setK18($k18) {
	if ($k18 == 'true') {
             $this->k18 = 'true';
	} else {
	     $this->k18 = 'false';
	}
  }

  public function getKasvissyojat() {
        return $this->kasvissyojat;

  }

  public function setKasvissyojat($kasvissyojat) {
	if ($kasvissyojat == 'true'){
              $this->kasvissyojat = 'true';
	} else {
	      $this->kasvissyojat = 'false';
	}
  }

  public function getLapsiperheet() {
        return $this->lapsiperheet;

  }

  public function setLapsiperheet($lapsiperheet) {
         if ($lapsiperheet == 'true') {
	      $this->lapsiperheet = 'true';
	 } else {
	      $this->lapsiperheet = 'false';
	 }
  }

  public function getLounas() {
        return $this->lounas;

  }

  public function setLounas($lounas) {
        if ($lounas == 'true'){
	     $this->lounas = 'true';
	} else {
	     $this->lounas = 'false';
	}
  }

  public function getPukupakko() {
        return $this->pukupakko;

  }

  public function setPukupakko($pukupakko) {
	if ($pukupakko == 'true') {
             $this->pukupakko = 'true';
	} else {
	     $this->pukupakko = 'false';
	}
  } 
 
  public function getVarauspakko() {
        return $this->varauspakko;

  }

  public function setVarauspakko($varauspakko) {
	if($varauspakko == 'true') {
            $this->varauspakko = 'true';
	} else {
	    $this->varauspakko = 'false';
	}
  }

  public function getVegaanit() {
        return $this->vegaanit;

  }

  public function setVegaanit($vegaanit) {
	if($vegaanit == 'true') {
            $this->vegaanit = 'true';
	} else { 
	    $this->vegaanit = 'false';
	}
  }
}
