<?php $sivuja = $data->sivuja; $ravintolat = $data->lista; ?>
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
	  <select id="tyyppi" class="form-group" name="tyyppi">
          <option value='' selected='selected'>Tyyppi</option>
          <option value="eurooppalainen">Eurooppalaiset</option>
          <option value="aasialainen">Aasialaiset</option>
	  <option value="amerikkalainen">Amerikkalaiset</option>
	  <option value="pikaruokaravintola">Pikaruokalat</option>
          <option value="kasvisravintola">Kasvisravintolat</option>
          <option value="kahvila">Kahvilat</option>
          <option value="baari">Baarit</option>
        </select>
   </div>
 </div>

 <div class="form-group">
   <div class="col-sm-2 control-label"> 
	  <select id="jarjestys"  class="form-group" name="jarjestys">
          <option value='1' selected='selected'>Järjestä</option>
          <option value=1>Nimjärjestys</option>
	  <option value=2>Halvimmat</option>
          <option value=3>Kalleimmat ensin</option>
	  <option value=4>Parhaimmat ensin</option>
          <option value=5>Surkeimmat ensin</option>
          <option value=6>Suosikeissa</option>
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
	<?php foreach($ravintolat as $ravintola): ?>
        <tr>
          <td><?php echo $ravintola->getNimi(); ?></td>
          <td><?php echo $ravintola->getOsoite(); ?></td>
          <td><?php tulostaTahdet($ravintola->getArvio()); ?></td>
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
