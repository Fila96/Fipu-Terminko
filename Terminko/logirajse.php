<?php
	session_start();
?>

<!DOCTYPE html>



<html lang="en">



	<head>
	
		<title>Logiraj se</title>
	  
		<?php include 'include/headers.php';?>
		
	</head>
	
	
	
	<body>
	
		<?php include 'include/navbars.php';?>
		
		
		
		
		<div class="jumbotron text-center">
		
		  <h1>Logiraj se</h1>
		  
		</div>
		
		
		
		<div class="container text-center">
		
			<! --  Ovo je da se vidi poruka samo iz URl-a -->
			
			<?php
				if(isset($_GET["error"]))
				{
					if($_GET["error"] == "nematakvogusera")
					{
						echo "<p class = 'text-danger'> Korisnik nije registriran! </p>";
					}
					elseif($_GET["error"] == "lozinka")
					{
						echo "<p class = 'text-danger'> Krivo upisan korisnik ili lozinka! </p>";
					}
				}
			?>
		
			<form class="form-signin" action = "logirajse.base.php" method = "post">
			
				
				<label for="inputEmail" class="sr-only">Email address</label>
				
				<input type="email" name = "email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
				
				
				<label for="inputPassword" class="sr-only">Password</label>
				
				<input type="password" name = "passwords" id="inputPassword" class="form-control" placeholder="Password" required>
				
				
				<button class="btn btn-lg btn-primary btn-block" type="submit" name = "submit">Ulogiraj se</button>
				
				<br>
				
				<p> Nemas napravljen racun? <a href="registrirajse.php">napravi novi</a>.
				
			</form>
			
		  
		</div>
		
		
	
		<br>
		
		
		<?php include 'include/footers.php';?>
		
	

	</body>
	
	
	
</html>