<div class="container">
      <div class="starter-template">
            <h1>Achat</h1>
            <p class="lead">Ci-dessus les articles compatibles avec votre systeme d'exploitation </p>
      </div>


  <div class="form-group">
  <label for="sel1" class="lead">Quel terminal</label>
    <select id="terminal_option" style="width: 300px;display: inline"class="form-control" id="sel1">
      <?php
      if(isset($_GET['terminal']))
      {
        echo '<option>'.$_GET['terminal'].'</option>';
      }
      else 
        echo '<option>Tout</option>';
      if(isset($_SESSION['user_email']))
      {
      $res = get_terminal($_SESSION['user_email']);
      $count = 0;
      while ($row=$res->fetch(PDO::FETCH_BOTH))
        {
          if(isset($_GET['terminal']) && $_GET['terminal']==$row[1] && $count!=1)
          {
            echo '<option>Tout</option>';
            $count = 1;
            continue;
          }
          echo '<option>'.$row[1].'</option>';
        }
      }
    ?>
    </select>
    </div>
   <!--      <datalist id = "styles">
          <input type = text list = "styles" class="form-control" placeholder="Style" id="style" name="style">
    
      </datalist> -->



      <div class="btn-group btn-group-justified" role="group" aria-label="...">
  <div class="btn-group" role="group">
    <a href="?modele=achat&systeme=iOs"><button type="button" class="btn btn-default">iOs</button></a>
  </div>
  <div class="btn-group" role="group">
    <a href="?modele=achat&systeme=Android"><button type="button" class="btn btn-default">Android</button></a>
  </div>
  <div class="btn-group" role="group">
    <a href="?modele=achat&systeme=Autre"><button type="button" class="btn btn-default">Autre</button></a>
  </div>
</div>
<br>
