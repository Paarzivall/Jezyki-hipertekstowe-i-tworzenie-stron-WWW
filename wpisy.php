<?php 
	session_start();
	include("tmp/menu.php");
?>

	<section class="container-fluid">
		<section class="row" style="font-size:1.2rem;">
			<?php 
				include("skryptyPHP/dane.php");
				$connection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbDatabase) 
					or die('Brak połączenia z serwerem MySQL.<br />Błąd: '.mysqli_error($connection)); 
				mysqli_set_charset($connection, "utf-8");
			
				$ses=isset($_SESSION["sessionid"]);
			
				if(isset($_SESSION["sessionid"]))
					echo '<h6 class="mx-auto mb-5 text-danger text-center">Pamiętaj, że na stronie głównej pokazany jest <u><b>pierwszy</b></u> post z tej strony!!!</h6>';
			
				$zapytanie="SELECT * FROM wpisy ORDER BY Id DESC";
				$rezultat=mysqli_query($connection, $zapytanie);
				while($bufor=mysqli_fetch_assoc($rezultat))
				{
					echo '<article class="col-10 mt-2 mb-1 mx-auto" style="	border:1px solid black; border-radius:20px;"><aside class="col-12 text-right"> Dodano: '.$bufor['Data'].'</aside><br>';
					if(isset($_SESSION["sessionid"])) echo '<aside class="col-12 text-left"><b>Id: '.$bufor['Id'].'</b></aside>';
					echo '<h3 class="col-12 text-left ml-md-5"><br>'.$bufor["Tytul"].'</h3>';
						echo '<aside class="col-12 text-center">'.$bufor['Tresc'].'</aside></article>';
				}

		
				mysqli_close($connection);	
				?>
		</section>
	</section>
	

	
	<?php
		include("tmp/footer.php");
	?>
</body>
</html>