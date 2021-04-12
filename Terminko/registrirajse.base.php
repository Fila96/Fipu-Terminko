<?php
	ob_start();
	// Provjerava da li smo dosli na ovaj php kod preko gumba submit, ako nismo onda else
	// odvede na stranicu sa koje smo kliknuli
	if(isset($_POST["submit"]))
	{
		// Uzima preko post naredbe sve sto smo stavili u inputs 
		$email = $_POST["email"];
		
		$name = $_POST["name"];
		
		$password = $_POST["passwords"];
		
		$passwordRepeat = $_POST["passwords2"];
		
		
		// Kao sto je include za header, navbar tako i ovdje pozivamo za bazu podataka
		// base.php se spaja sa bazom podataka
		require_once 'base.php';
		
		// Ima funkcije 
		require_once 'funkcije.base.php';
		
		
		// Provjeravamo dal je korisnik upisao sve u inputs
		if(provjeraZaInputs($name, $email, $password, $passwordRepeat) !== false)
		{
			header("location:../registrirajse.php?error=prazaninput");
			exit();
		}
		
		
		// Provjeravamo dal je korisnik upisao ispravno username
		if(provjeraZaUsername($name) !== false)
		{
			header("location: registrirajse.php?error=ime");
			exit();
		}
		
		
		// Provjeravamo dal je korisnik upisao ispravno emails
		if(provjeraZaEmail($email) !== false)
		{
			header("location: registrirajse.php?error=email");
			exit();
		}
		
		
		// Provjeravamo dal je korisnik upisao ispravno lozinke
		if(provjeraZaLozinke($password, $passwordRepeat) !== false)
		{
			header("location: registrirajse.php?error=lozinke");
			exit();
		}
		
		
		// Provjeravamo dal je korisnik vec dodan sa ovakvim emailom
		if(provjeraDaLiPostojiKorisnikVec($conn, $email, $name) !== false)
		{
			header("location:../registrirajse.php?error=imepostoji");
			exit();
		}
		
		// Napravimo novog korisnika u bazi
		napraviNovogKorisnika($conn, $email, $name, $password);
	}
	else
	{
		header("location: registrirajse.php");
		exit();
	}
?>