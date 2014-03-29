

<?php
  /** Tiedosto, jonka tarkoituksena on näyttää käyttäjän tiedot.
    * Olettaa, että muuttuja $kayttaja on asetettu. */ 
?><div class="kayttaja">
  <div class="row nimi">
    <label>Nimi:</label>
    <div class="value"><?php echo $kayttaja->getNimi(); ?></div>
  </div>
  <div class="row kuvaus">
    <label>Kuvaus:</label>
    <div class="value"><?php echo $kayttaja->getKuvaus(); ?></div>
  </div>
  <div class="row liittymispaiva">
    <label>Liittynyt:</label>
    <div class="value"><?php echo $kayttaja->getLiittymispaiva(); ?></div>
  </div>
</div>
