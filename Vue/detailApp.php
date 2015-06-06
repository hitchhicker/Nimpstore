<div class="container">
 <div class="panel panel-default">
        <div class="panel-heading">application</div>
            <table class="table">
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                </tr><?php  while($row=$res1->fetch(PDO::FETCH_BOTH)){
                                echo '<tr>
                                <td>'.$row[0].'</td>
                                <td>'.$row[1].'</td>
                                </tr>';
                     }?>   
                     
            </table>
        </div>
    </div> 
    <div class="panel panel-default">
        <div class="panel-heading">Ressouces</div>
            <table class="table">
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                </tr>
                    <?php 
                    while($row=$res2->fetch(PDO::FETCH_BOTH)){
                                echo '<tr>
                                <td>'.$row[0].'</td>
                                <td>'.$row[1].'</td>
                                </tr>';
                     }?>              
            </table>
        </div>
    </div>
</div>