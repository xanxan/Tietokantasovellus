
        <div class="container">
            <h1>Ravintolat</h1>
  <div class="form-group">   
	<label for="select">Hintataso</label>
	<select id="textInput" class="form-control">
	  <option>€</option>
	  <option>€€</option>
	  <option>€€€</option>
	  <option>€€€€</option>
	  <option>€€€€€</option>
    	</select>
  </div>
  <div class="form-group">
  <label for="select">Arvio</label>
        <select id="textInput" class="form-control">
          <option>*</option>
          <option>**</option>
          <option>***</option>
          <option>****</option>
          <option>*****</option>
        </select>
  </div>
  <div class="form-group">
  <label for="select">Avoinna</label>
        <select id="textInput" class="form-control">
          <option>08-12</option>
          <option>12-16</option>
          <option>16-20</option>
          <option>20-24</option>
          <option>24-04</option>
        </select>
  </div>
  <div class="form-group">
   <label for="select">Näytä</label>
        <select id="textInput" class="form-control">
          <option>Eurooppalaiset</option>
          <option>Aasialaiset</option>
          <option>Kasvisravintolat</option>
          <option>Kahvilat</option>
          <option>Baarit</option>
        </select>
 </div>
 <div class="form-group">
  <label for="select">Järjestä</label>
        <select id="textInput" class="form-control">
          <option>Halvin-Kallein</option>
          <option>Kallein-Halvin</option>
          <option>Arvostelun mukaan</option>
          <option>Nimen mukaan</option>
          <option>Suosituimmat ensin</option>
        </select>
</div>

  <button type="button" class="btn btn-warning">
    Päivitä! 
  </button>
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
