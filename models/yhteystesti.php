<?php
$yhteys = new PDO("pgsql:");
$yhteys->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql = "select 1+1 as two";
$kysely = $yhteys->prepare($sql);


if ($kysely->execute()) {
  $kakkonen = $kysely->fetchColumn();
  var_dump($kakkonen);
}
