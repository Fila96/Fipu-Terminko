<?php
	// Provjeravamo dal je korisnik upisao sve u inputs
	function provjeraZaInputs($name, $email, $password, $passwordRepeat)
	{
		$result;
		
		if(empty($name) || empty($email) || empty($password) || empty($passwordRepeat))
		{
			$result = true;
		}
		else
		{
			$result = false;
		}
		
		return $result;
	}
	
	
	
	// Provjeravamo dal je korisnik upisao ispravno username
	function provjeraZaUsername($name)
	{
		$result;
		
		if(!preg_match("/^[a-zA-Z0-9]*$/", $username))
		{
			$result = true;
		}
		else
		{
			$result = false;
		}
		
		return $result;
	}
	
	
	
	// Provjeravamo dal je korisnik upisao ispravno emails
	function provjeraZaEmail($email)
	{
		$result;
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$result = true;
		}
		else
		{
			$result = false;
		}
		
		return $result;
	}
	
	
	
	// Provjeravamo dal je korisnik upisao ispravno lozinke
	function provjeraZaLozinke($password, $passwordRepeat)
	{
		$result;
		
		if($password !== $passwordRepeat)
		{
			$result = true;
		}
		else
		{
			$result = false;
		}
		
		return $result;
	}
	
	
	
	// Provjeravamo dal je korisnik vec dodan sa ovakvim emailom
	function provjeraDaLiPostojiKorisnikVec($conn, $email, $name)
	{
		// Povezujemo se u bazu podataka
		// ? stavimo da zastitimo bazu od napadaja hakera , tako da cemo koristiti PREPARED STATEMENTS
		$sql = "SELECT * FROM users WHERE usersEmail = ? OR usersName = ?;";
		
		// Pripremamo prepared statements
		$stmt = mysqli_stmt_init($conn);
		
		// Provjeravamo da li je sve u redu i da li je baza spojena
		if(!mysqli_stmt_prepare ($stmt, $sql))
		{
			header("location:../registrirajse.php?error=stmt");
			exit();
		}
		
		// pripremamo sto cemo poslat u bazu , s = string
		mysqli_stmt_bind_param($stmt, "ss", $email, $name);
		
		// Pisanje u bazu tog sto smo pripremili
		mysqli_stmt_execute($stmt);
		
		// Dobivamo nazad potvrdu da li je novi user dodan
		$resultBaze = mysqli_stmt_get_result($stmt);
		
		// Uzimamo podatke iz baze i provjeravamo sa resultom
		// Variable row dobiva ono sto funkcija returna
		if($row = mysqli_fetch_assoc($resultBaze))
		{
			// Ako korisnik postoji prokazi sav njegov info iz baze
			return $row;
		}
		else
		{
			$result = false;
			return $result;
		}
		
		// Zatvori prepared statements
		mysqli_stmt_close($stmt);
	}
	
	
	
	// Provjeravamo dal je date vec dodan
	function provjeraDaLiPostojiZakazanTermin($conn, $email, $imeSportova, $termini)
	{
		// Povezujemo se u bazu podataka
		// ? stavimo da zastitimo bazu od napadaja hakera , tako da cemo koristiti PREPARED STATEMENTS
		$sql = "SELECT * FROM sportovi WHERE imeSportova = ? AND termini = ?;";
		
		// Pripremamo prepared statements
		$stmt = mysqli_stmt_init($conn);
		
		// Provjeravamo da li je sve u redu i da li je baza spojena
		if(!mysqli_stmt_prepare ($stmt, $sql))
		{
			header("location:../index.php?error=stmt");
			exit();
		}
		
		
		// pripremamo sto cemo poslat u bazu , s = string
		mysqli_stmt_bind_param($stmt, "ss", $imeSportova, $termini);
		
		// Pisanje u bazu tog sto smo pripremili
		mysqli_stmt_execute($stmt);
		
		// Dobivamo nazad potvrdu
		$resultBaze = mysqli_stmt_get_result($stmt);
		
		// Uzimamo podatke iz baze i provjeravamo sa resultom
		// Variable row dobiva ono sto funkcija returna
		
		if($row = mysqli_fetch_assoc($resultBaze))
		{
			// Ako postoji termin posalji poruku
			$result = 0;
			return $result;
		}
		else
		{
			// Provjeravamo sada da li trenutni korisnik ima zadan termin, ako da onda mjenjamo na novi termin
			// Povezujemo se u bazu podataka
			// ? stavimo da zastitimo bazu od napadaja hakera , tako da cemo koristiti PREPARED STATEMENTS
			
			$sql = "SELECT * FROM sportovi WHERE imeSportova = ? AND tkoKorist = ?;";
			
			// Pripremamo prepared statements
			$stmt = mysqli_stmt_init($conn);
			
			// Provjeravamo da li je sve u redu i da li je baza spojena
			if(!mysqli_stmt_prepare ($stmt, $sql))
			{
				header("location:../index.php?error=stmt2");
				exit();
			}
			
			// pripremamo sto cemo poslat u bazu , s = string
			mysqli_stmt_bind_param($stmt, "ss",$imeSportova, $email);
			
			// Pisanje u bazu tog sto smo pripremili
			mysqli_stmt_execute($stmt);
			
			// Dobivamo nazad potvrdu
			$resultBaze = mysqli_stmt_get_result($stmt);
			
			// Uzimamo podatke iz baze i provjeravamo sa resultom
			// Variable row dobiva ono sto funkcija returna
			if($row = mysqli_fetch_assoc($resultBaze))
			{
				// Ako postoji
				// Povezujemo se u bazu podataka
				// ? stavimo da zastitimo bazu od napadaja hakera , tako da cemo koristiti PREPARED STATEMENTS
				$sql = "UPDATE sportovi SET imeSportova = ? , termini = ? WHERE imeSportova = ? AND tkoKorist = ?;";
				
				// Pripremamo prepared statements
				$stmt = mysqli_stmt_init($conn);
				
				// Provjeravamo da li je sve u redu i da li je baza spojena
				if(!mysqli_stmt_prepare ($stmt, $sql))
				{
					header("location:../index.php?error=stmt3");
					exit();
				}
				
				// pripremamo sto cemo poslat u bazu , s = string
				mysqli_stmt_bind_param($stmt, "ssss", $imeSportova, $termini, $imeSportova, $email);
				
				// Pisanje u bazu tog sto smo pripremili
				mysqli_stmt_execute($stmt);
				
				// Zatvori prepared statements
				mysqli_stmt_close($stmt);
				
				$result = 1;
				return $result;
			}
			else
			{
				// Ako je prazno
				$result = 2;
				return $result;
			}
		}
		
		// Zatvori prepared statements
		mysqli_stmt_close($stmt);
	}
	
	
	
	// Napravimo novi date u bazi
	function napraviNoveTermine($conn, $email, $imeSportova, $termini)
	{
		// Povezujemo se u bazu podataka
		// ? stavimo da zastitimo bazu od napadaja hakera , tako da cemo koristiti PREPARED STATEMENTS
		$sql = "INSERT INTO sportovi (imeSportova, termini, tkoKorist) VALUES (?, ?, ?);";
		
		// Pripremamo prepared statements
		$stmt = mysqli_stmt_init($conn);
		
		// Provjeravamo da li je sve u redu i da li je baza spojena
		if(!mysqli_stmt_prepare ($stmt, $sql))
		{
			header("location:../index.php?error=stmt");
			exit();
		}
		
		// pripremamo sto cemo poslat u bazu , s = string
		mysqli_stmt_bind_param($stmt, "sss", $imeSportova, $termini, $email);
		
		// Pisanje u bazu tog sto smo pripremili
		mysqli_stmt_execute($stmt);
		
		// Zatvori prepared statements
		mysqli_stmt_close($stmt);
		
	}
	
	
	
	// Napravimo novog korisnika u bazi
	function napraviNovogKorisnika($conn, $email, $name, $password)
	{
		// Povezujemo se u bazu podataka
		// ? stavimo da zastitimo bazu od napadaja hakera , tako da cemo koristiti PREPARED STATEMENTS
		$sql = "INSERT INTO users (usersName, usersEmail, usersPass) VALUES (?, ?, ?);";
		
		// Pripremamo prepared statements
		$stmt = mysqli_stmt_init($conn);
		
		// Provjeravamo da li je sve u redu i da li je baza spojena
		if(!mysqli_stmt_prepare ($stmt, $sql))
		{
			header("location:../registrirajse.php?error=stmt");
			exit();
		}
		
		// Hash passwords
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		
		// pripremamo sto cemo poslat u bazu , s = string
		mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPassword);
		
		// Pisanje u bazu tog sto smo pripremili
		mysqli_stmt_execute($stmt);
		
		// Zatvori prepared statements
		mysqli_stmt_close($stmt);
		
		header("location:../index.php");
		exit();
	}
	
	
	
	// Provjeravamo dal je korisnik upisao sve u inputs
	function provjeraZaInputsLogin($email, $password)
	{
		$result;
		
		if(empty($email) || empty($password))
		{
			$result = true;
		}
		else
		{
			$result = false;
		}
		
		return $result;
	}
		
	
	
	// Provjera jos jedna i logiranje korisnika
	function ulogirajKorisnika($conn, $email, $password)
	{
		$userExists = provjeraDaLiPostojiKorisnikVec($conn, $email, $email);
		
		if($userExists === false)
		{
			header("location:../logirajse.php?error=nematakvogusera");
			exit;
		}
		
		// Uzimamo iz base userPass za korisnika koji se logira
		$passHashed = $userExists["usersPass"];
		
		// Provjeravamo lozinke iz baze i onu upisanu
		$provjeriLozinku = password_verify($password, $passHashed);
		
		if($provjeriLozinku === false)
		{
			header("location:../logirajse.php?error=lozinka");
			exit;
		}
		elseif($provjeriLozinku === true) // OTVORI SESSION
		{
			session_start();
			
			// superglobal variable za id korisnika
			$_SESSION["usersId"] = $userExists["usersId"];
			
			// superglobal variable za username korisnika
			$_SESSION["usersName"] = $userExists["usersName"];
			
			// superglobal variable za username korisnika
			$_SESSION["usersEmail"] = $userExists["usersEmail"];
			
			header("location:../index.php");
			exit;
			
		}
	}