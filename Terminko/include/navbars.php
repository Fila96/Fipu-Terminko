	<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top py-1">



		<a class="navbar-brand" href="index.php">Terminko</a>
	  
	  
	  
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		
			<span class="navbar-toggler-icon"></span>
			
		</button>
	  
	  
	  
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
	  
			<ul class="navbar-nav">
		
				<li class="nav-item">
					<a class="nav-link" href="index.php">Početak</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" href="pravila.php">Pravila pridržavanja</a>
				</li>
		  
				<li class="nav-item">
					<a class="nav-link" href="onama.php">O nama</a>
				</li>
		  
				<?php
					// Provjeravamo da li je user logiran ili je gost
					if(isset($_SESSION["usersId"]))
					{
						echo '
						<li class="nav-item">
							<a class="nav-link" href="profili.php">Profil</a>
						</li> 
						
						<li class="nav-item">
							<a class="nav-link" href="odlogirajse.base.php">Odlogiraj se</a>
						</li> 
						';
					}
					else
					{
						echo '
						<li class="nav-item">
							<a class="nav-link" href="logirajse.php">Logiraj se</a>
						</li> 
						';
					}
				?>
				
		  
			</ul>
		
		</div>  
		
		
	  
	</nav>