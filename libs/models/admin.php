<?php
require_once 'libs/tietokantayhteys.php';

class Yllapitaja {


  private $id;
  private $tunnus;


  public function __construct($id, $tunnus) {
    $this->id = $id;
    $this->tunnus = $tunnus;
  }


  public static lisaaAdmin() {
    $sql = "INSERT INTO yllapitajat(id, tunnus) VALUES(?,?)";
    $kysely = getTietokantayhteys()->prepare($sql);

    $ok = $kysely->execute(array($this->getId(), $this->getTunnus()));
    if ($ok) {
      
    }
    return $ok;

    }

   public function poistaAdmin() {
	$sql = "DELETE FROM yllapitajat WHERE id = ?";
	$kysely = getTietokantayhteys()->prepare($sql);
	$ok = $kysely->execute(array($this->getId()));
	return $ok;

    }

    public function etsiAdminIdlla() {
   
	$sql = "SELECT id, tunnus FROM kayttajat WHERE id = ? LIMIT 1";
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

   public funtion setId($id) {
	$this->id = $id;

   }

  public function getId() {
	return $this->id;

  }


   public funtion setTunnus($tunnus) {
        $this->tunnus = $tunnus;

   }

  public function getTunnus() {
        return $this->tunnus;

  }


}
