<div class="container">
<h1>Arvostele ravintola <?php echo $data->ravintola->getNimi() ?></h1>
<form class="form-horizontal" role="form" action="arvostele.php" method="POST">
<fieldset> 
<div class="form-group">
<label for="select" class="col-md-2 control-label">Yleisarvio</label>
<div class="col-md-2">
        <select id="yleisarvio" class="form-control" name="yleisarvio">
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
   <label for="select" class="col-md-2 control-label">Ruoka</label>
          <div class="col-md-2">
<select id="ruoka" class="form-control" name="ruoka">
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
<select id="hintalaatu" class="form-control" name="hintalaatu">
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
<select id="palvelu" class="form-control" name="palvelu">
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
<select id="juomat" class="form-control" name="juomat">
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
</form>
</div>
