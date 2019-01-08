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
		or die('Brak po³¹czenia z serwerem MySQL.<br />B³¹d: '.mysqli_error($connection)); 
		mysqli_set_charset($connection, "utf-8");
	$zapytanie="UPDATE wpisy set `Tytul`=?, `Tresc`=? WHERE `Id`=?";
	$statement=$connection->prepare($zapytanie);
	$statement->bind_param("ssi",$Tytul, $Tresc, $Id);
	$Tytul=$_POST['tytul'];
	$Tresc=$_POST['tresc'];
	$Id=$_POST['Id'];
	$statement->execute();
	$statement->close();
	mysqli_close($connection);	
	header("Location:./admin.php");
?>