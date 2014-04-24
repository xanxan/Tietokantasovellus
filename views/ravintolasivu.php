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
<div class='tab-pane fade' id='tab_1_1'>
  <h1>Arviot ja arvostelut</h1>
    <ul>
        <div class="col-md-6">

	 <div>
	    <dl class="dl-horizontal">
		<dt>Yleisarvio:</dt> 
		<dd><?php tulostaTahdet($data->yleisarvio); ?></dd>
	    </dl>
         </div>

	<div>
	   <dl class="dl-horizontal">
                <dt>Ruoka:</dt>    
                <dd><?php tulostaTahdet($data->ruoka); ?></dd>
           </dl>
	</div>

	<div>
	   <dl class="dl-horizontal">
                <dt>Hinta/laatu -suhde:</dt>    
                <dd><?php tulostaTahdet($data->hintalaatu); ?></dd>
           </dl>
	</div>
	<!-- Seuraava tähti on tarkoituksella jätetty ylimääräinen koska ilman sitä teksti malli ei jostain syystä toimi enkä osaa sitä korjata. -->	
	<div>
	   <dl class="dl-horizontal">
                <dt></dt>    
                <dd><span class="glyphicon glyphicon-star"></span></dd>
           </dl>
	</div>
       
	 <div>
	    <dl class="dl-horizontal">
                <dt>Palvelu:</dt>
                <dd><?php tulostaTahdet($data->palvelu); ?></dd>
            </dl>
	</div>
 
	<div>
           <dl class="dl-horizontal">
                <dt>Juomatarjonta:</dt>
                <dd><?php  tulostaTahdet($data->juomat); ?></dd>
           </dl>
        </div>
  
    </div>
      <div class="col-md-4">
       <?php if (tarkistaKirjautuminen()) {
	 if(!isset($data->arvosteltu)){ ?>
          <a type="button" class="btn btn-warning" href="arvostele.php?id=<?php echo $ravintola->getId() ?>">Arvostele ravintola</a>
	 <?php }
	} ?> 
      </div>
 </ul>
</div>
<div class='tab-pane fade' id='tab_1_2'><h1>Viimeisimmät kommentit</h1>
  <ul>
    <?php foreach ($data->kommentit as $kommentti) { ?>
		<dl class="dl-horizontal">
		    <dt><?php echo $kommentti->getKayttajatunnus(); ?>: </dt>
		    <dd><?php echo $kommentti->getKommentti(); ?></dt>
		</dl>
	<?php  } 

    if (!isset($data->kommentoitu)) { ?>
      <form class="form-horizontal" id="comment" role="form" action="ravintola.php?id=<?php echo $ravintola->getId(); ?>" method="POST">
	<input type="hidden" name="id" value="<?php echo $ravintola->getId(); ?>">
	<div class="form-group">
	    <label for="text" class="col-sm-2 control-label"></label>
		<div class="col-sm-10">
		   <textarea type="text" class="form-control" rows="3" name="kommentti" placeholder="Kirjoita kommentti..."></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-offset-2 col-md-10">
		   <button type="submit" class="btn btn-default">Lähetä kommentti</button>
		</div>
	</div>
      </form> <?php } ?>
  </ul>
</div>
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
