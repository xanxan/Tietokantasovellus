<?php
require_once 'libs/tietokantayhteys.php';

class Inhokit {

  private $kayttaja_id;
  private $ravintola_id;

  public function __construct($kayttaja, $ravintola) {
	$this->kayttaja_id = $kayttaja;
	$this->ravintola_id = $ravintola;
  }

  public function etsiInhokit($kayttaja) {
	$sql = "SELECT ravintola_id FROM inhokkilista WHERE kayttaja_id = ?";
 	$kysely = getTietokantayhteys()->prepare($sql);
	$kysely->execute(array($kayttaja));

	$tulokset = array();
	foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
		$lista = new Inhokit($tulos->kayttaja_id, $tulos->ravintola_id);
		$tulokset[] = $lista;
	} 
	return $tulokset;
  }

  public function ravintolaInhokeissa($ravintola) {
	$sql = "SELECT count(kayttaja_id) FROM inhokkilista WHERE ravintola_id = ?";
	$kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($ravintola));

        return $kysely->fetchColumn();

  }

  public function lisaaKantaan() {
	$sql = "INSERT INTO inhokkilista(kayttaja_id, ravintola_id) VALUES (?,?)";
	$kysely = getTietokantayhteys()->prepare($sql);
	$ok = $kysely->execute(array($this->getKayttaja_id(), $this->getRavintola_id()));
	
	return $ok;
  }

  public function poistaRavintolaListalta() {
	$sql = "DELETE FROM inhokkilista WHERE kayttaja_id = ? AND ravintola_id = ?";
	$kysely = getTietokantayhteys()->prepare($sql);
	$ok = $kysely->execute(array($this->getKayttaja_id(), $this->getRavintola_id()));

	return $ok;
  }

    public function getRavintola_id() {
        return $this->ravintola_id;
  }

  public function setRavintola_id($id) {
        $this->ravintola_id = $id;
  }

  public function getKayttaja_id() {
        return $this->kayttaja_id;
  }

  public function setKayttaja_id($id) {
        $this->kayttaja_id = $id;
  }
 }
