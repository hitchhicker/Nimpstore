<div class="container">
   <?php echo '<br>'; ?>
<form class="form-horizontal" role="form" style="margin-top:20px" id="ajouterTerminal"> 
  <input type="hidden" name="modele" value="terminal">
	<input type="hidden" name="action" value="supprimerTerminal">
    <div class="form-group">
      <label for="sel1" class="lead">Quel terminal</label>
      <select name="terminal" id="terminal_option" style="width: 300px;display: inline"class="form-control" id="sel1">
        <?php
        $res = get_terminal($_SESSION['user_email']);
        while ($row=$res->fetch(PDO::FETCH_BOTH))
          {
            echo '<option value="'.$row[1].'">'.$row[1].'</option>';
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
