<div class="container">
<h1>Arvostele ravintola</h1>
<form class="form-horizontal" role="form" action="arostele.php" method="POST">
<fieldset> 
<div class="form-group">
<label for="select" class="col-md-2 control-label">Yleisarvio</label>
<div class="col-md-2">
        <select id="yleisarvio" class="form-group" name="yleisarvio">
          <option value='' selected='selected'>Valitse</option>
          <option value=1>Surkea</option>
          <option value=2>Tyydyttävä</option>
          <option value=3>Hyvä</option>
          <option value=4>Mainio</option>
          <option value=5>Erinomainen</option>
        </select>
</div>
  </div>
<div class="form-group">
   <label for="select" class="col-md-2 control-label">Ruoka</label>
          <div class="col-md-2">
<select id="ruoka" class="form-group" name="ruoka">
	<option value='' selected='selected'>Valitse</option>
          <option value=1>Surkea</option>
          <option value=2>Tyydyttävä</option>
          <option value=3>Hyvä</option>
          <option value=4>Mainio</option>
          <option value=5>Erinomainen</option>        
</select>
</div>
 </div>
<div class="form-group">
<label for="select" class="col-md-2 control-label">Hinta/laatu -suhde</label>
<div class="col-md-2">
<select id="hintalaatu" class="form-group" name="hintalaatu">
	<option value='' selected='selected'>Valitse</option>
          <option value=1>Surkea</option>
          <option value=2>Tyydyttävä</option>
          <option value=3>Hyvä</option>
          <option value=4>Mainio</option>
          <option value=5>Erinomainen</option>    
 </select>
</div>
  </div>
<div class="form-group">
<label for="select" class="col-md-2 control-label">Palvelu</label>
<div class="col-md-2">
<select id="palvelu" class="form-group" name="palvelu">
        <option value='' selected='selected'>Valitse</option>
          <option value=1>Surkea</option>
          <option value=2>Tyydyttävä</option>
          <option value=3>Hyvä</option>
          <option value=4>Mainio</option>
          <option value=5>Erinomainen</option>
 </select>
</div>
  </div>
<div class="form-group">
<label for="select" class="col-md-2 control-label">Juomatarjonta</label>
<div class="col-md-2">
<select id="juomat" class="form-group" name="juomat">
        <option value='' selected='selected'>Valitse</option>
          <option value=1>Surkea</option>
          <option value=2>Tyydyttävä</option>
          <option value=3>Hyvä</option>
          <option value=4>Mainio</option>
          <option value=5>Erinomainen</option>
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
