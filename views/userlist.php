


<?php
  /** Tiedosto, jonka tarkoituksena on näyttää lista käyttäjiä.
    * Olettaa, että muuttujassa $tiedot on kentät käyttäjät. */ 
?>
<h1>Käyttäjät</h1>
<p>Käyttäjiä yhteensä <?php echo count($kayttajat); ?> kpl</p>  
<div class="kayttajat">
  <?php foreach($kayttajat as $kayttaja): ?>
  <?php require 'user.php'; ?>
  <?php endforeach; ?>
</div>
