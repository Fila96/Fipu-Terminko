<?php

	// Provjerava da li smo dosli na ovaj php kod preko gumba submit, ako nismo onda else
	// odvede na stranicu sa koje smo kliknuli
	if(isset($_POST["submit"]))
	{
		// Uzima preko post naredbe sve sto smo stavili u inputs 
		$email = $_POST["korisnici"];
		
		// Uzima preko post naredbe sve sto smo stavili u inputs 
		$imeSportova = $_POST["sportoviNames"];
		
		// Uzima preko post naredbe sve sto smo stavili u inputs
		$termini = $_POST["termini"];
		
		// Kao sto je include za header, navbar tako i ovdje pozivamo za bazu podataka
		// base.php se spaja sa bazom podataka
		require_once 'base.php';
		
		// Ima funkcije 
		require_once 'funkcije.base.php';
		
		$result = provjeraDaLiPostojiZakazanTermin($conn, $email, $imeSportova, $termini);
		
		// Provjerimo dal termin vec postoji
		if($result === 0)
		{
			header("location: nogomet.php?error=terminpostojivec");
			exit();
		}
		elseif($result === 1)
		{
			header("location: nogomet.php?error=updejtantermin");
			exit();
		}
		
		napraviNoveTermine($conn, $email, $imeSportova, $termini);
		
		header("location: nogomet.php?error=noviterminzadan");
		exit();
	}
	else
	{
		header("location: index.php");
		exit();
	}
?>