<?php $ravintola = $data->ravintola; ?>
<?php $suositukset = $data->suositukset; ?>
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
      <input type="text" value="<?php echo $ravintola->getOsoite(); ?>" class="form-control" id="inputAddress" name="osoite" placeholder="Osoite">
    </div>
  </div>
 <div class="form-group">
    <label for="inputText" class="col-sm-2 control-label">Aukioloajat</label>
    <div class="col-sm-10"> <input type="text" class="form-control" value="<?php echo $ravintola->getAukioloajat(); ?>"  id="inputText" name="aukioloajat" placeholder="Aukioloajat">
    </div>
  </div>
  <div class="form-group"> <label for="text" class="col-sm-2 control-label">Kuvaus</label>
    <div class="col-sm-10"> <input type="text" class="form-control" rows="3" name="kuvaus" value="<?php echo $ravintola->getKuvaus(); ?>" placeholder="Kuvaus"></input>
    </div>
  </div>
<div class="form-group">
<label for="select" class="col-md-2 control-label">Hintataso</label>
<div class="col-md-2">
     <select id="select" class="form-control" name="hintataso" value="<?php echo $ravintola->getHintataso() ?>">
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
  <input type="file" name="kuva" id="inputFile" value="<?php echo $ravintola->getKuva(); ?>">
  </div>
  </div>

<div class="col-md-offset-2 col-sm-10">
<h4>Suositukset</h4>
<div class="form-group">
<label class="checkbox-inline">
<input type="checkbox" name="lapset" id="inlineCheckbox1" value="<?php echo $suositukset->getLapsiperheet(); ?>"> Lapsiperheet
</label>
<label class="checkbox-inline">
<input type="checkbox" name="kasvis" id="inlineCheckbox2" value="<?php echo $suositukset->getKasvissyojat(); ?>"> Kasvissyöjät
</label>
<label class="checkbox-inline">
<input type="checkbox" id="inlineCheckbox3" name="vege" value="<?php echo $suositukset->getVegaanit(); ?>"> Vegaanit
</label>
</div>
</div>
<div class="col-md-offset-2 col-sm-10">
<div class="form-group">
<label class="checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" value="<?php echo $suositukset->getBuffet(); ?>" name="buffet"> Buffet-pöytä
</label>
<label class="checkbox-inline">
<input type="checkbox" id="inlineCheckbox2" value="<?php echo $suositukset->getAamiainenBrunssi(); ?>" name="aamu"> Aamiainen/brunssi
</label>
<label class="checkbox-inline">
<input type="checkbox" id="inlineCheckbox3" value="<?php echo $suositukset->getLounas(); ?>" name="lounas"> Lounas
</label>
</div>
</div>
<div class="col-md-offset-2 col-sm-10">
<div class="form-group">
<label class="checkbox-inline">

<input type="checkbox" id="inlineCheckbox1" value="<?php echo $suositukset->getAnniskeluoikeus(); ?>" name="oikeus"> A-oikeudet
</label>

<label class="checkbox-inline">
<input type="checkbox" id="inlineCheckbox2" value="<?php echo $suositukset->getVarauspakko(); ?>" name="varaus"> Varaus etukäteen
</label>

<label class="checkbox-inline">
<input type="checkbox" id="inlineCheckbox3" value="<?php echo $suositukset->getK18(); ?>" name="k18"> K18
</label>
</div>
</div>
<div class="col-md-offset-2 col-sm-10">
<div class="form-group">
<label class="checkbox-inline">

<input type="checkbox" id="inlineCheckbox1" value="<?php echo $suositukset->getPukupakko(); ?>" name="puku"> Pukupakko
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
