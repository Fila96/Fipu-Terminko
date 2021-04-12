<?php

	// Provjerava da li smo dosli na ovaj php kod preko gumba submit, ako nismo onda else
	// odvede na stranicu sa koje smo kliknuli
	if(isset($_POST["submit"]))
	{
		// Uzima preko post naredbe sve sto smo stavili u inputs 
		$email = $_POST["makni"];
		
		// Uzima preko post naredbe sve sto smo stavili u inputs 
		$sportovi = $_POST["sportovi"];
		
		// Kao sto je include za header, navbar tako i ovdje pozivamo za bazu podataka
		// base.php se spaja sa bazom podataka
		require_once 'base.php';
		
		// Ima funkcije 
		require_once 'funkcije.base.php';
		
		// Povezujemo se u bazu podataka
		// ? stavimo da zastitimo bazu od napadaja hakera , tako da cemo koristiti PREPARED STATEMENTS
		$sql = "DELETE FROM sportovi WHERE tkoKorist = ? AND imeSportova = ?;";
		
		// Pripremamo prepared statements
		$stmt = mysqli_stmt_init($conn);
		
		// Provjeravamo da li je sve u redu i da li je baza spojena
		if(!mysqli_stmt_prepare ($stmt, $sql))
		{
			header("location: index.php?error=stmt");
			exit();
		}
		
		// pripremamo sto cemo poslat u bazu , s = string
		mysqli_stmt_bind_param($stmt, "ss", $email, $sportovi);
		
		// Pisanje u bazu tog sto smo pripremili
		mysqli_stmt_execute($stmt);
		
		// Zatvori prepared statements
		mysqli_stmt_close($stmt);
		
		header("location: profili.php?maknut=" . $email);
		
		exit();
	}
?>