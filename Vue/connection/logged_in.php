<div class="navbar-right">
	<p class="navbar-text navbar-left">Signed in as <?php echo $_SESSION['user_email']; ?></p>
	<span class="dropdown">
		<span id="dropdownMenu1" data-toggle="dropdown" class="glyphicon glyphicon glyphicon-user white" aria-hidden="true" aria-expanded="true"></span>
  			<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    			<li role="presentation"><a role="menuitem" tabindex="-1" href="?modele=terminal">Mes terminaux</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="?model=historique">Mes achats</a></li>
			    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Installation</a></li>
			</ul>
		</span>
	<button id="deconnexion" type="submit" class="btn btn-default navbar-btn" ><a href="./index.php?action=signout">
	Déconnexion</a>
	</button>     
</div>
    
    </div><!--/.navbar-collapse -->
  </div>
</nav>



