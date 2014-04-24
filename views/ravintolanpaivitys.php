<?php $ravintola = $data->ravintola; ?>
<div class="container">
<h1>Muuta ravintolan tietoja</h1>
<form class="form-horizontal" role="form" action="edit.php?id=<?php echo $ravintola->getId(); ?>" method="POST">
<input type="hidden" name"id" value="<?php echo $ravintola->getId(); ?>">
   <div class="form-group">
    
    <label for="inputName" class="col-sm-2 control-label">Ravintolan nimi</label>
    <div class="col-sm-10">
   	<p class="form-control"><?php echo $ravintola->getNimi(); ?></p> 
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
    <div class="col-sm-10"> <input type="text" class="form-control" id="inputText" name="aukioloajat" placeholder="Aukioloajat">
    </div>
  </div>
  <div class="form-group"> <label for="text" class="col-sm-2 control-label">Kuvaus</label>
    <div class="col-sm-10"> <textarea type="text" class="form-control" rows="3" name="kuvaus" placeholder="Kuvaus"></textarea>
    </div>
  </div>
<div class="form-group">
<label for="select" class="col-md-2 control-label">Hintataso</label>
<div class="col-md-2">
     <select id="select" class="form-control" name="hintataso">
        <option value="€" selected='selected'>€</option>
	<option value="€€">€€</option>
	<option value="€€€">€€€</option>
	<option value="€€€€">€€€€</option>
	<option value="€€€€€">€€€€€</option>
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
<input type="checkbox" name="lapset" id="inlineCheckbox1" value="ok"> Lapsiperheet
</label>
<label class="checkbox-inline">
<input type="checkbox" name="kasvis" id="inlineCheckbox2" value="ok"> Kasvissyöjät
</label>
<label class="checkbox-inline">
<input type="checkbox" id="inlineCheckbox3" name="vege" value="ok"> Vegaanit
</label>
</div>
</div>
<div class="col-md-offset-2 col-sm-10">
<div class="form-group">
<label class="checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" value="ok" name="buffet"> Buffet-pöytä
</label>
<label class="checkbox-inline">
<input type="checkbox" id="inlineCheckbox2" value="ok" name="aamu"> Aamiainen/brunssi
</label>
<label class="checkbox-inline">
<input type="checkbox" id="inlineCheckbox3" value="ok" name="lounas"> Lounas
</label>
</div>
</div>
<div class="col-md-offset-2 col-sm-10">
<div class="form-group">
<label class="checkbox-inline">

<input type="checkbox" id="inlineCheckbox1" value="ok" name="oikeus"> A-oikeudet
</label>

<label class="checkbox-inline">
<input type="checkbox" id="inlineCheckbox2" value="ok" name="varaus"> Varaus etukäteen
</label>

<label class="checkbox-inline">
<input type="checkbox" id="inlineCheckbox3" value="ok" name="k18"> K18
</label>
</div>
</div>
<div class="col-md-offset-2 col-sm-10">
<div class="form-group">
<label class="checkbox-inline">

<input type="checkbox" id="inlineCheckbox1" value="ok" name="puku"> Pukupakko
</label>
</div>
</div>


 <div class="form-group">
<div class="col-md-offset-2 col-md-10">
<button type="submit" class="btn btn-default">Päivitä</button>
<div class="pull-right">
<a type="button" href="poista.php?id=<?php echo $ravintola->getId(); ?>" class="btn btn-danger">Poista käyttäjätunnus</a>
</div>
</div>
</div>
<?php echo $ravintola->getVirheet(); ?>
</form>
</div>
