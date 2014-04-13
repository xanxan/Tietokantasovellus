<div class="container">
   <h1>Käytäjät</h1>

      <table class="table table-striped">
      <thead>
        <tr>
          <th>Käyttäjä</th>
          <th>  </th>
          <th>Liittynyt</th>
          <th>Kommentteja</th>
          <th>Arvosteluja</th>
          <th>  </th>
        </tr>
      </thead>
      <tbody>
<?php foreach($data->lista as $kayttaja): ?>
<tr>
<td><img src="<?php echo $kayttaja->getKuva(); ?>" alt="kuva" class="img-circle"></td>
<td><?php echo $kayttaja->getTunnus(); ?></td>
<td><?php echo $kayttaja->getLiittymispaiva(); ?></td>
<td><?php echo $kayttaja->getKommentteja(); ?></td>
<td><?php echo $kayttaja->getArvosteluja(); ?></td>
<td><a type="button" href="profiili.php?id=<?php echo $kayttaja->getId() ?>" class="btn btn-xs btn-success">Mene sivulle</a></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
 <ul class="pagination">
<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
<?php if ($data->sivu > 0): ?>
<li class="disabled"><a href="userlist.php?sivu=<?php echo $data->sivu -1; ?>">&laquo;</a></li>
<?php endif; ?>
<li><a href="userlist.php?sivu=2">2</a></li>
<li><a href="userlist.php?sivu=3">3</a></li>
<li><a href="userlist.php?sivu=4">4</a></li>
<li><a href="userlist.php?sivu=5">5</a></li>
<?php if ($data->sivu < $data->sivuja): ?>
<li><a href="userlist.php?sivu=<?php echo $data->sivu + 1; ?>">&raquo;</a></li>
<?php endif; ?>
<div><h6>Yhteensä <?php echo Kayttaja::lukumaara(); ?> käyttäjää</h6></div>
</ul>
</div>
