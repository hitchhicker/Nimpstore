<div class="container">
   <?php echo '<br>'; ?>
      <div class="panel panel-default">
   <div class="panel-heading">Ajouter un editeur
   </div>

<form class="form-horizontal" role="form" style="margin-top:20px" id="ajouterEditeur">
   <input type="hidden" name="modele" value="editeur">
	<input type="hidden" name="action" value="ajouterEditeur">

    <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Nom</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="firstname" name="nom">
      </div>
   </div>

   <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">Contact</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" id="lastname" name="contact">
    </div>
</div>

   <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">URL</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="lastname" name="url">
      </div>
   </div>
   

   <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
         <button id="save" type="submit" class="btn btn-default">Enregistrer</button>
      </div>
   </div>

</form>
</div><!-- /.container -->
