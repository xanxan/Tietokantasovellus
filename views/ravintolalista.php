
        <div class="container">
            <h1>Ravintolat</h1>
  <div class="form-group">   
	<label for="select" class="col-md-2 control-label">Hintataso</label>
	<div class="col-md-2">
	<select id="textInput" class="form-control" value="<?php echo $data->hintataso; ?>" name="hintataso">
          <option>Valitse</option>
	  <option>€</option>
	  <option>€€</option>
	  <option>€€€</option>
	  <option>€€€€</option>
	  <option>€€€€€</option>
    	</select>
	</div>
  </div>
  <div class="form-group">
	<label for="select" class="col-md-2 control-label">Arvio</label>
	<div class="col-md-2">
        <select id="textInput" class="form-control" value="<?php echo $data->arvio; ?>" name="arvio">
          <option>Valitse</option>
          <option>*</option>
          <option>**</option>
          <option>***</option>
          <option>****</option>
          <option>*****</option>
        </select>
	</div>
  </div>
  <div class="form-group">
  <label for="select" class="col-md-2 control-label">Avoinna</label>
        <div class="col-md-2">
	<select id="textInput" class="form-control" value="<?php echo $data->aukioloajat; ?>" name="aukioloajat">
          <option>Valitse</option>
          <option>08-12</option>
          <option>12-16</option>
          <option>16-20</option>
          <option>20-24</option>
          <option>24-04</option>
        </select>
	</div>
  </div>
  <div class="form-group">
   <label for="select" class="col-md-2 control-label">Näytä</label>
          <div class="col-md-2">
	  <select id="textInput" class="form-control" value="<?php echo $data->tyyppi; ?>" name="tyyppi">
          <option>Valitse</option>
          <option>Eurooppalaiset</option>
          <option>Aasialaiset</option>
          <option>Kasvisravintolat</option>
          <option>Kahvilat</option>
          <option>Baarit</option>
        </select>
	</div>
 </div>
<div class="form-group">
  <label for="select" class="col-md-2 control-label">Tarjonta</label>
          <div class="col-md-2">
          <select id="textInput" class="form-control" value="<?php echo $data->sopivuustieto; ?>" name="sopivuustieto">
	  <option>Valitse</option>
          <option>Vegaanit</option>
          <option>Lapsiperheet</option>
          <option>Kasvissyöjät</option>
          <option>A-oikeudet</option>
          <option>Buffet</option>
        </select>
        </div>
</div>
 <div class="form-group">
  <label for="select" class="col-md-2 control-label">Järjestä</label>
          <div class="col-md-2">
	  <select id="textInput" class="form-control" value="<?php echo $data->järjestys; ?>" name="järjestys">
          <option>Valitse</option>
          <option>Halvin-Kallein</option>
          <option>Kallein-Halvin</option>
          <option>Arvostelun mukaan</option>
          <option>Nimjärjestys</option>
          <option>Suosituimmat ensin</option>
        </select>
	</div>
</div>
<div class="col-md-2">
  <button type="submit" class="btn btn-warning">
    Päivitä! 
  </button>
</div>
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
	<?php foreach($data->lista as $ravintola): ?>
        <tr>
          <td><?php echo $ravintola->getNimi(); ?></td>
          <td><?php echo $ravintola->getOsoite(); ?></td>
          <td><?php echo $ravintola->getArvio(); ?></td>
          <td><?php echo $ravintola->getHintataso(); ?></td>
          <td><?php echo $ravintola->getAukioloajat(); ?></td>
          <td><a type="button" href="ravintolaprofiili.php?id<?php echo $ravintola->getId() ?>" class="btn btn-xs btn-success">Mene sivulle</a></td>
        </tr>
	<?php endforeach; ?>
       
      </tbody>
    </table>
            <ul class="pagination">
            <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
	    <?php if ($data->sivu > 0): ?>
            <li class="disabled"><a href="ravintolalista.php?sivu=<?php echo $data->sivu -1; ?>">&laquo;</a></li>
	    <?php endif; ?>
            <li><a href="ravintolalista.php?sivu=2">2</a></li>
            <li><a href="ravintolalista.php?sivu=3">3</a></li>
            <li><a href="ravintolalista.php?sivu=4">4</a></li>
            <li><a href="ravintolalista.php?sivu=5">5</a></li>
	    <?php if ($data->sivu < $data->sivuja): ?>
            <li><a href="ravintolalista.php?sivu=<?php echo $data->sivu + 1; ?>">&raquo;</a></li>
	    <?php endif; ?>
	    <div><h6>Yhteensä <?php echo Ravintola::lukumaara(); ?> ravintolaa</h6></div>
        </ul>
  </div>
