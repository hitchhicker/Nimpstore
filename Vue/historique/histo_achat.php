<div class="container">
<?php echo '<br>'; ?>
   <div class="panel panel-default">
     <div class="panel-heading">Mes Achats</div>
       <table class="table">
         <th>Article</th><th>Date</th><th></th>
          <?php
          while($row=$res_simple->fetch(PDO::FETCH_BOTH))
          {        
            // echo '<p>'.$email.'</p>';
            echo '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td>
            <td>
            <a href="./index.php?modele=historique&action=installer_form&article='.$row[0].'">
            <button>installer</button>
            </a>
            </td>
            </tr>';
          }  
          while($row=$res_auto->fetch(PDO::FETCH_BOTH))
          {        
            // echo '<p>'.$email.'</p>';
          echo '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td>
           <td><button>installer</button></td>
          </tr>';
          }
          while($row=$res_defini->fetch(PDO::FETCH_BOTH))
          {        
            // echo '<p>'.$email.'</p>';
          echo '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td>
           <td><button>installer</button></td>
          </tr>';
          }
          ?>
      </table>

   </div>
</div><!-- /.container -->