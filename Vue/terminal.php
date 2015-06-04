<div class="container">
<?php echo '<br>'; ?>
      <div class="panel panel-default">
   <div class="panel-heading">Mes Terminaux
   	<a href="?modele=terminal&action=ajouter"><span class="glyphicon glyphicon-plus" aria-hidden="true" style="margin: 0px 10px"></span></a>
   	<span class="glyphicon glyphicon-minus" aria-hidden="true" style="margin: 0px 5px"></span>
   </div>
   <table class="table">

      <th>Numero Serie</th><th>Model</th>
      <?php
      while($row=$sql->fetch(PDO::FETCH_BOTH))
      {?>
  		<?php 
  		echo '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td></tr>';
  		?>   	
      <?php
      }
      ?>
   </table>
		</div>
</div><!-- /.container -->