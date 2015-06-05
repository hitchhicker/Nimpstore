<div class="container">
   <?php echo '<br>'; ?>
      <div class="panel panel-default">
   <div class="panel-heading">Description
   </div>
<form class="form-horizontal" role="form" style="margin-top:20px" id="ajouterTerminal">
   <input type="hidden" name="modele" value="terminal">
	<input type="hidden" name="action" value="ajouterTerminal">
    <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Numero Serie</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="firstname" 
            placeholder="AREGHURAE134254N2JLB42" name="numSerie">
      </div>
   </div>
   <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">Designation</label>
      <div class="col-sm-10">
         <!-- <input type="hidden" name="designation> -->
  <select class="form-control" id="designa" name="designation">
    <option>Iphone</option>
    <option>Samsung</option>
    <option>Nexus</option>
    <option>HTC</option>
  </select>
</div>
   </div>
   <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">Systeme exploitation</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="lastname" 
            placeholder="iOs, Android, Symbian" name="se">
      </div>
   </div>
   <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">Version</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="lastname" 
            placeholder="5.0" name="version">
      </div>
   </div>
   <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">Constructeur</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="lastname" 
            placeholder="A,B,C" name="constru">
      </div>
   </div>
   <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
         <button id="save" type="submit" class="btn btn-default">Enregistrer</button>
      </div>
   </div>
</form>
</div><!-- /.container -->
