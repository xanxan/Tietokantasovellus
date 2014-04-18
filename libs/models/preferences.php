<?php
require_once 'libs/tietokantayhteys.php';

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
        $tiedot->setRavintola_id(tulos->ravintola-id);
	$tiedot->setRavintola(tulos->ravintola);
	$tiedot->setKasvissyojat(tulos->kasvissyojat);
	$tiedot->setLapsiperheet(tulos->lapsiperheet);
	$tiedot->setVegaanit(tulos->vegaanit);
	$tiedot->setLounas(tulos->lounas);
	$tiedot->setAamiainenBrunssi(tulos->aamiainenBrunssi);
	$tiedot->anniskeluoikeus(tulos->anniskeluoikeus);
	$tiedot->buffet(tulos->buffet);
	$tiedot->k18(tulos->k18);
	$tiedot->pukupakko(tulos->pukupakko);
	$tiedot->varauspakko(tulos->varauspakko);

	return $tiedot;
  }

  public function haeRavintolanTiedot($ravintola) {
	$sql = "SELECT kasvissyojat, lapsiperheet, vegaanit, lounas, aamiainenBrunssi, anniskeluoikeus, buffet, k18, pukupakko, varauspakko, ravintola FROM sopivuustiedot WHERE ravintola_id = ? LIMIT 1";
	$kysely = getTietokantayhteys()->prepare($sql);
	$tulos = $kysely->fetchObject();
	if ($tulos == null) {
		return null;
	} else {
		$tiedot = Self::uudetTiedot($tulos);
		return $tiedot;
	} 
  }

  public function lisaaKantaan() {
	$sql = "INSERT INTO sopivuustiedot(kasvissyojat, lapsiperheet, vegaanit, lounas, aamiainenBrunssi, anniskeluoikeus, buffet, varauspakko, k18, pukupakko, ravintola, ravintola_id) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?) WHERE ravintola_id = ?";
	$kysely = getTietokantayhteys()->prepare($sql);

	$ok = $kysely->execute(array($this->getRavintola_id()));
	return $ok; 
  }

  public function paivita() {
	$sql = "UPDATE sopivuustiedot SET kasvissyojat = ?, lapsiperheet = ?, vegaanit = ?, lounas = ?, aamiainenBrunssi = ?, anniskeluoikeus = ?, buffet = ?, varauspakko = ?, k18 = ?, pukupakko = ? WHERE ravintola_id = ?";
	$kysely = getTietokantayhteys()->prepare($sql);
	$ok = $kysely->execute(array($this->getKasvissyojat(), $this->getLapsiperheet(), $this->getVegaanit(), $this->getLounas(), $this->getAamiainenBrunssi(), $this->getAnniskeluoikeus(), $this->getBuffet(), $this->getVarauspakko(), $this->getK18(), $this->getPukupakko(), $this->getRavintola_id()));
	return $ok;
  }

  public function poistaTiedot() {
	$sql = "DELETE FROM sopivuustiedot WHERE ravintola_id = ?";
	$kysely = getTietokantayhteys()->prepare($sql);
	$ok = $kysely->execute(array($this->getRavintola_id)));
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
        $this->AamiainenBrunssi = $ab;

  }

  public function getAnniskeluoikeus() {
        return $this->anniskeluoikeus;

  }

  public function setAnniskeluoikeus($aoikeus) {
        $this->anniskeluoikeus = $aoikeus;

  }

 public function getBuffet() {
        return $this->buffet;

  }

  public function setBuffet($buffet) {
        $this->buffet = $buffet;

  }

  public function getK18() {
        return $this->k18;

  }

  public function setK18($k18) {
        $this->k18 = $k18;

  }

  public function getKasvissyojat() {
        return $this->kasvissyojat;

  }

  public function setKasvissyojat($kasvissyojat) {
        $this->kasvissyojat = $kasvissyojat;

  }

  public function getLapsiperheet() {
        return $this->lapsiperheet;

  }

  public function setLapsiperheet($lapsiperheet) {
        $this->lapsiperheet = $lapsiperheet;

  }

  public function getLounas() {
        return $this->lounas;

  }

  public function getLounas($lounas) {
        $this->lounas = $lounas;

  }

  public function getPukupakko() {
        return $this->pukupakko;

  }

  public function setPukupakko($pukupakko) {
        $this->pukupakko = $pukupakko;

  } 
 
  public function getVarauspakko() {
        return $this->varauspakko;

  }

  public function setVarauspakko($varauspakko) {
        $this->varauspakko = $varauspakko;

  }

  public function getVegaanit() {
        return $this->vegaanit;

  }

  public function setVegaanit($vegaanit) {
        $this->vegaanit = $vegaanit;

  }
}
