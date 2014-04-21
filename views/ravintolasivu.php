<?php
  
 require_once 'libs/utilities.php';

  /** Tiedosto, jonka tarkoituksena on näyttää ravintolan tiedot.
* Olettaa, että muuttuja $ravintola on asetettu. */
  $ravintola = $data->ravintola;

?>
<div class="container">
<div class="ravintola">
<h1><?php echo $ravintola->getNimi(); ?></h1>
<ul class="nav nav-tabs" id="myTab">
<li class="active"><a href="#tab_1_0" data-toggle='tab'>Yhteystiedot</a></li>
<li ><a href="#tab_1_1" data-toggle='tab'>Arviot ja arvostelut</a></li>
<li ><a href="#tab_1_2" data-toggle='tab'>Viimeisimmät kommentit</a></li>
<li ><a href="#tab_1_3" data-toggle='tab'>Kuvagalleria</a></li>
</ul>
<div class="panel panel-default"><div class='panel-body'>
<div class='tab-content'>
<div class="tab-pane in active" id='tab_1_0'>
<h1>Yhteystiedot</h1>
<ul>

<h4>Osoite</h4>
<p><?php echo $ravintola->getOsoite(); ?></p>
<h4>Aukioloajat</h4>
<p><?php echo $ravintola->getAukioloajat(); ?></p>
<h2 class="text-center">Lisätietoja</h2>
<p class="text-center"><?php echo $ravintola->getKuvaus(); ?></p>
<div id="teamcontent" class="clearfix">
<img src="<?php echo $ravintola->getKuva(); ?>" alt="kuva" class="img-rounded"> 
<?php if(tarkistaKirjautuminen()): ?>
   <a type="button" class="btn btn-warning" href="arvostele.php?id=<?php echo $ravintola->getId() ?>">Arvostele ravintola</a>
   <?php if(isset($data->suosikki)) { ?>
	<a type="button" class="btn btn-info" href="poistaSuosikki.php?id=<?php echo $ravintola->getId() ?>">Poista suosikeista</a>	

   <?php } else { ?>
	<a type="button" class="btn btn-info" href="suosikki.php?id=<?php echo $ravintola->getId() ?>">Lisää suosikkeihin</a>
   <?php } ?>
   <?php if(isset($data->inhokki)) { ?>
	<a type="button" class="btn btn-info" href="PoistaInhokki.php?id=<?php echo $ravintola->getId() ?>">Poista inhokeista</a>
   <?php } else { ?>
	<a type="button" class="btn btn-info" href="inhokki.php?id=<?php echo $ravintola->getId() ?>">Lisää inhokkeihin</a>
   <?php } ?>
<?php endif; ?>

<?php if(tarkistaOikeudet()): ?>
<a type="button" href="edit.php?id=<?php echo $ravintola->getId() ?>" class="btn btn-warning">Muokkaa tietoja</a>
 <?php  endif; ?>
</div>
</ul>

<h1><?php echo $data->virhe; ?></h1></div>
<div class='tab-pane fade' id='tab_1_1'><h1>Arviot ja arvostelut</h1>
	<div><label class="col-sm-2 control-label">Yleisarvio</label></div>
	<div><label class="col-sm-2 control-label">Ruoka</label></div>  
	<div><label class="col-sm-2 control-label">Hinta/laatu -suhde</label></div>  
	<div><label class="col-sm-2 control-label">Palvelu</label></div>  
	<div><label class="col-sm-2 control-label">Juomatarjonta</label></div>  	

</div>
<div class='tab-pane fade' id='tab_1_2'><h1>Viimeisimmät kommentit</h1></div>
<div class='tab-pane fade' id='tab_1_3'><h1>Kuvagalleria</h1></div>
</div>
<script>
  $(function () {
	$('#myTab a:first').tab('show')
  })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
     e.target // activated tab
     e.relatedTarget // previous tab
  })

</script>
</div></div></div></div>
