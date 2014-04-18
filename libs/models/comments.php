<?php
require_once 'libs/tietokantayhteys.php';

class Kommentit {

  private $kayttaja_id;
  private $ravintola_id;
  private $kayttajatunnus;
  private $kommentti;
  private $ravintolannimi;

  public function __construct($kayttaja_id, $ravintola_id, $kayttaja, $ravintola, $kommentti) {
        $this->kayttaja_id = $kayttaja_id;
        $this->ravintola_id = $ravintola_id;
	$this->kayttajatunnus = $kayttaja;
	$this->ravintolannimi = $ravintola;
	$this->kommentti = $kommentti;
  }

  public function etsiRavintolanKommentit($ravintola) {
        $sql = "SELECT kayttajatunnus, kommentti FROM kommentit WHERE ravintola_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kayttaja));

        $tulokset = array();
        foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
                $lista = new Kommentit();
		$lista->setKayttajatunnus($tulos->kayttajatunnus);
		$lista->setKommentti($tulos->kommentti);
                $tulokset[] = $lista;
        }
        return $tulokset;
  }

  public function etsiKayttajanKommentit($kayttaja) {
        $sql = "SELECT ravintolannimi, kommentti FROM kommentit WHERE kayttaja_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kayttaja));

        $tulokset = array();
        foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
                $lista = new Kommentit();
		$lista->setRavintolannimi($tulos->ravintolannimi);
		$lista->setKommentti($tulos->kommentti);
                $tulokset[] = $lista;
        }
        return $tulokset;
  }

  public function ravintolallaKommentteja($ravintola) {
        $sql = "SELECT count(ravintola_id) FROM kommentit WHERE ravintola_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($ravintola));

        return $kysely->fetchColumn();

  }

  public function kayttajallaKommentteja($kayttaja) {
        $sql = "SELECT count(kayttaja_id) FROM kommentit WHERE kayttaja_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kayttaja));

        return $kysely->fetchColumn();

  }

  public function lisaaKantaan() {
        $sql = "INSERT INTO kommentit(kayttaja_id, ravintola_id, ravintolannimi, kayttajatunnus, kommentti) VALUES (?,?,?,?,?)";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array($this->getKayttaja_id(), $this->getRavintola_id(), $this->getRavintolannimi(), $this->getKayttajatunnus(), $this->getKommentti()));

        return $ok;
  }

  public function paivita() {
	$sql = "UPDATE kommentit SET kommentti = ? WHERE kayttaja_id = ? AND ravintola_id = ?";
	$kysely = getTietokantayhteys()->prepare($sql);
	$ok = $kysely->execute(array($this->getKommentti(), $this->getKayttaja_id(), $this->getRavintola_id()));

	return $ok;

  }

  public function poistaKommentti() {
        $sql = "DELETE FROM kommentit WHERE kayttaja_id = ? AND ravintola_id = ? AND kommentti = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array($this->getKayttaja_id(), $this->getRavintola_id(), $this->getKommentti()));

        return $ok;
  }

   /* Tähän gettereitä ja settereitä */

  public function getKayttajatunnus() {
        return $this->kayttajatunnus;

  }

  public function setKayttajatunnus($tunnus) {
        $this->tunnus = $tunnus;

  }

  public function getKayttaja_id() {
        return $this->kayttaja_id;

  }

  public function setKayttaja_id($id) {
        $this->kayttaja_id = $id;

  }

  public function getRavintola_id() {
        return $this->ravintola_id;
 
  }

  public function setRavintola_id($id) {
        $this->ravintola_id = $id;

  }

  public function getRavintolannimi() {
        return $this->ravintolannimi;

  }

  public function setRavintolannimi($nimi) {
        $this->ravintolannimi = $nimi;

  }

  public function getKommentti() {
        return $this->kommentti;

  }

  public function setKommentti($kommentti) {
        $this->kommentti = $kommentti;

  }
 }

