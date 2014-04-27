
        <div class="container">
    <h1>Kirjaudu sisään</h1>
    <form class="form-horizontal" role="form" action="login.php" method="POST">
       
	 <div class="form-group">
        <label for="inputUsername1" class="col-md-2 control-label">Käyttäjätunnus</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="inputUsername1" name="username" placeholder="Username" value="<?php echo $data->kayttaja; ?>"/>
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword1" class="col-md-2 control-label">Salasana</label>
        <div class="col-md-10">
          <input type="password" class="form-control" id="inputPassword1" name="password" placeholder="Password" />
	 </div>
      </div><?php if (!empty($data->virhe)) { ?><div class="alert alert-danger"><?php echo $data->virhe; ?></div><?php } ?>
      <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
          <button type="submit" class="btn btn-default">Kirjaudu sisään</button>
	</div>
      </div>
    </form>
  </div>
   
