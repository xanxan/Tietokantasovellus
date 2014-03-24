<?php
 require_once 'tietokantayhteys.php';
class Kayttaja {
  
  private $id;
  private $tunnus;
  private $salasana;

  public function __construct($id, $tunnus, $salasana) {
    $this->id = $id;
    $this->tunnus = $tunnus;
    $this->salasana = $salasana;
  }

  /* Tähän gettereitä ja settereitä */

  

    public static function etsiKaikkiKayttajat() {
  $sql = "SELECT id, tunnus, salasana FROM kayttajat";
  $kysely = getTietokantayhteys()->prepare($sql); $kysely->execute();
    
  $tulokset = array();
  foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
    $kayttaja = new Kayttaja();
    $kayttaja->setId($tulos->id);
    $kayttaja->setTunnus($tulos->tunnus);
    $kayttaja->setSalasana($tulos->salasana);

    //$array[] = $muuttuja; lisää muuttujan arrayn perään. 
    //Se vastaa melko suoraan ArrayList:in add-metodia.
    $tulokset[] = $kayttaja;
  }
  return $tulokset;
}
  public function getTunnus() {
	return $tunnus;

 } public function setTunnus($tunnus) {
	$this->tunnus = $tunnus;
}

public function setId($id) {
	$this->id = $id;
}
public function setSalasana($salasana) {
	$this->salasana =$salasana;
}
}
