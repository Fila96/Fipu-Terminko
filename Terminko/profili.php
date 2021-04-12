<?php
	session_start();
?>

<!DOCTYPE html>



<html lang="en">



	<head>
	
		<title>Profil</title>
	  
		<?php include 'include/headers.php';?>
		
	</head>
	
	
	
	<body>
	
		<?php include 'include/navbars.php';?>
		
		
		
		
		<div class="jumbotron text-center">
		
		  <h1>Tvoj Profil</h1>
		  
		  <p>Ovdje mozes vidjeti sve treninge koje imas i upravljati njima!</p> 
		  
		</div>
		
		
		
		<div class="container">
		
		
			<div class="row">
			
				<div class="col-sm-4">
					<?php
						// Provjeravamo da li je user logiran ili je gost
						if(isset($_SESSION["usersId"]))
						{
							echo '
							Username: ' . $_SESSION["usersName"] . '';
							
							echo '<br>';
							
							echo '
							Email: ' . $_SESSION["usersEmail"] . '';
						}
						else
						{
							echo '
							Moras biti ulogiran da vidis svoj profil
							 
							';
						}
					?>
				</div>
				
				
				<div class="col-sm-8">
					<?php
						// Provjeravamo da li je user logiran ili je gost
						if(isset($_SESSION["usersId"]))
						{
							if($_SESSION["usersName"] === "admin")
							{
								echo "Imas admin privilegije!<br>";
								
								// Kao sto je include za header, navbar tako i ovdje pozivamo za bazu podataka
								// base.php se spaja sa bazom podataka
								require_once 'base.php';
								
								// Ima funkcije 
								require_once 'funkcije.base.php';
								
								// Provjeravamo sada da li trenutni korisnik ima zadan termin, ako da onda mjenjamo na novi termin
								// Povezujemo se u bazu podataka
								// ? stavimo da zastitimo bazu od napadaja hakera , tako da cemo koristiti PREPARED STATEMENTS
								
								$sql = "SELECT * FROM sportovi WHERE tkoKorist != ?;";
								
								// Pripremamo prepared statements
								$stmt = mysqli_stmt_init($conn);
								
								// Provjeravamo da li je sve u redu i da li je baza spojena
								if(!mysqli_stmt_prepare ($stmt, $sql))
								{
									header("location: index.php?error=stmt2");
									exit();
								}
								
								// pripremamo sto cemo poslat u bazu , s = string
								mysqli_stmt_bind_param($stmt, "s", $_SESSION["usersEmail"]);
								
								// Pisanje u bazu tog sto smo pripremili
								mysqli_stmt_execute($stmt);
								
								// Dobivamo nazad potvrdu
								$resultBaze = mysqli_stmt_get_result($stmt);
								
								// Uzimamo podatke iz baze i provjeravamo sa resultom
								// Variable row dobiva ono sto funkcija returna
								
								while($row = mysqli_fetch_assoc($resultBaze))
								{
									echo $row['tkoKorist']." ";
									
									echo $row['termini']." ";
									
									echo $row['imeSportova'] . ' 
									<form action = "admin.base.php" method = "post">
						
										<div class = "form-group mb-3">
										
											<input type="hidden" name = "makni" value = ' . $row['tkoKorist'] . '>
											
											<input type="hidden" name = "sportovi" value = ' . $row['imeSportova'] . '>
										
										</div>
									
									
										<div class = "form-group mb-3">
									
											<button class="btn btn-mb btn-primary" type="submit" name = "submit">Makni!</button>
									
										</div>
									
									</form>
									';
									
									echo "<hr><br>";
								}
								
								// Zatvori prepared statements
								mysqli_stmt_close($stmt);
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