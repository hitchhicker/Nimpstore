<div class="container">
<?php echo '<br>'; ?>
      <div class="panel panel-default">
   <div class="panel-heading">Mes Terminaux
   	<a href="?modele=terminal&action=ajouterForm"><span class="glyphicon glyphicon-plus" aria-hidden="true" style="margin: 0px 10px"></span></a>
   	<a href="?modele=terminal&action=supprimerForm"><span class="glyphicon glyphicon-minus" aria-hidden="true" style="margin: 0px 5px"></span></a>
   </div>
   <table class="table">

      <th>Numero Serie</th><th>Modele</th>
      <?php
      while($row=$sql->fetch(PDO::FETCH_BOTH))
      {
  		echo '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td></tr>';
      }
      ?>
   </table>
		</div>
</div><!-- /.container -->