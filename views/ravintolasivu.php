<?php
  
 require_once 'libs/utilities.php';

  /** Tiedosto, jonka tarkoituksena on näyttää ravintolan tiedot.
* Olettaa, että muuttuja $ravintola on asetettu. */
  $ravintola = $data->ravintola;
  $tiedot = $data->tiedot;
?>
<div class="container">
 <div class="ravintola">
   <h1><?php echo $ravintola->getNimi(); ?></h1>
     <ul class="nav nav-tabs" id="myTab">
      <li class="active"><a href="#tab_1_0" data-toggle='tab'>Yleistietoa ravintolasta</a></li>
      <li ><a href="#tab_1_1" data-toggle='tab'>Arviot ja arvostelut</a></li>
      <li ><a href="#tab_1_2" data-toggle='tab'>Viimeisimmät kommentit</a></li>
     </ul>
    <div class="panel panel-default"><div class='panel-body'>
	 
	<div class="tab-content">
	<div class="tab-pane in active" id='tab_1_0'>
         <div> <h2>Yleistietoa ravintolasta</h2> </div>
	 <div></div>
	   <ul>
	    <div class="row">
	     <div class="col-md-6">
	      <dl></dl>
	      <dl>
	    	<dt>Osoite</dt>
		<dd><?php echo $ravintola->getOsoite(); ?></dd>
	      </dl>
	      <dl>
		<dt>Aukioloajat</dt>
		<dd><?php echo $ravintola->getAukioloajat(); ?></dd>
	      </dl>
	      <dl>
		<dt>Ravintolan tyyppi</dt>
		<dd><?php echo $ravintola->getTyyppi(); ?></dd>
	      </dl>
	      <dl>
		<dt>Hintataso</dt>
		<dd><?php echo $ravintola->getHintataso(); ?></dd>
	      </dl>
	      <dl>
		<dt>Kuvaus</dt>
		<dd><?php echo $ravintola->getKuvaus(); ?></dd>
	      </dl>
	     </div>
	     <div class="col-md-6">
		<img src="<?php echo $ravintola->getKuva(); ?>" alt="kuva" class="img-rounded">
	     </div>
	   </div>
	   <div class="row">
	     <div class="col-md-6">
                <h3>Lisätietoja</h3>
		<dl></dl>
		<dl>
		 <?php if($tiedot->getVegaanit() == 'true' || $tiedot->getKasvissyojat() == 'true' || $tiedot->getLapsiperheet() == 'true') { ?>
		  <dt>Otamme huomioon</dt>
		  <ul><dd><?php if($tiedot->getVegaanit() == 'true'){ ?><li>vegaanit</li>
			  <?php } if($tiedot->getKasvissyojat() == 'true'){ ?><li>kasvissyöjät</li>
			  <?php } if($tiedot->getLapsiperheet() == 'true') { ?><li>lapsiperheet</li>
			  <?php } ?>
		  </dd></ul>	
		 <?php } ?>
		</dl>
		<dl>
		 <?php if($tiedot->getAamiainenBrunssi() == 'true' || $tiedot->getLounas() == 'true' || $tiedot->getBuffet() == 'true') { ?>
		  <dt>Tarjoamme</dt>
		  <ul><dd><?php if($tiedot->getAamiainenBrunssi() == 'true') { ?><li>aamiaisen ja/tai brunssin</li>
		 	  <?php } if($tiedot->getLounas() == 'true') { ?><li>lounaan</li>
			  <?php } if($tiedot->getBuffet() == 'true') { ?><li>buffet-pöydän</li>
			  <?php } ?>
		  </dd></ul>
		 <?php } ?>
		</dl>
		<dl>
		 <?php if($tiedot->getAnniskeluoikeus() == 'true' || $tiedot->getK18() == 'true' || $tiedot->getPukupakko() == 'true' || $tiedot->getVarauspakko() == 'true') { ?>
		  <dt>Meillä on</dt>
		  <ul><dd><?php if($tiedot->getAnniskeluoikeus() == 'true') { ?><li>A-oikeudet</li>
		      <?php } if($tiedot->getK18() == 'true') { ?><li>18 vuoden ikäraja</li>
		      <?php } if($tiedot->getPukupakko() == 'true') { ?><li>Pukupakko</li>
		      <?php } if($tiedot->getVarauspakko() == 'true') { ?><li>Varauspakko</li>
		      <?php } ?>
		  </dd></ul>
		 <?php } ?>
	        </dl>
	     </div>             
	     <div class="col-md-5">
		<?php if(tarkistaKirjautuminen()): ?> 
   		    <?php if(isset($data->suosikki)) { ?>
        		<a type="button" class="btn btn-info" href="poistaSuosikki.php?id=<?php echo $ravintola->getId() ?>">Poista suosikeista</a>
   		    <?php } else { ?>
        		<a type="button" class="btn btn-info" href="suosikki.php?id=<?php echo $ravintola->getId() ?>">Lisää suosikkeihin</a>
   		    <?php } 
   		          if(isset($data->inhokki)) { ?>
        		<a type="button" class="btn btn-info" href="poistaInhokki.php?id=<?php echo $ravintola->getId() ?>">Poista inhokeista</a>
   		    <?php } else { ?>
        		<a type="button" class="btn btn-info" href="inhokki.php?id=<?php echo $ravintola->getId() ?>">Lisää inhokkeihin</a>
   		    <?php } ?>
		<?php endif;
		      if(tarkistaOikeudet()): ?>
			<a type="button" href="edit.php?id=<?php echo $ravintola->getId() ?>" class="btn btn-warning">Muokkaa tietoja</a>
		<?php  endif; ?>
	     </div>
	   </div>
	</ul>
	<h1><?php echo $data->virhe; ?></h1>
      </div>
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
	<div class="media">
		<a class="pull-left" href="profiili.php?id=<?php echo $kommentti->getKayttaja_id() ?>">
		   <img class="media-object" src="<?php echo $kommentti->getKuva(); ?>" alt="kuva">
		</a>
		<div class="media-body">
		    <h4 class="media-heading"><?php echo $kommentti->getKayttajatunnus(); ?>: </h4>
		    <p><?php echo $kommentti->getKommentti(); ?></p>
		</div>
	</div>
	<?php  } 

    if (tarkistaKirjautuminen() && !isset($data->kommentoitu)) { ?>
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
