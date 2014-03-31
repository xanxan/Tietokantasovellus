<?php
require_once 'libs/tietokantayhteys.php';

class Ravintola {

	private $id;
	private $nimi;
	private $tyyppi;
	private $osoite;
	private $aukioloajat;
	private $hintataso;
	private $kuvaus;
	private $kuva;
	private $suosikki;
	private $inhokki;
	private $arvosteluja;
	private $kommentteja;

	public function__construct($id, $nimi, $tyyppi, $osoite, $aukioloajat, $hintataso, $kuvaus, $kuva) {
		$this->id = $id;
		$this->nimi = $nimi;
		$this->tyyppi = $tyyppi;
		$this->osoite = $osoite;
		$this->aukioloajat = $aukioloajat;
		$this->hintataso = $hintataso;
		$this->kuvaus = $kuvaus;
		$this->kuva = $kuva;
		$this->suosikki = 0;
		$this->inhokki = 0;
		$this->arvosteluja = 0;
		$this->kommentteja = 0;

	}
	
	public function uusiRavintola($tulos) {
		$ravintola = new Ravintola();
		$ravintola->setId($tulos->id);
                $ravintola->setNimi($tulos->nimi);
                $ravintola->setTyyppi($tulos->id);
                $ravintola->setOsoite($tulos->osoite);
                $ravintola->setAukioloajat($tulos->aukioloajat);
                $ravintola->setHintataso($tulos->hintataso);
                $ravintola->setKuvaus($tulos->kuvaus);
                $ravintola->setKuva($tulos->kuva);
                $ravintola->setSuosikki($tulos->suosikki);
                $ravintola->setInhokki($tulos->inhokki;
                $ravintola->setArvosteluja($tulos->arvosteluja);
                $ravintola->setKommentteja($tulos->kommentteja);
		
		return $ravintola;
	}

	public static function etsiRavintola() {
		$sql = "SELECT id, nimi, tyyppi, osoite, aukioloajat, hintataso, kuvaus, k
uva, suosikki, inhokki, arvosteluja, kommentteja FROM ravintolat WHERE nimi = ?";
                $kysely = getTietokantayhteys()->prepare($sql); $kysely->execute();
		
		$tulos = $kysely->fetchObject();
		$ravintola = uusiRavintola($tulos);
		return $ravintola;
	}


	public static function etsiKaikkiRavintolat() {
		$sql = "SELECT id, nimi, tyyppi, osoite, aukioloajat, hintataso, kuvaus, kuva, suosikki, inhokki, arvosteluja, kommentteja FROM ravintolat";
		$kysely = getTietokantayhteys()->prepare($sql); $kysely->execute();

		$tulokset = array();
		foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
			$ravintola = uusiRavintola($tulos);
			$tulokset[] = $ravintola;

		} return $tulokset;
	}
		
	 /* Tähän gettereitä ja settereitä */

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	 public function getNimi() {
		return $this->nimi;
        }

        public function setNimi($nimi) {
		$this->nimi = $nimi;
        }
	 public function getTyyppi() {
		return $this->tyyppi;
        }

        public function setTyyppi($tyyppi) {
		$this->tyyppi = $tyyppi;
        }
	 public function getOsoite() {
		return $this->osoite;
        }

        public function setOsoite($osoite) {
		$this->osoite = $osoite;
        }
	 public function getAukioloajat() {
		return $this->aukioloajat;
        }

        public function setAukioloajat($aukioloajat) {
		$this->aukioloajat = $aukioloajat;
        }
	 public function getHintataso() {
		return $this->hintataso;
        }

        public function setHintataso($hintataso) {
		$this->hintataso = $hintataso;
        }
	 public function getKuvaus() {
		return $this->kuvaus;
        }

        public function setKuvaus($kuvaus) {
		$this->kuvaus = $kuvaus;
        }
	 public function getKuva() {
		return $this->kuva;
        }

        public function setKuva($kuva) {
		$this->kuva = $kuva;
        }
	 public function getSuodikki() {
		return $this->suosikki;
        }

        public function setSuosikki($suosikki) {
		$this->suosikki = $suosikki;
        }
	 public function getInhokki() {
		return $this->inhokki;
        }

        public function setInhokki($inhokki) {
		$this->inhokki = $inhokki;
        }
	 public function getArvosteluja() {
		return $this->arvosteluja;
        }

        public function setArvosteluja($arvosteluja) {
		$this->arvosteluja = $arvosteluja;
        }
	 public function getKommentteja() {
		return $this->kommentteja;
        }

        public function setKommentteja($kommentteja) {
		$this->kommentteja = $kommentteja;
        }


}
