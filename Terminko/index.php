<?php
	session_start();
?>

<!DOCTYPE html>



<html lang="en">



	<head>
	
		<title>Terminko</title>
	  
		<?php include 'include/headers.php';?>
		
	</head>
	
	
	
	<body>
	
		<?php include 'include/navbars.php';?>
		
		
		
		
		<div class="jumbotron text-center">
		
		  <h1>Dobro došli na Terminko</h1>
		  
		  <p>Na našoj stranici možete se prijaviti na određeni rok za trening!</p> 
		  
		</div>
		
		
		
		<div class="container text-center">
		
			<div class="row row-cols-1 row-cols-md-4 g-2">
					  
				<div class="col">
					
					<div class="card h-100">
					
						<div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
							
							<img
							  src="slike/kosarka.jpg"
							  class="img-fluid"
							/>
							
							<a href="kosarka.php">
							  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
							</a>
							
						</div>
						
						<hr>
						
						<div class="card-body">
						
							<h5 class="card-title">Kosarka</h5>
						
							<p class="card-text">Pogledaj termine za kosarku. Svakog dana mozes trenirati na najboljem sportskom terenu u Zagrebu za jeftino.</p>
				  
							<a href="kosarka.php" class="btn btn-primary">Kosarkaski termini</a>
							
						</div>
					
					</div>
					
				</div>
				
				
				
				<div class="col">
					
					<div class="card h-100">
					
						<img src="slike/nogomet.jpg" class="card-img-top" alt="slika nogomet">
						
						<hr>
						
						<div class="card-body">
						
							<h5 class="card-title">Nogomet</h5>
						
							<p class="card-text">Termini nogometa mogu biti rasporedeni po tvojim potrebama.</p>

							<a href="nogomet.php" class="btn btn-primary">Nogometni termini</a>
							
						</div>
					
					</div>
				
				</div>
				
				
				
				<div class="col">
					
					<div class="card h-100">
					
						<img src="slike/rukomet.jpg" class="card-img-top" alt="slika rukomet">
						
						<hr>
						
						<div class="card-body">
						
							<h5 class="card-title">Rukomet</h5>
						
							<p class="card-text">Nema nista bolje od rukometa i sladoleda nakon njega.</p>
				  
							<a href="rukomet.php" class="btn btn-primary">Rukometni termini</a>
						
						</div>
					
					</div>
				
				</div>
				
				
				
				<div class="col">
					
					<div class="card h-100">
					
						<img src="slike/fitnes.jpg" class="card-img-top" alt="slika fitnes">
						
						<hr>
						
						<div class="card-body">
						
							<h5 class="card-title">Fitness</h5>
						
							<p class="card-text">Zelis nabit misice? Pogledaj termine!</p>
							
							<a href="fitnes.php" class="btn btn-primary">Fitness termini</a>
				  
						</div>
					
					</div>
				
				</div>

			</div>
		  
		</div>
		
		
	
		<br>
		
		
		<?php include 'include/footers.php';?>
		
	

	</body>
	
	
	
</html>