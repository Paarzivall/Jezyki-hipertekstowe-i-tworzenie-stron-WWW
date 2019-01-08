<?php
	session_start();
	error_reporting(E_ALL);
	if(!isset($_SESSION["sessionid"]))
	{
		header("HTTP/1.1 403 Forbidden");
		echo ("<h1>403 Forbidden</h1>");
		exit;
	}
	include("dane.php");
	$connection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbDatabase) 
		or die('Brak połączenia z serwerem MySQL.<br />Błąd: '.mysqli_error($connection)); 
		mysqli_set_charset($connection, "utf-8");
	$id=$_POST['Id'];
	$zapytanie="SELECT * from wpisy WHERE Id=$id";
	$rezultat=mysqli_query($connection, $zapytanie);
	
	echo json_encode(mysqli_fetch_assoc($rezultat));
	
	mysqli_close($connection);	
?>