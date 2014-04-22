<?php $ravintola = $data->ravintola; ?>
<input type="hidden" name="id" value="<?php echo $ravintola->getId(); ?>">
<input type="hidden" name="nimi" value="<?php echo $ravintola->getNimi(); ?>">
<div class="container">
<h1>Arvostele ravintola <?php echo $data->ravintola->getNimi() ?></h1>
<form class="form-horizontal" id="arvio" role="form" action="arvostele.php?id=<?php echo $ravintola->getId(); ?>" method="POST">
<input type="hidden" name="id" value="<?php //echo $ravintola->getId(); ?>">
<input type="hidden" name="nimi" value="<?php //echo $ravintola->getNimi(); ?>">
<fieldset> 
<div class="form-group">
<label for="select" class="col-md-2 control-label">Yleisarvio</label>
<div class="col-md-2">
        <select class="form-control" form="arvio" name="yleisarvio">
          <option value='' selected='selected'>Valitse</option>
          <option VALUE='1'>Surkea</option>
          <option VALUE='2'>Tyydyttävä</option>
          <option VALUE='3'>Hyvä</option>
          <option VALUE='4'>Mainio</option>
          <option VALUE='5'>Erinomainen</option>
        </select>
</div>
  </div>
<div class="form-group">
   <label for="select" class="col-md-2 control-label">Ruoka</label>
          <div class="col-md-2">
<select  class="form-control" form="arvio" name="ruoka">
	<option value=0 selected='selected'>Valitse</option>
          <option VALUE=1>Surkea</option>
          <option VALUE=2>Tyydyttävä</option>
          <option VALUE=3>Hyvä</option>
          <option VALUE=4>Mainio</option>
          <option VALUE=5>Erinomainen</option>        
</select>
</div>
 </div>
<div class="form-group">
<label for="select" class="col-md-2 control-label">Hinta/laatu -suhde</label>
<div class="col-md-2">
<select  class="form-control" form="arvio" name="hintalaatu">
	<option value=0 selected='selected'>Valitse</option>
          <option VALUE=1>Surkea</option>
          <option VALUE=2>Tyydyttävä</option>
          <option VALUE=3>Hyvä</option>
          <option VALUE=4>Mainio</option>
          <option VALUE=5>Erinomainen</option>    
 </select>
</div>
  </div>
<div class="form-group">
<label for="select" class="col-md-2 control-label">Palvelu</label>
<div class="col-md-2">
<select class="form-control" form="arvio" name="palvelu">
        <option value=0 selected='selected'>Valitse</option>
          <option VALUE=1>Surkea</option>
          <option VALUE=2>Tyydyttävä</option>
          <option VALUE=3>Hyvä</option>
          <option VALUE=4>Mainio</option>
          <option VALUE=5>Erinomainen</option>
 </select>
</div>
  </div>
<div class="form-group">
<label for="select" class="col-md-2 control-label">Juomatarjonta</label>
<div class="col-md-2">
<select  class="form-control" form="arvio" name="juomat">
        <option value=0 selected='selected'>Valitse</option>
          <option VALUE=1>Surkea</option>
          <option VALUE=2>Tyydyttävä</option>
          <option VALUE=3>Hyvä</option>
          <option VALUE=4>Mainio</option>
          <option VALUE=5>Erinomainen</option>
 </select>
</div>
  </div>
</fieldset>
 <div class="form-group">
<div class="col-md-offset-2 col-md-10">
<button type="submit" class="btn btn-default">Lähetä</button>
</div>
</div>
<?php echo $data->virheet; ?>
</form>
</div>
