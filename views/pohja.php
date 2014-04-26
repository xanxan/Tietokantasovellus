<!DOCTYPE HTML>
<?php if (!empty($_SESSION['ilmoitus'])): ?>
  <div class="alert alert-warning">
    <?php echo $_SESSION['ilmoitus']; ?>
  </div>
<?php
  // Samalla kun viesti näytetään, se poistetaan istunnosta,
  // ettei se näkyisi myöhemmin jollain toisella sivulla uudestaan.
  unset($_SESSION['ilmoitus']); 
  endif;
?>
 <html>
	 <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
	<script src="../libs/jquery-2.1.0.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	
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
    </div>
	<?php require_once 'libs/utilities.php'; ?>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         
        <form class ="navbar-form navbar-left" role="button">
            <a class="navbar-brand" href="etusivu.php">Ravintolatietokanta</a> 
            <a class="navbar-brand" href="ravintolalista.php" role="button">Ravintolat</a>
            <a class="navbar-brand" href="users.php" type="button">Käyttäjät</a>
            <a class="navbar-brand" href="info.php" type="button">Info</a>
           <?php if(tarkistaKirjautuminen()): ?>
	     <?php $kayttaja = $_SESSION['kirjautunut'] ?>
       		<a class="navbar-brand" href="profiili.php?id=<?php echo $kayttaja; ?>">Profiili</a>
	     <?php  endif; ?>
        
        </form>
	<form class ="navbar-form navbar-right" role="button">
	 <?php if(tarkistaOikeudet()): ?>
                   <a class="navbar-brand" href="insert.php" type="button">Lisää ravintola</a>
                <?php endif; ?>
	 <?php if(tarkistaKirjautuminen()){ ?>
	    <a href="uloskirjautuminen.php" type="button" class="navbar-brand">Kirjaudu ulos</a>
	<?php } else { ?>
            <a href="login.php" type="button" class="navbar-brand">Kirjaudu sisään</a>
            <a class="navbar-brand" href="register.php" role="button">Rekisteröidy</a>
        <?php }; ?>
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

