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
<h2 class="text-center">Lisätietoja</h2>
<p class="text-center"><?php echo $ravintola->getKuvaus(); ?></p>
<div id="teamcontent" class="clearfix">
<img src="<?php echo $ravintola->getKuva(); ?>" alt="kuva" class="img-rounded">
<?php if(tarkistaOikeudet()): ?>
<a type="button" href="edit.php?id=<?php echo $ravintola->getId() ?>" class="btn btn-xs btn-warning">Muokkaa tietoja</a>
 <?php  endif; ?>
</div>
</ul>

<h1><?php echo $data->virhe; ?></h1></div>
<div class='tab-pane fade' id='tab_1_1'><p>moi</p></div>
<div class='tab-pane fade' id='tab_1_2'><p>moi2</p></div>
<div class='tab-pane fade' id='tab_1_3'><p>moi3</p></div>
</div>
<script>
  $(function () {
	$('#myTab a:last').tab('show')
  })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
     e.target // activated tab
     e.relatedTarget // previous tab
  })

</script>
</div></div></div></div>
