<div class="container">
 <h1>Ravintolat</h1>
 <form role="form" action="ravintolalista.php" method="GET" name="sortlist">
<fieldset>
  <div class="form-group"></div>
  <div class="form-group">   
    <div class="col-sm-2 control-label">
	<select id="hintataso" class="form-group"  name="hintataso" >
          <option value='' selected ='selected'>Hintataso</option>
	  <option value="€">€</option>
	  <option value="€€">€€</option>
	  <option value="€€€">€€€</option>
	  <option value="€€€€">€€€€</option>
	  <option value="€€€€€">€€€€€</option>
    	</select>
    </div>
  </div> 
  <div class="form-group">
    <div class="col-sm-2 control-label">
        <select id="yleisarvio" class="form-group" name="yleisarvio">
          <option value='' selected='selected'>Yleisarvio</option>
          <option value="*">*</option>
          <option value="**">**</option>
          <option value="***">***</option>
          <option value="****">****</option>
          <option value="*****">*****</option>
        </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2 control-label"> 
	  <select id="tyyppi" class="form-group" name="tyyppi">
          <option value='' selected='selected'>Tyyppi</option>
          <option value="eurooppa">Eurooppalaiset</option>
          <option value="aasia">Aasialaiset</option>
	  <option value="amerikkalainen">Amerikkalaiset</option>
	  <option value="pikaruoka">Pikaruokalat</option>
          <option value="kasvis">Kasvisravintolat</option>
          <option value="kahvila">Kahvilat</option>
          <option value="baari">Baarit</option>
        </select>
   </div>
 </div>

 <div class="form-group">
   <div class="col-sm-2 control-label"> 
	  <select id="jarjestys" class="form-group" name="jarjestys">
          <option value='' selected='selected'>Järjestä</option>
          <option value='hintataso'>Halvin-Kallein</option>
          <option value='hintataso desc'>Kallein-Halvin</option>
          <option value='yleisarvio'>Yleisarvio</option>
          <option value='nimi'>Nimjärjestys</option>
          <option value='suosikki'>Suosikeissa</option>
        </select>
   </div>
</div>
</fieldset>
<div>
  <button type="submit" class="btn btn-warning">
    Päivitä! 
  </button> 
</div>
</form>
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
          <td><a type="button" href="ravintola.php?id=<?php echo $ravintola->getId(); ?>" class="btn btn-xs btn-success">Mene sivulle</a></td>
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
