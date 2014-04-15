<?php
  /** Tiedosto, jonka tarkoituksena on näyttää käyttäjän tiedot.
    * Olettaa, että muuttuja $kayttaja on asetettu. */ 
  $kayttaja = $data->kayttaja;

?>
<div class="container">
<div class="kayttaja">
   
    <h1>Käyttäjän <?php echo $kayttaja->getTunnus(); ?>  profiili</h1>
   
    <ul class="nav nav-tabs">
    <li class="active"><a href="#">Henkilötiedot</a></li>
    <li ><a href="#">Viimeisimmät kommentit</a></li>
    <li ><a href="#">Suosikkilista</a></li>
    <li ><a href="#">Inhokkilista</a></li>
  </ul>
  <div class="container">
      <h1>Henkilötiedot</h1>
      
    <ul>
        <h2 class="text-center">Lisätietoja</h2>
        
        <p class="text-center"><?php echo $kayttaja->getKuvaus(); ?></p>
      <div id="teamcontent" class="clearfix">
        <img src="<?php echo $kayttaja->getKuva(); ?>" alt="kuva" class="img-circle">
	<h4>Liittynyt</h4>
	<div class="value"><?php echo $kayttaja->getLiittymispaiva(); ?></div>
    </div>
     <a type="button" href="update.php?id=<?php echo $kayttaja->getId() ?>" class="btn btn-xs btn-warning">Muokkaa tietoja</a>   
    </ul>
  </div>
	<h1><?php  echo $data->virhe; ?></h1>
</div>
</div>
