<div class="container">
      <div class="starter-template">
            <h1>Editeurs</h1>
            <p class="lead">En tant que administrateur vous pouvez ajouter/supprimer des editeurs </p>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">Editeurs
            <a href="?modele=editeur&action=ajouterForm">
                <span class="glyphicon glyphicon-plus" aria-hidden="true" style="margin: 0px 10px">
                </span>
            </a>
                <span class="glyphicon glyphicon-minus" aria-hidden="true" style="margin: 0px 5px">
                </span>
        </div>
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Contact</th>
                    <th>URL</th>
                </tr>
                    <?php 
                    $sql = $GLOBALS['conn']->prepare("SELECT * FROM Editeur;");
                    $sql->execute();
                     while($row=$sql->fetch(PDO::FETCH_BOTH)){
                         echo '<tr>
                                <td>'.$row[0].'</td>
                                <td>'.$row[1].'</td>
                                <td>'.$row[2].'</td>
                                <td>'.$row[3].'</td>
                                </tr>';
                     }
                    ?>  
            </table>
		</div>

</div><!-- /.container -->