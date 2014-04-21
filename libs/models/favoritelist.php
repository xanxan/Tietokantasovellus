<?php
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/restaurant.php';
class Suosikit {

  private $kayttaja_id;
  private $ravintola_id;

  public function __construct($kayttaja, $ravintola) {
        $this->kayttaja_id = $kayttaja;
        $this->ravintola_id = $ravintola;
  }
  public function onkoSuosikeissa($kayttaja, $ravintola) {
	$sql = "SELECT kayttaja_id, ravintola_id From suosikkilista WHERE kayttaja_id = ? AND ravintola_id = ? LIMIT 1";
 	$kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kayttaja, $ravintola));
	$tulos = $kysely->fetchObject();
	if ($tulos == null) {
		return null;
	} else {
		return $tulos;
  }
 }
  public function etsiSuosikit($kayttaja) {
        $sql = "SELECT id, nimi, tyyppi, osoite, aukioloajat, hintataso, kuvaus, kuva, suosikki, inhokki, arvosteluja, kommentteja FROM ravintolat, suosikkilista WHERE kayttaja_id = ? AND id = ravintola_id";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kayttaja->getId()));

        $tulokset = array();
        foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
                
		$lista = Ravintola::uusiRavintola($tulos);
                $tulokset[] = $lista;
        }
        return $tulokset;
  }

 public  function ravintolaSuosikeissa($ravintola) {
        $sql = "SELECT count(kayttaja_id) FROM suosikkilista WHERE ravintola_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($ravintola));

        return $kysely->fetchColumn();

  }

  public function lisaaKantaan($ravintola, $kayttaja) {
        $sql = "INSERT INTO suosikkilista(kayttaja_id, ravintola_id) VALUES (?,?)";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array($kayttaja, $ravintola));

        return $ok;
  }

  public function poistaRavintolaListalta($ravintola, $kayttaja) {
        $sql = "DELETE FROM suosikkilista WHERE kayttaja_id = ? AND ravintola_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $ok = $kysely->execute(array($kayttaja, $ravintola));

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

