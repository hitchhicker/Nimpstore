<div class="container">
      <div class="starter-template">
            <h1>Achat</h1>
            <p class="lead">Ci-dessus les articles compatibles avec votre systeme d'exploitation </p>
      </div>
<div class="bs-example" data-example-id="thumbnails-with-custom-content">
    <div class="row">
    <?php 
        $res = get_all_app();
        while($row=$res->fetch(PDO::FETCH_BOTH)){      
      echo '<div class="col-sm-6 col-md-4">
         <div class="thumbnail">
          <img src="./Vue/achat/logo.jpg" alt="Generic placeholder thumbnail">
          <div class="caption">
            <h3>'.$row[0].'  $'.$row[2].'</h3>
            <p>Cree par '.$row[1].'</p>
            <p><a href="#" class="btn btn-primary" role="button">Acheter</a>
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