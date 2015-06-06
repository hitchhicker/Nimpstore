<br>
<div class="container">
    <div class="row">
    <div class="col-xs-6 col-sm-8">


    <div class="panel panel-default">
        <div class="panel-heading">application</div>
            <table class="table">
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                </tr>
                    <?php 
                    while($row=$res_app->fetch(PDO::FETCH_BOTH)){
                                echo '<tr>
                                <td>'.$row[0].'</td>
                                <td>'.$row[1].'</td>
                                </tr>';
                     }?>                     
            </table>
        </div>

    <div class="panel panel-default">
        <div class="panel-heading">Ressouces</div>
            <table class="table">
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                </tr>
                    <?php 
                    while($row=$res_res->fetch(PDO::FETCH_BOTH)){
                                echo '<tr>
                                <td>'.$row[0].'</td>
                                <td>'.$row[1].'</td>
                                </tr>';
                     }?>              
            </table>
    </div>

    </div>

   <div class="col-xs-6 col-sm-4">
<div class="detailBox">
    <div class="titleBox">
      <label>Commentaire</label>
    </div>
  
    <div class="actionBox">
        <ul class="commentList">
             <?php 
                    while($row=$res_com->fetch(PDO::FETCH_BOTH)){
                        echo '
            <li>
                <div class="commenterImage">
                  <img src="http://lorempixel.com/50/50/people/6" />
                </div>
                <div class="commentText">
                    <p class="">
                    ';echo $row[1];echo'</p>
                </div>
            </li>';}?>
        </ul>
    </div>
</div>
</div>
</div>

<div class="form-group">
      <label for="comment">Comment:</label>
      <textarea class="form-control" rows="5" id="comment"></textarea>
    </div>
</div>


