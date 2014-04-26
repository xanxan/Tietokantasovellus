<?php $ravintola = $data->ravintola; ?>
<div class="container">
<h1>Lisää ravintola</h1>
<form class="form-horizontal" role="form" action="insert.php"  method="POST">
   <div class="form-group">
    
    <label for="inputName" class="col-sm-2 control-label">Ravintolan nimi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" name="nimi" placeholder="Nimi">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress" class="col-sm-2 control-label">Katuosoite</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputAddress" name="osoite" placeholder="Osoite">
    </div>
  </div>
 <div class="form-group">
    <label for="inputText" class="col-sm-2 control-label">Aukioloajat</label>
    <div class="col-sm-10">      <input type="text" class="form-control" name="aukioloajat" id="inputText" placeholder="Aukioloajat">
    </div>
  </div>
  <div class="form-group">    <label for="text" class="col-sm-2 control-label">Kuvaus</label>
    <div class="col-sm-10">      <textarea type="text" class="form-control" rows="3"  name="kuvaus" placeholder="Kuvaus"></textarea>
    </div>
  </div>
<div class="form-group">
 <label for="select1" class="col-md-2 control-label">Tyyppi</label>
          <div class="col-md-2">
<select id="select1" class="form-control"  name="tyyppi">
          <option value='eurooppalainen' selected='selected'>Eurooppalaiset</option>
          <option value='aasialainen'>Aasialaiset</option>
          <option value='kasvisravintola'>Kasvisravintolat</option>
	  <option value='amerikkalainen'>Amerikkalaiset</option>
	  <option value='pikaruokaravintola'>Pikaruokaravintolat</option>
          <option value='kahvila'>Kahvilat</option>
          <option value='baari'>Baarit</option>
	  <option value='muu'>Muut</option>
        </select>
</div>
 </div>
<div class="form-group">
<label for="select2" class="col-md-2 control-label">Hintataso</label>
<div class="col-md-2">
     <select id="select2" class="form-control" name="hintataso">
	<option value='€' selected='selected'>€</option>
	<option value='€€'>€€</option>
	<option value='€€€'>€€€</option>
	<option value='€€€€'>€€€€</option>
	<option value='€€€€€'>€€€€€</option>
     </select>
</div>
  </div>
<div class="form-group">
    <label for="inputFile" class="col-sm-2 control-label">Ravintolan kuva</label>
<div class="col-sm-10">
  <input type="file" name="kuva" id="inputFile">
  </div>
  </div>

<div class="col-md-offset-2 col-sm-10">
<h4>Suositukset</h4>
<div class="form-group">
<label class="checkbox-inline">
  <input type="checkbox" name="lapset" id="inlineCheckbox1" value='true'> Lapsiperheet
</label>
<label class="checkbox-inline">
  <input type="checkbox" name="kasvis" id="inlineCheckbox2" value='true'> Kasvissyöjät
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox3" name="vege" value='true'> Vegaanit
</label>
</div>
</div>
<div class="col-md-offset-2 col-sm-10">
<div class="form-group">
<label class="checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" value='true' name="buffet"> Buffet-pöytä
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox2" value='true' name="aamu"> Aamiainen/brunssi
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox3" value='true' name="lounas"> Lounas
</label>
</div>
</div>
<div class="col-md-offset-2 col-sm-10">
<div class="form-group">
<label class="checkbox-inline">

  <input type="checkbox" id="inlineCheckbox1" value='true' name="oikeus"> A-oikeudet
</label>

<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox2" value='true' name="varaus"> Varaus etukäteen
</label>

<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox3" value='true' name="k18"> K18
</label>
</div>
</div>
<div class="col-md-offset-2 col-sm-10">
<div class="form-group">
<label class="checkbox-inline">

  <input type="checkbox" id="inlineCheckbox1" value='true' name="puku"> Pukupakko
</label>
</div>
</div>

 <div class="form-group">
<div class="col-md-offset-2 col-md-10">
<button type="submit" class="btn btn-default">Lähetä</button>
</div>
</div>
<?php echo $data->virheet; ?>
</form>
</div>
