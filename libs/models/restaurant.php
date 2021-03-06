<?php
require_once 'libs/tietokantayhteys.php';

class Ravintola {

	private $virheet = array();
	private $arvio;
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

	public function __construct($id, $nimi, $tyyppi, $osoite, $aukioloajat, $hintataso, $kuvaus, $kuva, $arvio) {
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
		$this->arvio = $arvio;
	}
	
	public function uusiRavintola($tulos) {
		$ravintola = new Ravintola();
		$ravintola->setId($tulos->id);
                $ravintola->setNimi($tulos->nimi);
                $ravintola->setTyyppi($tulos->tyyppi);
                $ravintola->setOsoite($tulos->osoite);
                $ravintola->setAukioloajat($tulos->aukioloajat);
                $ravintola->setHintataso($tulos->hintataso);
                $ravintola->setKuvaus($tulos->kuvaus);
                $ravintola->setKuva($tulos->kuva);
                $ravintola->setSuosikki($tulos->suosikki);
                $ravintola->setInhokki($tulos->inhokki);
                $ravintola->setArvosteluja($tulos->arvosteluja);
                $ravintola->setKommentteja($tulos->kommentteja);
		
		return $ravintola;
	}

	public static function etsiRavintolaIdlla($id) {
		$sql = "SELECT id, nimi, tyyppi, osoite, aukioloajat, hintataso, kuvaus, kuva, suosikki, inhokki, arvosteluja, kommentteja FROM ravintolat WHERE id = ?";
                $kysely = getTietokantayhteys()->prepare($sql); $kysely->execute(array($id));
		
		$tulos = $kysely->fetchObject();
		$ravintola = new Ravintola();
                $ravintola->setId($tulos->id);
                $ravintola->setNimi($tulos->nimi);
                $ravintola->setTyyppi($tulos->tyyppi);
                $ravintola->setOsoite($tulos->osoite);
                $ravintola->setAukioloajat($tulos->aukioloajat);
                $ravintola->setHintataso($tulos->hintataso);
                $ravintola->setKuvaus($tulos->kuvaus);
                $ravintola->setKuva($tulos->kuva);
                $ravintola->setSuosikki($tulos->suosikki);
                $ravintola->setInhokki($tulos->inhokki);
                $ravintola->setArvosteluja($tulos->arvosteluja);
                $ravintola->setKommentteja($tulos->kommentteja);
		return $ravintola;
	}


