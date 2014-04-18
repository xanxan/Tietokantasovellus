<?php $ravintola = $data->ravintola; ?>
<input type="hidden" name"id" value="<?php echo $ravintola->getId(); ?>">
<div class="container">
<h1>Muuta ravintolan tietoja</h1>
<form class="form-horizontal" role="form" action="ravintolanpaivitys.php" method="POST">
   <div class="form-group">
    
    <label for="inputName" class="col-sm-2 control-label">Ravintolan nimi</label>
    <div class="col-sm-10">
   	<p class="form-control"><?php echo $ravintola->getNimi(); ?></p> 
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress" class="col-sm-2 control-label">Katuosoite</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputAddress" placeholder="Osoite">
    </div>
  </div>
 <div class="form-group">
    <label for="inputText" class="col-sm-2 control-label">Aukioloajat</label>
    <div class="col-sm-10"> <input type="text" class="form-control" id="inputText" placeholder="Aukioloajat">
    </div>
  </div>
  <div class="form-group"> <label for="text" class="col-sm-2 control-label">Kuvaus</label>
    <div class="col-sm-10"> <textarea type="text" class="form-control" rows="3" placeholder="Kuvaus"></textarea>
    </div>
  </div>
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
    <label for="inputFile" class="col-sm-2 control-label">Ravintolan kuva</label>
<div class="col-sm-10">
  <input type="file" id="inputFile">
  </div>
  </div>

<div class="col-md-offset-2 col-sm-10">
<h4>Suositukset</h4>
<div class="form-group">
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1"> Lapsiperheet
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox2" value="option2"> Kasvissyöjät
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox3" value="option3"> Vegaanit
</label>
</div>
</div>
<div class="col-md-offset-2 col-sm-10">
<div class="form-group">
<label class="checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" value="option1"> Buffet-pöytä
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox2" value="option2"> Aamiainen/brunssi
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox3" value="option3"> Lounas
</label>
</div>
</div>
<div class="col-md-offset-2 col-sm-10">
<div class="form-group">
<label class="checkbox-inline">

  <input type="checkbox" id="inlineCheckbox1" value="option1"> A-oikeudet
</label>

<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox2" value="option2"> Varaus etukäteen
</label>

<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox3" value="option3"> K18
</label>
</div>
</div>
 <div class="form-group">
<div class="col-md-offset-2 col-md-10">
<button type="submit" class="btn btn-default">Päivitä</button>
</div>
</div>
</form>
</div>
