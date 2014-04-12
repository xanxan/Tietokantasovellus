<?php
require_once 'libs/tietokantayhteys.php';

class Kayttaja {

  private $id;
  private $tunnus;
  private $salasana;
  private $kuvaus;
  private $kuva;
  private $liittymispaiva;
  private $arvosteluja;
  private $suosikkeja;
  private $inhokkeja;
  private $kommentteja;


  public function __construct($id, $tunnus, $salasana, $kuvaus, $kuva, $liittymispaiva) {
    $this->id = $id;
    $this->tunnus = $tunnus;
    $this->salasana = $salasana;
    $this->kuvaus = $kuvaus;
    $this->kuva = $kuva;
    $this->liittymispaiva = $liittymispaiva;
    $this->arvosteluja = 0;
    $this->suosikkeja = 0;
    $this->inhokkeja = 0;
    $this->kommentteja = 0;
  }
    public function uusiKayttaja($tulos) {
       	   $kayttaja = new Kayttaja();
           $kayttaja->setId($tulos->id);
           $kayttaja->setTunnus($tulos->tunnus);
           $kayttaja->setSalasana($tulos->salasana);
           $kayttaja->setKuvaus($tulos->kuvaus);
           $kayttaja->setKuva($tulos->kuva);
           $kayttaja->setLiittymispaiva($tulos->liittymispaiva);
           $kayttaja->setArvosteluja($tulos->arvosteluja);
           $kayttaja->setKommentteja($tulos->kommentteja);
           $kayttaja->setSuosikkeja($tulos->suosikkeja);
           $kayttaja->setInhokkeja($tulos->inhokkeja);

           return $kayttaja;

    }
    public static function etsiHakusanalla($hakusana) {

    }

     public static function etsiKayttaja($kayttaja) {
         $sql = "SELECT tunnus FROM kayttajat WHERE tunnus = ? LIMIT 1";
	 $kysely = getTietokantayhteys()->prepare($sql);
         $kysely->execute(array($kayttaja->getTunnus()));

         $tulos = $kysely->fetchObject();
         if ($tulos == null) {
           return null;
         } else {
           return true;
         }
    }


     public static function etsiKayttajaTunnuksilla($kayttaja, $salasana) {
   	 $sql = "SELECT id, tunnus, salasana FROM kayttajat WHERE tunnus = ? AND salasana =  ? LIMIT 1";
   	 $kysely = getTietokantayhteys()->prepare($sql);
   	 $kysely->execute(array($kayttaja, $salasana));

   	 $tulos = $kysely->fetchObject();
   	 if ($tulos == null) {
   	   return null;
   	 } else {
   	   $kayttaja = new Kayttaja();
           $kayttaja->setId($tulos->id);
           $kayttaja->setTunnus($tulos->tunnus);
           $kayttaja->setSalasana($tulos->salasana);

   	   return $kayttaja;
   	 }
    }
    public function lisaaKantaan() {
	    $sql = "INSERT INTO kayttajat(arvosteluja, inhokkeja, kommentteja, kuva, kuvaus, salasana, liittymispaiva, suosikkeja, tunnus) VALUES(0,0,0,?,?,?,'2014-04-10',0,?) RETURNING id";
    $kysely = getTietokantayhteys()->prepare($sql);

    $ok = $kysely->execute(array($this->getKuva(), $this->getKuvaus(), $this->getSalasana(), $this->getTunnus()));
    if ($ok) {
//      Haetaan RETURNING-määreen palauttama id.
  //    HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
      $kayttaja->id = $kysely->fetchColumn();
    }
    return $ok;

    }

    public static function etsiKayttajaIdlla() {
   
	   $sql = "SELECT id, tunnus, salasana, kuvaus, kuva, liittymispaiva, arvosteluja, kommentteja, suosikkeja, inhokkeja FROM kayttajat WHERE id = ? LIMIT 1";
           $kysely = getTietokantayhteys()->prepare($sql);
	   $kysely->execute(array($id));
           $tulos = $kysely->fetchObject();
	   if ($tulos == null) {
		return null;
	   } else {
               $user = uusiKayttaja($tulos);
               return $user;
	  }
    }

    public static function etsiKaikkiKayttajat() {
 	 $sql = "SELECT id, tunnus, salasana, kuvaus, kuva, liittymispaiva, arvosteluja, kommentteja, suosikkeja, inhokkeja FROM kayttajat";
 	 $kysely = getTietokantayhteys()->prepare($sql); $kysely->execute();

 	 $tulokset = array();
 	 foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
 	   $kayttaja = uusiKayttaja($tulos);

  	  //$array[] = $muuttuja; lisää muuttujan arrayn perään. 
  	  //Se vastaa melko suoraan ArrayList:in add-metodia.
 	   $tulokset[] = $kayttaja;
 	 }
 	 return $tulokset;
    }

 /* Tähän gettereitä ja settereitä */

  public function getTunnus() {
        return $this->tunnus;

  }

  public function setTunnus($tunnus) {
        $this->tunnus = $tunnus;
  }

  public function getId() {
	return $this->id;
  }

  public function setId($id) {
        $this->id = $id;
  }

  public function getSalasana() {
	return $this->salasana;
  }
  public function setSalasana($salasana) {
        $this->salasana = $salasana;
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

  public function getLiittymispaiva() {
        return $this->liittymispaiva;
  }

  public function setLiittymispaiva($liittymispaiva) {
        $this->liittymispaiva = $liittymispaiva;
  }

  public function getArvosteluja() {
        return $this->arvosteluja;
  }

  public function setArvosteluja($arvosteluja) {
        $this->arvosteluja = $arvosteluja;
  }

  public function getSuosikkeja() {
        return $this->suosikkeja;
  }

  public function setSuosikkeja($suosikkeja) {
        $this->suosikkeja = $suosikkeja;
  }

  public function getInhokkeja() {
        return $this->inhokkeja;
  }

  public function setInhokkeja($inhokkeja) {
        $this->inhokkeja = $inhokkeja;
  }

  public function getKommentteja() {
        return $this->kommentteja;
  }

  public function setKommentteja($kommentteja) {
        $this->kommentteja = $kommentteja;
  }
}
