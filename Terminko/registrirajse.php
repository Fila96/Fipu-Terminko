<?php
	session_start();
?>

<!DOCTYPE html>



<html lang="en">



	<head>
	
		<title>Napravi novi racun</title>
	  
		<?php include 'include/headers.php';?>
		
	</head>
	
	
	
	<body>
	
		<?php include 'include/navbars.php';?>
		
		
		
		
		<div class="jumbotron text-center">
		
		  <h1>Napravi novi racun</h1>
		  
		  <p>Izrada novog racuna je lagana, a sa njime mozes se pridruziti terminku</p> 
		  
		</div>
		
		
		
		<div class="container">
		
			<! --  Ovo je da se vidi poruka samo iz URl-a -->
			
			<?php
				if(isset($_GET["error"]))
				{
					if($_GET["error"] == "lozinke")
					{
						echo "<p class = 'text-danger'> Lozinke nisu iste! </p>";
					}
					if($_GET["error"] == "imepostoji")
					{
						echo "<p class = 'text-danger'> Korisnik vec postoji! </p>";
					}
					elseif($_GET["error"] == "Null")
					{
						echo "<p class = 'text-success'> Korisnik napravljen! </p>";
					}
				}
			?>
		
			<form class="form-signin" action = "registrirajse.base.php" method = "post">
			
				
				<label for="inputEmail" class="sr-only">Email address</label>
				
				<input type="email" name = "email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
				
				
				<label for="inputName" class="sr-only">Username</label>
				
				<input type="text" name = "name" id="inputName" class="form-control" placeholder="Username" required autofocus>
				
				
				<label for="inputPassword" class="sr-only">Password</label>
				
				<input type="password" name = "passwords" id="inputPassword" class="form-control" placeholder="Password" required>
				
				
				<label for="inputPassword2" class="sr-only">Repeat Password</label>
				
				<input type="password" name = "passwords2" id="inputPassword2" class="form-control" placeholder="Repear Password" required>
				
				
				<button class="btn btn-lg btn-primary btn-block" type="submit" name = "submit">Registriraj se</button>
				
				<br>
				
				<p> Imas vec napravljen racun? <a href="logirajse.php">logiraj se</a>.
				
			</form>
		  
		</div>
		
		
	
		<br>
		
		
		<?php include 'include/footers.php';?>
		
	

	</body>
	
	
	
</html>