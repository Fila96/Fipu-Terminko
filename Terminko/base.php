<?php
	
	// Podaci o bazi podataka, svaka baza podataka ima ove 4 varijable
	$serverName = "localhost"; // Local host zato jer koristimo xampp na kompjuteru, da je neki server stavila bi se IP adresa servera gdje je baza
	$dbUsername = "id16551857_root"; // root znaci da je baza na pocetku 
	$dbPassword = "r*!8Oda!424tIHPU"; // Lozinka baze podataka
	$dbName = "id16551857_terminkodatabase"; // Ime baze podataka
	
	// Povezujemo se na bazu podataka sa varijablama napisanim gore
	$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);
	
	// Provjeravamo dal se connection sa bazom podataka ostvarila
	// Ako nije prekini konekciju i posalji poruku u browser
	if(!$conn)
	{
		die("Couldn't connect, connection failed due " . mysqli.connect.error());
	}