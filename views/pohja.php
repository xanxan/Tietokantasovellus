<!DOCTYPE HTML>
<html>
	  <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
    </head>
    <body>
           <nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="#">Ravintola Demo</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-info">Submit</button>
        
      </form>
         
        <form class ="navbar-form navbar-left" role="button">
           
            <a class="btn btn-warning" href="Etusivu.html" type="button">Etusivu</a>
            <a class="btn btn-warning" href="Ravintolalista.html" role="button">Ravintolat</a>
            <a class="btn btn-warning" href="Käyttäjälista.html" type="button">Käyttäjät</a>
            <a class="btn btn-warning" href="Info.html" type="button">Info</a>
           
        
        </form>
        <form class ="navbar-form navbar-right" role="button">
             <a href="#" type="button" class="btn btn-info">Kirjaudu sisään</a>
            <a class="btn btn-info" href="Rekisteröityminen.html" role="button">Rekisteröidy</a>
        </form>
    
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  <?php 
    /* HTML-rungon keskellä on sivun sisältö, 
     * joka haetaan sopivasta näkymätiedostosta.
     * Oikean näkymän tiedostonimi on tallennettu muuttujaan $sivu.
     */
    require $sivu; 
  ?>
	</body>
</html>

