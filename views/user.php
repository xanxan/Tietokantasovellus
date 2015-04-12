<?php
  require_once 'libs/utilities.php';

  /** Tiedosto, jonka tarkoituksena on näyttää käyttäjän tiedot.
    * Olettaa, että muuttuja $kayttaja on asetettu. */ 
  $kayttaja = $data->kayttaja;

?>
<div class="container">
 <div class="kayttaja">
    <h1>Käyttäjän <?php echo $kayttaja->getTunnus(); ?>  profiili</h1>
    <ul class="nav nav-tabs" id="myTab">
      <li class="active"><a href="#tab_1_0" data-toggle='tab'>Henkilötiedot</a></li>
      <li ><a href="#tab_1_1" data-toggle='tab'>Viimeisimmät kommentit</a></li>
      <li ><a href="#tab_1_2" data-toggle='tab'>Suosikkilista</a></li>
      <li ><a href="#tab_1_3" data-toggle='tab'>Inhokkilista</a></li>
    </ul>
    <div class="panel panel-default"><div class='panel-body'>
      <div class='tab-content'>
    	<div class="tab-pane in active" id='tab_1_0'>
      	   <div><h1>Henkilötiedot</h1></div>
	   <div></div>
      	     <ul>
	      <div class="row">
		<div class="col-md-4">
		  <dl></dl>
		  <dl>
		    <dt>Käyttäjätunnus</dt>
		    <dd><?php echo $kayttaja->getTunnus(); ?></dd>
		  </dl>
		  <dl>
		    <dt>Liittynyt</dt>
		    <dd><?php echo $kayttaja->getLiittymispaiva(); ?></dd>      
		  </dl>
		  <dl>
		    <dt>Kuvaus</dt>
		    <dd><?php echo $kayttaja->getKuvaus(); ?></dd>
		  </dl>
		</div>
		
		<div class="col-md-4">
		  <dl></dl>
		  <dl class="dl-horizontal">
		    <dt>Annettuja arvosteluja</dt>
		    <dd><?php echo $kayttaja->getArvosteluja(); ?></dd>
		  </dl>
		  <dl class="dl-horizontal">
		    <dt>Annettuja kommentteja</dt>
		    <dd><?php echo $kayttaja->getKommentteja(); ?></dd>
		  </dl>
		  <dl class="dl-horizontal">
		    <dt>Suosikkiravintoloita</dt>
		    <dd><?php echo $kayttaja->getSuosikkeja(); ?></dd>
		  </dl>
		  <dl class="dl-horizontal">
		    <dt>Inhokkiravintoloita</dt>
		    <dd><?php echo $kayttaja->getInhokkeja(); ?></dd>
		  </dl>
		</div>
		<dl></dl>
		<div class="col-md-4">
        	   <img src="<?php echo $kayttaja->getKuva(); ?>" alt="kuva" class="img-rounded">
		</div>
   	      </div>
	      <div class="row">
		<div class="col-md-5"> 
     		  <?php if(tarkistaKirjautuminen() && $kayttaja->getId() == $_SESSION['kirjautunut']): ?>  
	 		<a type="button" href="update.php?id=<?php echo $kayttaja->getId() ?>" class="btn btn-xs btn-warning">Muokkaa tietoja</a>   
     		  <?php  endif; ?>
		</div>	
	      </div>
    	    </ul> 
	  <h1><?php  echo $data->virhe; ?></h1></div>
	<div class='tab-pane fade' id='tab_1_1'><h1>Viimeisimmät kommentit</h1>
	  <ul>
	   <?php foreach ($data->kommentit as $kommentti) { ?>
		<div class="media">
		  <a class="pull-left">
			<img class="img-circle" src="<?php echo $kayttaja->getKuva(); ?>" alt="kuva">
		  </a>
		  <div class="media-body">
			<h4 class="media-heading"><?php echo $kommentti->getRavintolannimi(); ?>: </h4>
			<p><?php echo $kommentti->getKommentti(); ?></p>
		 </div>
		</div>
	   <?php } ?>
	  </ul>
	</div>
        <div class='tab-pane fade' id='tab_1_2'><h1>Suosikkilista</h1>
                <table class="table table-striped">
                  <thead>
                    <tr>
                         <th>Ravintola</th>
                         <th>Osoite</th>
                         <th>Yleisarvio</th>
                         <th>Hintataso</th>
                         <th>Avoinna</th>
                         <th>Ravintolan profiili</th>
                    </tr>
                  </thead>

		  <tbody>
       			 <?php foreach($data->suosikkilista as $ravintola): ?>
       				 <tr>
       				   <td><?php echo $ravintola->getNimi(); ?></td>
       				   <td><?php echo $ravintola->getOsoite(); ?></td>
       				   <td><?php echo $ravintola->getArvio(); ?></td>
       				   <td><?php echo $ravintola->getHintataso(); ?></td>
       				   <td><?php echo $ravintola->getAukioloajat(); ?></td>
       				   <td><a type="button" href="ravintola.php?id=<?php echo $ravintola->getId(); ?>" class="btn btn-xs btn-success">Mene sivulle</a></td>
       				 </tr>
       			 <?php endforeach; ?>

     		 </tbody>
		</table></div>
  	<div class='tab-pane fade' id='tab_1_3'><h1>Inhokkilista</h1>
	        <table class="table table-striped">
                  <thead>
                    <tr>
                         <th>Ravintola</th>
                         <th>Osoite</th>
                         <th>Yleisarvio</th>
                         <th>Hintataso</th>
                         <th>Avoinna</th>
                         <th>Ravintolan profiili</th>
                    </tr>
                  </thead>

                  <tbody>
                         <?php foreach($data->inhokkilista as $ravintola): ?>
                                 <tr>
                                   <td><?php echo $ravintola->getNimi(); ?></td>
                                   <td><?php echo $ravintola->getOsoite(); ?></td>
                                   <td><?php echo $ravintola->getArvio(); ?></td>
                                   <td><?php echo $ravintola->getHintataso(); ?></td>
                                   <td><?php echo $ravintola->getAukioloajat(); ?></td>
                                   <td><a type="button" href="ravintola.php?id=<?php echo $ravintola->getId(); ?>" class="btn btn-xs btn-success">Mene sivulle</a></td>
                                 </tr>
                         <?php endforeach; ?>

                 </tbody>
                </table>


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
  </div>
 </div>
</div>
</div>
