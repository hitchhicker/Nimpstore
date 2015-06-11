<div class="container">
    <div class="row">
    <div class="col-xs-6 col-sm-8">


    <div class="panel panel-default">
        <div class="panel-heading">Application<span style="color: orange;font-size:20px">&nbsp;<?php echo $res_note->fetch(PDO::FETCH_BOTH)[0];?></span>
           <button type="submit" class="btn btn-default" style="float:right"><a href=<?php echo'"'."?modele=achat&action=acheter&article=".$_GET['application'].'"'; ?>>Acheter</a></button>
        </div>
            <table class="table">
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                </tr>
                    <?php 
                    while($row=$res_app->fetch(PDO::FETCH_BOTH)){
                                echo '<tr>
                                <td style="width: 400px;">'.$row[0].'</td>
                                <td>'.$row[1].'</td>
                                <td></td>
                                </tr>';
                     }?>                     
            </table>
        </div>

    <div class="panel panel-default">
        <div class="panel-heading">Ressouces<span style="color: orange;font-size:20px">&nbsp;
            <?php 
            $res_note = get_note_moyenne($row[0]);
            echo $res_note->fetch(PDO::FETCH_BOTH)[0];?></span>
          <!-- TODO -->
        </div>
            <table class="table">
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                </tr>
                    <?php 
                    while($row=$res_res->fetch(PDO::FETCH_BOTH)){
                                echo '<tr>
                                <td style="width: 400px;">'.$row[0];
                                $res_note = get_note_moyenne($row[0]);
                                echo '&nbsp;<span style="color: orange;font-size:20px">'.$res_note->fetch(PDO::FETCH_BOTH)[0].'</span></td>';
                                echo '<td>'.$row[1].'</td>
                                <td><button type="submit" class="btn btn-default" style="float:right;"><a href="?modele=achat&action=acheter&article='.$row[0].'" >Acheter</a></button><td>
                                </tr>
                                ';
                     }?>              
            </table>
    </div>

    </div>

   <div class="col-xs-6 col-sm-4">
<div class="detailBox">
    <div class="titleBox">
      <label>Avis</label>
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
<br>
 <div class="panel panel-default">
        <div class="panel-heading">Description d'editeur</div>
            <table class="table">
                <tr>
                    <th>Nom</th>
                    <th>Contact</th>
                    <th>URL</th>
                </tr>
                    <?php 
                    while($row=$res_editeur->fetch(PDO::FETCH_BOTH)){
                                echo '<tr>
                                <td>'.$row[0].'</td>
                                <td>'.$row[1].'</td>
                                <td>'.$row[2].'</td>
                                <td></td>
                                </tr>';
                     }?>                     
            </table>
        </div>
<form role="form">
    <input type="hidden" name="modele" value="achat">
    <input type="hidden" name="action" value="savoirplus">
    <input type="hidden" name="application" value=<?php echo '"'.$_GET['application'].'"'?>>
   <div class="form-group">
      <label for="name">Note</label>
      <input type="text" class="form-control" id="name" 
         placeholder="1-5" name="note">
   </div>
   <div class="form-group">
      <label for="comment">Avis:</label>
      <textarea class="form-control" rows="5" id="comment" name="commentaire"></textarea>
    </div>
   <button type="submit" class="btn btn-default">Ajouter</button>
</form>




