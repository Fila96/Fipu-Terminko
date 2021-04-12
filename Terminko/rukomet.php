<?php
	session_start();
?>

<!DOCTYPE html>



<html lang="en">



	<head>
	
		<title>Kosarka</title>
	  
		<?php include 'include/headers.php';?>
		
	</head>
	
	
	
	<body>
	
		<?php include 'include/navbars.php';?>
		
		
		
		
		<div class="jumbotron text-center">
		
		  <h1>Rukometni termini</h1>
		  
		  <p>Odaberi jedan od rukometnih termina!</p> 
		  
		</div>
		
		
		
		<div class="container">
		
			
			<div class="row">
			
				<div class="col-sm-4">
					<img src="slike/rukomet.jpg" class="img-fluid border border-primary" alt="rukomet">
				</div>
			  
			  
				<div class="col-sm-8">
				
					
					
					<?php
					// Provjeravamo da li je user logiran ili je gost
					if(isset($_SESSION["usersId"]))
					{
						echo '
						Odaberi jedan od datuma za trening. Mozes imati samo jedan termin u tijednu!
						
						<hr>
						
						<form action = "rukomet.base.php" method = "post">
						
							<div class = "form-group mb-3">
							
								<input type="hidden" name = "korisnici" value = ' . $_SESSION["usersEmail"] . '>
							
								<input type="hidden" name = "sportoviNames" value = "rukomet">
								
								<label for = ""> Termin Date & Time </label>
							
								<input type="datetime-local" name = "termini" class="form-control">
						
							</div>
						
						
							<div class = "form-group mb-3">
						
								<button class="btn btn-mb btn-primary" type="submit" name = "submit">Spremi termin!</button>
						
							</div>
						
						</form>
						';
					}
					else
					{
						echo '
						Moras biti ulogiran da odaberes vrijeme treninga! <a class="nav-link" href="logirajse.php">Logiraj se</a>
						 
						';
					}
				?>
					<?php
						if(isset($_GET["error"]))
						{
							if($_GET["error"] == "terminpostojivec")
							{
								echo "<p class = 'text-danger'> Termin je vec registriran od tebe ili drugog korisnika, probaj drugi termin! </p>";
							}
							elseif($_GET["error"] == "updejtantermin")
							{
								echo "<p class = 'text-success'> Tvoj novi termin je zadan! </p>";
							}
							elseif($_GET["error"] == "noviterminzadan")
							{
								echo "<p class = 'text-success'> Upisao si svoj termin, vidimo se! </p>";
							}
						}
					?>
			
					
				</div>
			  
			  
			</div>
		  
		</div>
		
		
	
		<br>
		
		
		<?php include 'include/footers.php';?>
		
	

	</body>
	
	
	
</html>