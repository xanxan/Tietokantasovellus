<?php
require_once 'libs/tietokantayhteys.php';
require_once 'user.php';

class Yllapitaja {


  private $id;
  private $tunnus;


  public function __construct($id, $tunnus) {
    $this->id = $id;
    $this->tunnus = $tunnus;
  }


  public function lisaaAdmin() {
    $sql = "INSERT INTO yllapitajat(kayttaja_id, kayttajatunnus) VALUES(?,?)";
    $kysely = getTietokantayhteys()->prepare($sql);

    $ok = $kysely->execute(array($this->getId(), $this->getTunnus()));
    if ($ok) {
      
    }
    return $ok;

    }

   public function poistaAdmin() {
	$sql = "DELETE FROM yllapitajat WHERE kayttaja_id = ?";
	$kysely = getTietokantayhteys()->prepare($sql);
	$ok = $kysely->execute(array($this->getId()));
	return $ok;

    }

    public function etsiAdminIdlla($id) {
   
	$sql = "SELECT kayttaja_id, kayttajatunnus FROM yllapitajat WHERE kayttaja_id = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
	$kysely->execute(array($id));
        $tulos = $kysely->fetchObject();
	if ($tulos == null) {
	       return null;
	} else {
               $user = Kayttaja::uusiKayttaja($tulos);
               return $user;
	}
    }

   public function setId($id) {
	$this->id = $id;

   }

  public function getId() {
	return $this->id;

  }


   public function setTunnus($tunnus) {
        $this->tunnus = $tunnus;

   }

  public function getTunnus() {
        return $this->tunnus;

  }


}