	public static function etsiKaikkiRavintolat() {
		$sql = "SELECT id, nimi, tyyppi, osoite, aukioloajat, hintataso, kuvaus, kuva, suosikki, inhokki, arvosteluja, kommentteja FROM ravintolat";
		$kysely = getTietokantayhteys()->prepare($sql); $kysely->execute();

		$tulokset = array();
		foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
		$ravintola = new Ravintola();
                $ravintola->setId($tulos->id);
                $ravintola->setNimi($tulos->nimi);
                $ravintola->setTyyppi($tulos->tyyppi);
                $ravintola->setOsoite($tulos->osoite);
                $ravintola->setAukioloajat($tulos->aukioloajat);
                $ravintola->setHintataso($tulos->hintataso);
                $ravintola->setKuvaus($tulos->kuvaus);
                $ravintola->setKuva($tulos->kuva);
                $ravintola->setSuosikki($tulos->suosikki);
                $ravintola->setInhokki($tulos->inhokki);
                $ravintola->setArvosteluja($tulos->arvosteluja);
                $ravintola->setKommentteja($tulos->kommentteja);

                $arvio = $ravintola->arvio();
		$ravintola->setArvio($arvio);
		$tulokset[] = $ravintola;

		} return $tulokset;
	}
	
	public function arvio() {
		$sql = "SELECT yleisarvio FROM Arvostelut WHERE ravintola_id = ?";
		$kysely = getTietokantayhteys()->prepare($sql);
		$kysely->execute(array($this->getId()));
		$arvio = 0;
		$lkm = 0;
		foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
			$arvio = $arvio + $tulos->yleisarvio;
			$lkm++;

		}

		return $arvio / $lkm;
	}

	public function etsiRavintolat($hintataso, $arvio, $tyyppi, $jarjestys) {
		$sql = "SELECT id, nimi, tyyppi, osoite, aukioloajat, hintataso, kuvaus, kuva, suosikki, inhokki, arvosteluja, kommentteja, yleisarvio FROM ravintolat, arvostelut WHERE ravintolat.id=arvostelut.arvostelija_id AND hintataso = ? AND tyyppi = ? AND yleisarvio = ? ORDER BY ?";


	$kysely = getTietokantayhteys()->prepare($sql); 
	$kysely->execute(array($hintataso, $arvio, $tyyppi, $jarjestys));
	  $tulokset = array();
                foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
                $ravintola = new Ravintola();
                $ravintola->setId($tulos->id);
                $ravintola->setNimi($tulos->nimi);
                $ravintola->setTyyppi($tulos->tyyppi);
                $ravintola->setOsoite($tulos->osoite);
                $ravintola->setAukioloajat($tulos->aukioloajat);
                $ravintola->setHintataso($tulos->hintataso);
                $ravintola->setKuvaus($tulos->kuvaus);
                $ravintola->setKuva($tulos->kuva);
                $ravintola->setSuosikki($tulos->suosikki);
                $ravintola->setInhokki($tulos->inhokki);
                $ravintola->setArvosteluja($tulos->arvosteluja);
                $ravintola->setKommentteja($tulos->kommentteja);


                $tulokset[] = $ravintola;

                } return $tulokset;
	}

	 public function lisaaKantaan() {
	    $sql = "INSERT INTO ravintolat(aukioloajat, arvosteluja, hintataso, inhokki, kommentteja, kuva, kuvaus, nimi, osoite, suosikki, tyyppi) VALUES(?,0,?,0,0,?,?,?,?,0,?) RETURNING id";
	    $kysely = getTietokantayhteys()->prepare($sql);

	    $ok = $kysely->execute(array($this->getAukioloajat(),  $this->getHintataso(), $this->getKuva(), $this->getKuvaus(), $this->getNimi(), $this->getOsoite(), $this->getTyyppi()));
 	   if ($ok) {
 	     //Haetaan RETURNING-määreen palauttama id.
 	     //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
 	     $this->id = $kysely->fetchColumn();
 	   }
 	   return $this->id;
 	 }

	 public function paivita() {
		$sql = "UPDATE ravintolat SET aukioloajat = ?, hintataso = ?, osoite = ?, tyyppi = ?, kuvaus = ?, kuva = ? WHERE id = ?";
		$kysely = getTietokantayhteys()->prepare($sql);
		$ok = $kysely->execute(array($this->getAukioloajat(), $this->getHintataso(), $this->getOsoite(), $this->getTyyppi(), $this->getKuvaus(), $this->getKuva(), $this->getId()));

		return $ok;
	    }

	public function muokkaaSuosikkia() {
      		$sql = "UPDATE ravintolat SET suosikki = ? WHERE id = ?";
                $kysely = getTietokantayhteys()->prepare($sql);
                $ok = $kysely->execute(array($this->getSuosikki(), $this->getId()));

                return $ok;
            }

	public function muokkaaInhokkia() {
                $sql = "UPDATE ravintolat SET inhokki = ? WHERE id = ?";
                $kysely = getTietokantayhteys()->prepare($sql);   
                $ok = $kysely->execute(array($this->getInhokki(), $this->getId()));

                return $ok;
            }
	public function muokkaaKommentteja() {
		$sql = "UPDATE ravintolat SET kommentteja = ? WHERE id = ?";
		$kysely = getTietokantayhteys()->prepare($sql);
		$ok = $kysely->execute(array($this->getKommentteja(), $this->getId()));

		return $ok;
	}

	public function muokkaaArvosteluja() {
		$sql = "UPDATE ravintolat SET arvosteluja = ? WHERE id = ?";
		$kysely = getTietokantayhteys()->prepare($sql);
		$ok = $kysely->execute(array($this->getArvosteluja(), $this->getId()));

		return $ok;

	}

        public function poistaRavintola() {
		$sql = "DELETE FROM ravintolat WHERE id = ?";
		$kysely = getTietokantayhteys()->prepare($sql);
		$ok = $kysely->execute(array($this->getId()));
		return $ok;

	    }


	public function onkoKelvollinen() {
		return empty($this->virheet);

	}
	
	public function getVirheet() {
		return $this->virheet;

	}

	public static function getRavintolatSivulla($hintataso, $tyyppi, $j, $s, $m) {
	// seuraavassa $tyyppi ja $hintataso ovat muuttujia, joiden arvoa ei ulkopuolinen pysty muokkaamaan (valittu näkymässä selectillä ja kontrollerissa parametrien sisältö on tarkistettu). Kysymysmerkkiä käyttäessä listan suodatuskyselyistä tulisi satoja riviä copypastea (mitä se on jo valmiiksikin) sillä tyyppiä ja hintatasoa ei ole välttämättä määritelty, jolloin listan pitää näyttää kaikki tyypit ja hintatasot jokaisessa järjestysvaihtoehdossa. En myöskään keksinyt tai löytänyt muuta eheää ja vaihtoehtoista tapaa tätä toteuttaa, joten suodatusparametrit on pistetty suoraan kyselyyn. Tämä valitettavuus korjataan heti jos ja kun eheä vaihtoehtoinen toteututstapa löytyy.
			
		$sivu = $s;
		$montako = $m;
		if ($j == 1) {
		$sql = "SELECT * FROM ravintolat WHERE tyyppi $tyyppi AND hintataso $hintataso ORDER BY nimi LIMIT ? OFFSET ?";
		} else if ($j == 2) {
		$sql = "SELECT * FROM ravintolat WHERE tyyppi $tyyppi AND hintataso $hintataso ORDER BY hintataso LIMIT ? OFFSET ?";
		} else if ($j == 3) {
                $sql = "SELECT * FROM ravintolat WHERE tyyppi $tyyppi AND hintataso $hintataso ORDER BY hintataso desc LIMIT ? OFFSET ?";
                } else if ($j == 4) {
		$sql = "SELECT arvio, id, nimi, tyyppi, osoite, aukioloajat, hintataso, kuvaus, kuva, suosikki, inhokki, arvosteluja, kommentteja FROM ravintolat, (select ravintola_id, ravintolanimi, avg(yleisarvio) as arvio FROM arvostelut GROUP BY ravintola_id, ravintolanimi) A WHERE id = ravintola_id AND tyyppi $tyyppi AND hintataso $hintataso GROUP BY id, nimi, arvio, tyyppi, osoite, aukioloajat, hintataso, kuvaus, kuva, suosikki, inhokki, arvosteluja, kommentteja , tyyppi, osoite, aukioloajat, hintataso, kuvaus, kuva, suosikki, inhokki, arvosteluja, kommentteja ORDER BY arvio desc LIMIT ? OFFSET ?";
		} else if ($j == 5) {
                $sql = "SELECT arvio, id, nimi, tyyppi, osoite, aukioloajat, hintataso, kuvaus, kuva, suosikki, inhokki, arvosteluja, kommentteja FROM ravintolat, (select ravintola_id, ravintolanimi, avg(yleisarvio) as arvio FROM arvostelut GROUP BY ravintola_id, ravintolanimi) A WHERE id = ravintola_id AND tyyppi $tyyppi AND hintataso $hintataso GROUP BY id, nimi, arvio, tyyppi, osoite, aukioloajat, hintataso, kuvaus, kuva, suosikki, inhokki, arvosteluja, kommentteja , tyyppi, osoite, aukioloajat, hintataso, kuvaus, kuva, suosikki, inhokki, arvosteluja, kommentteja ORDER BY arvio LIMIT ? OFFSET ?";
                } else if ($j == 6) {
		$sql = "SELECT * FROM ravintolat WHERE tyyppi $tyyppi AND hintataso $hintataso ORDER BY suosikki desc LIMIT ? OFFSET ?";
		}
		$kysely = getTietokantayhteys()->prepare($sql);
		$kysely->execute(array($montako, ($sivu-1)*$montako));
		
		$tulokset = array();
                foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
                         $ravintola = new Ravintola();
                	$ravintola->setId($tulos->id);
                	$ravintola->setNimi($tulos->nimi);
                	$ravintola->setTyyppi($tulos->tyyppi);
                	$ravintola->setOsoite($tulos->osoite);
                	$ravintola->setAukioloajat($tulos->aukioloajat);
                	$ravintola->setHintataso($tulos->hintataso);
                	$ravintola->setKuvaus($tulos->kuvaus);
                	$ravintola->setKuva($tulos->kuva);
                	$ravintola->setSuosikki($tulos->suosikki);
                	$ravintola->setInhokki($tulos->inhokki);
                	$ravintola->setArvosteluja($tulos->arvosteluja);
                	$ravintola->setKommentteja($tulos->kommentteja);

               		$arvio = $ravintola->arvio();
                	$ravintola->setArvio($arvio); 
                        $tulokset[] = $ravintola;

                } return $tulokset;

	}

	public static function lukumaara() {
  	  $sql = "SELECT count(*) FROM ravintolat";
  	  $kysely = getTietokantayhteys()->prepare($sql);
  	  $kysely->execute();
	  return $kysely->fetchColumn();
	}
		
	 /* Tähän gettereitä ja settereitä */

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;

		if (trim($this->id) == '') {
      			$this->virheet['id'] = "ID ei saa olla tyhjä.";
    		 } else { 
      			unset($this->virheet['id']);
   		 }
	        if (!is_numeric($id)) {
           	   $this->virheet['id'] = "Ravintolan id:n tulee olla numero.";
          	} else if ($id <= 0) {
            	   $this->virheet['id'] = "Ravintolalla täytyy olla positiivinen id.";
          	} else {
            	  unset($this->virheet['id']);
         	 }
		if (!preg_match('/^\d+$/', $id)) {
 		   $this->virheet['id'] ="Ravintolan id:n tulee olla kokonaisluku.";
		}
	}

	 public function getNimi() {
		return $this->nimi;
        }

        public function setNimi($nimi) {
		$this->nimi = $nimi;

		if (trim($this->nimi) == '') {
     		   $this->virheet['nimi'] = "Nimi ei saa olla tyhjä.";
   		 } else { 
      		   unset($this->virheet['nimi']);
    		 }
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
	
	public function setArvio($arvio) {
		$this->arvio = $arvio;
	}
	public function getArvio() {
		return $this->arvio;
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
	 public function getSuosikki() {
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
