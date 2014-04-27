<?php
require_once 'libs/tietokantayhteys.php';

class Arvostelu {

  private $arvostelija_id;
  private $arvostelijatunnus;
  private $arvostelupv;
  private $hintalaatu;
  private $juomatarjonta;
  private $palvelu;
  private $ravintola_id;
  private $ravintolanimi;
  private $ruoka;
  private $yleisarvio;

  private $virheet = array();

  public function __construct($id, $tunnus, $pv, $hintalaatu, $juomat, $palvelu, $ravintola, $nimi, $ruoka, $yleisarvio) {

	$this->arvostelija_id = $id;
	$this->arvostelijatunnus = $tunnus;
	$this->arvostelupv = $pv;
	$this->hintalaatu = $hintalaatu;
	$this->juomatarjonta = $juomat;
	$this->palvelu = $palvelu;
	$this->ravintola_id = $ravintola;
	$this->ravintolanimi = $nimi;
	$this->ruoka = $ruoka;
	$this->yleisarvio = $yleisarvio;
  }

  public function uusiArvostelu($tulos) {

	$arvostelu = new Arvostelu();
	$arvostelu->setArvostelija_id($tulos->arvostelija_id);
	$arvostelu->setRavintola_id($tulos->ravintola_id);
	$arvostelu->setArvostelijatunnus($tulos->arvostelijatunnus);
	$arvostelu->setArvostelupv($tulos->arvostelupv);
	$arvostelu->setHintalaatu($tulos->hintalaatu);
	$arvostelu->setJuomatarjonta($tulos->juomatarjonta);
	$arvostelu->setPalvelu($tulos->palvelu);
	$arvostelu->setRavintolanimi($tulos->ravintolanimi);
	$arvostelu->setRuoka($tulos->ruoka);
	$arvostelu->setYleisarvio($tulos->yleisarvio);
        return $arvostelu;

  }  

  public function etsiKayttajanArvostelut($arvostelija_id) {

	$sql = "SELECT arvostelija_tunnus, arvostelupv, hintaLaatu, juomatarjonta, palvelu, ravintolanimi, ruoka, yleisarvio FROM Arvostelut WHERE arvostelija_id = ?";
	$kysely = getTietokantayhteys()->prepare($sql);
	$kysely->execute(array($arvostelija_id));

	$tulokset = array();
	foreach($kysely->fetchAll(PDO::FETCH_OMJ) as $tulos) {
		$arvostelu = Self::uusiArvostelu($tulos);
		$tulokset[] = $arvostelu;
	}
	return $tulokset;
  }

  public function etsiRavintolanArvostelut($ravintola_id) {

        $sql = "SELECT arvostelijatunnus, arvostelupv, hintaLaatu, juomatarjonta, palvelu, ravintolanimi, ruoka, yleisarvio FROM Arvostelut WHERE ravintola_id = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($ravintola_id));
  
        $tulokset = array();
        foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
                $arvostelu = self::uusiArvostelu($tulos);
                $tulokset[] = $arvostelu;
        }
        return $tulokset;
  }
  public function onkoArvosteltu($ravintola, $kayttaja) {
	$sql = "SELECT arvostelijatunnus FROM Arvostelut WHERE ravintola_id = ? AND arvostelija_id = ? LIMIT 1";
	$kysely = getTietokantayhteys()->prepare($sql);
	$kysely->execute(array($ravintola, $kayttaja));
	$tulos = $kysely->fetchObject();

	if ($tulos == null) {
	   return null;
	} else {
		$ok = new Arvostelu();
		$ok->setArvostelijatunnus($tulos->arvostelijatunnus);
		return $ok;
	}
 }
  public static function lukumaara($id) {
  	$sql = "SELECT count(ravintola_id) FROM Arvostelut WHERE ravintola_id = ?";
  	$kysely = getTietokantayhteys()->prepare($sql);
  	$kysely->execute(array($id));
	return $kysely->fetchColumn();
  }

  public function onkoKelvollinen() {
	return empty($this->virheet);

   }	

  public function getVirheet() {
	return $this->virheet;

  }

  public function lisaaKantaan() {
	$sql = "INSERT INTO arvostelut(arvostelija_id, arvostelijatunnus, hintaLaatu, juomatarjonta, palvelu, ravintola_id, ravintolanimi, ruoka, yleisarvio, arvostelupv) VALUES(?,?,?,?,?,?,?,?,?,'2014-04-20')";
    $kysely = getTietokantayhteys()->prepare($sql);

    $ok = $kysely->execute(array($this->getArvostelija_id(), $this->getArvostelijatunnus(), $this->getHintalaatu(), $this->getJuomatarjonta(), $this->getPalvelu(), $this->getRavintola_id(), $this->getRavintolanimi(), $this->getRuoka(), $this->getYleisarvio()));
    if ($ok) {
    return $ok;

  }
 }    
  public function paivita() {
	$sql = "UPDATE arvostelut SET hintaLaatu = ?, juomatarjonta = ?, palvelu = ?, ruoka = ?, yleisarvio = ?  WHERE arvostelija_id = ? AND ravintola_id = ?";
	$kysely = getTietokantayhteys()->prepare($sql);
	$ok = $kysely->execute(array($this->getHintalaatu(), $this->getJuomatarjonta(), $this->getPalvelu(), $this->getRuoka(), $this->getYleisarvio(), $this->getArvostelija_id(), $this->getRavintola_id()));
	if ($ok) {
	  return $ok;
	}
  }

  public function poistaArvostelut($id) {
	$sql = "DELETE FROM arvostelut WHERE ravintola_id = ?";
	$kysely = getTietokantayhteys()->prepare($sql);
	$ok = $kysely->execute(array($id));
	return $ok;

  }

  /* Tähän gettereitä ja settereitä */

  public function getArvostelijatunnus() {
        return $this->arvostelijatunnus;

  }

  public function setArvostelijatunnus($tunnus) {
        $this->arvostelijatunnus = $tunnus;

  }

  public function getArvostelija_id() {
        return $this->arvostelija_id;

  }

  public function setArvostelija_id($id) {
        $this->arvostelija_id = $id;

  }

  public function getRavintola_id() {
        return $this->ravintola_id;

  }

  public function setRavintola_id($id) {
        $this->ravintola_id = $id;

  }

  public function getArvostelupv() {
        return $this->arvostelupv;

  }

  public function setArvostelupv($pv) {
        $this->arvostelupv = $pv;

  }

  public function getHintalaatu() {
        return $this->hintalaatu;

  }

  public function setHintalaatu($hintalaatu) {
        $this->hintalaatu = $hintalaatu;

  }

   public function getJuomatarjonta() {
        return $this->juomatarjonta;

  }

  public function setJuomatarjonta($juomat) {
        $this->juomatarjonta = $juomat;

  }
  
  public function getPalvelu() {
        return $this->palvelu;

  }

  public function setPalvelu($palvelu) {
        $this->palvelu = $palvelu;

  }

   public function getRavintolanimi() {
        return $this->ravintolanimi;

  }

  public function setRavintolanimi($nimi) {
        $this->ravintolanimi = $nimi;

  }

  public function getRuoka() {
        return $this->ruoka;

  }

  public function setRuoka($ruoka) {
        $this->ruoka = $ruoka;

  }

  public function getYleisarvio() {
        return $this->yleisarvio;

  }

  public function setYleisarvio($arvio) {
        $this->yleisarvio = $arvio;

  }
}
