<?php $kayttaja = $data->kayttaja; ?>
<input type="hidden" name="id" value="<?php echo $kayttaja->getId(); ?>">
<div class="container">
<h1>Päivitä käyttäjätietoja</h1>
<form class="form-horizontal" role="form" action="update.php" method="POST">
   <div class="form-group">

    <label for="inputUsername" class="col-sm-2 control-label">Käyttäjätunnus</label>
    <div class="col-sm-10">
  	<p class="form-control"><?php echo $kayttaja->getTunnus(); ?></p> 
   </div>
  </div>
    <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Nykyinen salasana(*)</label>
    <div class="col-sm-10">
      <input type="password"  class="form-control" id="inputPassword" name="password" placeholder="Salasana">
    </div>
   </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-sm-2 control-label">Uusi salasana</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword1" name="password1" placeholder="Uusi salasana">
    </div>
  </div>
 <div class="form-group">
    <label for="inputPassword2" class="col-sm-2 control-label">Salasana uudelleen</label>
    <div class="col-sm-10">      <input type="password" class="form-control" id="inputPassword2" name="password2" placeholder="Uusi salasana">
    </div>
  </div>
  <div class="form-group">    <label for="text" class="col-sm-2 control-label">Kuvaus</label>
    <div class="col-sm-10">      <input type="text" class="form-control" rows="3" value="<?php echo $kayttaja->getKuvaus(); ?>" name="kuvaus" placeholder="Kuvaus"></input>
    </div>
  </div>
  
<div class="form-group">
    <label for="inputFile" class="col-sm-2 control-label">Profiilikuva</label>
<div class="col-sm-10">
  <input type="file" name="kuva" value="<?php echo $kayttaja->getKuva(); ?>" id="inputFile">
  <p class="help-block">Kuvan maksimikoko 700x700 pikseliä</p>
  </div>
  </div><?php echo $data->virhe; ?>
<div class="form-group">
<div class="col-md-offset-2 col-md-10">
<button type="submit" class="btn btn-warning">Tallenna</button>
<div class="pull-right">
<a type="button" href="delete.php?id=<?php echo $kayttaja->getId(); ?>" class="btn btn-danger">Poista käyttäjätunnus</a>
</div>
</div>
</div>
</form>
</div>
