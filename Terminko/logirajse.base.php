<?php

	// Provjerava da li smo dosli na ovaj php kod preko gumba submit, ako nismo onda else
	// odvede na stranicu sa koje smo kliknuli
	if(isset($_POST["submit"]))
	{
		// Uzima preko post naredbe sve sto smo stavili u inputs 
		$email = $_POST["email"];
		
		$password = $_POST["passwords"];
		
		// Kao sto je include za header, navbar tako i ovdje pozivamo za bazu podataka
		// base.php se spaja sa bazom podataka
		require_once 'base.php';
		
		// Ima funkcije 
		require_once 'funkcije.base.php';
		
		// Provjeravamo dal je korisnik upisao sve u inputs
		if (provjeraZaInputsLogin($email, $password) !== false)
		{
			header("location: logirajse.php?error=kriviinput");
			exit;
		}
		
		
		// Provjera jos jedna i logiranje korisnika
		ulogirajKorisnika($conn, $email, $password);
	}
	else
	{
		header("location: logirajse.php");
		exit();
	}
?>