<button type="button" class="btn btn-primary btn-block achat" data-toggle="modal" 
data-target="#exampleModal" >Achat Simple</button>
<button type="button" class="btn btn-primary btn-block achat">Abonnement</button>


<div class="modal fade" id="exampleModal" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4  >Paiement</h4>
      </div>
      <!-- <div class="modal-body"> -->
        <form id="payment" class="form-horizontal" role="form">
        	<input type="hidden" name="modele" value="achat">
		  	<input type="hidden" name="action" value="confirmer">
		  	<?php echo '<input type="hidden" name="article" value="'.$_GET['article'].'">';?>
   			<div class="form-group">
      			<label for="firstname" class="col-sm-2 control-label">Numero</label>
      				<div class="col-sm-10">
         				<input style="width: 350px" type="text" name="carte" class="form-control" id="firstname" placeholder="Votre numero de la carte bancaire">
      				</div>
   			</div>
		<div class="radio">
		  <label>  	
		    <input type="radio" name="optionsPay" id="optionsRadios2" value="cb" checked>
		    <p style="font-weight:bold">Payer directement:</p>
			<p >Prix:
				<?php $res_art = get_article($_GET['article']);
				$row=$res_art->fetch(PDO::FETCH_BOTH);
				echo $row[1]
				?>
			</p>
		  </label>
		</div>


		<div class="radio"	>
		  <label>
		    <input type="radio" name="optionsPay" id="optionsRadios1" value="prepaye" >
		    <p style="font-weight:bold">Prepaye: A FAIRE</p>
		  </label>
		</div>   		
		</form>		
      <!-- </div> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button style="float: right" type="submit" form="payment" class="btn btn-default">Confirmer</button>

      </div>
    </div>
  </div>
</div>



