<div class="bs-example" data-example-id="thumbnails-with-custom-content">
    <div class="row">
    <?php 
        while($row=$res->fetch(PDO::FETCH_BOTH)){      
      echo '<div class="col-sm-6 col-md-4">
         <div class="thumbnail">
          <img src="./Vue/achat/logo.jpg" alt="Generic placeholder thumbnail">
          <div class="caption">
            <h3>'.$row[0].'  $'.$row[2].'</h3>
            <p>Cree par '.$row[1].'</p>
            <p><a  class="btn btn-primary" role="button" href="?modele=achat&action=acheter&article=';echo $row[0].'"'.'; ?>Acheter</a>
            <a href=?modele=achat&action=savoirplus&application=';
            echo $row[0];
            echo' class="btn btn-default" role="button">savoir plus</a></p>
          </div>
        </div>
      </div>';
  }?>
  	</div>
      </div>
    </div>
  </div><!-- /.bs-example -->

</div><!-- /.container -->