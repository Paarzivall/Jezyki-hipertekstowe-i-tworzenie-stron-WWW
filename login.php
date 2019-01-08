<?php
	session_start();
	include("skryptyPHP/dane.php");
		$connection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbDatabase) 
			or die('Brak połączenia z serwerem MySQL.<br />Błąd: '.mysqli_error($connection)); 
		mysqli_set_charset($connection, "utf-8");
		$login=mysqli_real_escape_string($connection, $_POST["log"]);
		$query="SELECT * FROM users WHERE login=\"".$login."\"LIMIT 1";
		$result=mysqli_query($connection, $query);
			if(!$result || !mysqli_num_rows($result))
			{
				die("Błędna nazwa użytkownika lub hasło!");
			}
			else
			{
				$res=mysqli_fetch_assoc($result);
				if($_POST["pas"]==$res["password"])
				{
					$_SESSION["login"]=$login;
					$_SESSION["sessionid"]=uniqid();
					header("Location: admin.php");	
				}
				else
				{
					echo "Błędna nazwa użytkownika lub hasło!";
				}
			}		
	mysqli_close($connection);
?>