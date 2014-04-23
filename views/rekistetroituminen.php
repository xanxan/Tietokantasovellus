 <div class="container">
<h1>Luo uusi käyttäjätunnus</h1>
<form class="form-horizontal" role="form" action="register.php" method="POST">
   <div class="form-group">
    
    <label for="inputUsername" class="col-sm-2 control-label">Käyttäjätunnus</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Käyttäjätunnus" />
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-sm-2 control-label">Salasana</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword1" name="password1" placeholder="Salasana">
    </div>
  </div>
 <div class="form-group">
    <label for="inputPassword2" class="col-sm-2 control-label">Salasana uudelleen</label>
    <div class="col-sm-10">      <input type="password" class="form-control" id="inputPassword2" name="password2" placeholder="Salasana">
    </div>
  </div>
  <div class="form-group">    <label for="text" class="col-sm-2 control-label">Kuvaus</label>
    <div class="col-sm-10">      <textarea type="text" class="form-control" rows="3"  name="kuvaus" placeholder="Kuvaus"></textarea>
    </div>
  </div>
  <?php require_once 'sivupohja.php' ?>
<div class="form-group">
    <label for="inputFile" class="col-sm-2 control-label">Profiilikuva</label>
<div class="col-sm-10">
  <input type="file" name="kuva" id="inputFile">
  </div>
  </div>
<div class="form-group">
<div class="col-md-offset-2 col-md-10">
<button type="submit" class="btn btn-default">Rekisteröidy</button>
</div>
</div>
</form>
</div>
