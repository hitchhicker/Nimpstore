<div class="container">
   <?php echo '<br>'; ?>
<form class="form-horizontal" role="form" style="margin-top:20px" id="ajouterTerminal"> 
  <input type="hidden" name="modele" value="historique">
	<input type="hidden" name="action" value="installer">
  <?php echo '<input type="hidden" name="article" value="'
  .$_GET['article'].'">';?>
    <div class="form-group">
      <label for="sel1" class="lead">Quel terminal</label>
      <select name="terminal" id="terminal_option" style="width: 300px;display: inline"class="form-control" id="sel1">
        <?php
        $res = get_terminal_by_app($_SESSION['user_email'],$_GET['article']);
        while ($row=$res->fetch(PDO::FETCH_BOTH))
          {
            echo '<option value="'.$row[0].'">'.$row[0].'</option>';
          }
        ?>
      </select>
    </div>


    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
         <button id="save" type="submit" class="btn btn-default">Confirmer</button>
      </div>
   </div>
    
</form>
</div><!-- /.container -->