<div class="container">
<?php echo '<br>'; ?>
   <div class="panel panel-default">
     <div class="panel-heading">Mes Installations</div>
       <table class="table">
         <th>Terminal</th><th>Article</th><th>Date</th>
         <?php
         while($row=$res_inst->fetch(PDO::FETCH_BOTH))
         {
         echo '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td></tr>';
         }
         ?>
      </table>
   </div>
</div><!-- /.container -->