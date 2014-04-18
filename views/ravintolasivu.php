<?php
 
 require_once 'libs/utilities.php';

  /** Tiedosto, jonka tarkoituksena on näyttää ravintolan tiedot.
* Olettaa, että muuttuja $ravintola on asetettu. */
  $ravintola = $data->ravintola;

?>
<div class="container">
<div class="ravintola">
<h1><?php echo $ravintola->getNimi(); ?></h1>
<ul class="nav nav-tabs">
<li class="active"><a href="#">Yhteystiedot</a></li>
<li ><a href="#">Arviot ja arvostelut</a></li>
<li ><a href="#">Viimeisimmät kommentit</a></li>
<li ><a href="#">Kuvagalleria</a></li>
</ul>
<div class="container">
<h1>Yhteystiedot</h1>
<ul>
<h2 class="text-center">Lisätietoja</h2>
<p class="text-center"><?php echo $ravintola->getKuvaus(); ?></p>
<div id="teamcontent" class="clearfix">
<img src="<?php echo $ravintola->getKuva(); ?>" alt="kuva" class="img-rounded">
<?php if(tarkistaOikeudet()): ?>
<a type="button" href="edit.php?id=<?php echo $ravintola->getId() ?>" class="btn btn-xs btn-warning">Muokkaa tietoja</a>
 <?php  endif; ?>
</ul>
</div>
<h1><?php echo $data->virhe; ?></h1>
</div>
</div>
