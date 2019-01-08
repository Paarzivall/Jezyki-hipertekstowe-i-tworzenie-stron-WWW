<?php 
	session_start();
	error_reporting(E_ALL);
	if(!isset($_SESSION["sessionid"]))
	{
		header("HTTP/1.1 403 Forbidden");
		echo ("<h1>403 Forbidden</h1>");
		exit;
	}
	include("tmp/menu.php");
?>
	<!--<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
 	<script>tinymce.init({ selector:'textarea' });</script>-->

	<section class="container-fluid mb-md-5 pb-md-5">
		<section class="row  mb-md-5 pb-md-5">
			<?php
			include("skryptyPHP/dane.php");
				echo '<h4 class="mx-auto mb-5 text-danger">Witaj, '.$_SESSION["login"].'!</h4>';
			?>

			<section class="col-12  mb-md-5 pb-md-3">
				<form method="post">
					<aside class="form-group col-12">
						<h4 class="text-center">Podaj tytuł wpisu:</h4>
						<input type="text" class="form-control col-12 col-lg-5 mx-auto"   placeholder="Podaj tytuł wpisu" name="tytul" required>
					</aside>
					<aside class="form-group justify-content-center">
						<h4 class="text-center">Podaj treść wpisu:</h4>
						<textarea class=" col-12 col-lg-6 offset-lg-3" name="tresc" id="exampleFormControlTextarea1">Treść wpisu(max 1000 znaków)...</textarea>
					</aside>
						<button class="btn btn-primary ml-lg-5 col-12 col-lg-5" type="submit">Dodaj wpis</button>
						<input class="btn btn-primary ml-lg-5 mt-2 mt-lg-0 col-12 col-lg-5" type="reset" value="Wyczyść">
				</form>
				
				<article class="form-group col-12 mt-5">
						<h4 class="text-center">Wybierz Id wpisu do edycji:</h4>
						
						<?php
							$connection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbDatabase) 
							or die('Brak połączenia z serwerem MySQL.<br />Błąd: '.mysqli_error($connection)); 
							mysqli_set_charset($connection, "utf-8");
						echo '<select class="form-control col-6 col-lg-6 mx-auto mb-3" name="edit" id="edit">';
						$zapytanieE="SELECT Id FROM wpisy ";
						$rezultatE=mysqli_query($connection, $zapytanieE);
						
						while($buforE=mysqli_fetch_assoc($rezultatE))
						{
							echo '<option value='.$buforE['Id'].'>'.$buforE['Id'].'</option>';
						}
						echo "</select>";
						?>
						<button class="btn btn-primary  col-12 col-lg-6 offset-lg-3" type="button" id="edytuj">Edytuj wpis</button>
						
					</article>
				
				<div class="modal" tabindex="-1" role="dialog" id="modalEdytor">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edytuj</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="container-fluid">
								<div class="row">
								<div class="col-12">
									<form method="post" action="skryptyPHP/update.php">
										<h4 class="text-center">Tytuł wpisu:</h4>
											<input type="text" class="form-control col-12 col-lg-5 mx-auto"   placeholder="Tytuł wpisu" name="tytul" id="TytulEdit" required>
										<h4 class="text-center">Treść wpisu:</h4>
										<textarea class=" col-12 col-lg-6 offset-lg-3 form-control" name="tresc" id="TrescEdit" rows="8">Treść wpisu(max 1000 znaków)...</textarea>
										<input type="hidden" name="Id" id="IdEdit">
										<button class="btn btn-primary mt-3 col-12 " type="submit">Edytuj wpis</button>
									</form>
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
				
				
				<form method="post">
					<article class="form-group col-12 mt-5">
						<h4 class="text-center">Wybierz Id wpisu, który chcesz usunąć:</h4>
						
						<?php
							$connection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbDatabase) 
							or die('Brak połączenia z serwerem MySQL.<br />Błąd: '.mysqli_error($connection)); 
							mysqli_set_charset($connection, "utf-8");
						echo '<select class="form-control col-6 col-lg-6 mx-auto mb-3" name="del">';
						$zapytanie="SELECT Id FROM wpisy ";
						$rezultat=mysqli_query($connection, $zapytanie);
						
						while($bufor=mysqli_fetch_assoc($rezultat))
						{
							echo '<option value='.$bufor['Id'].'>'.$bufor['Id'].'</option>';
						}
						echo "</select>";
						?>
						<button class="btn btn-primary  col-12 col-lg-6 offset-lg-3" type="submit">Usuń wpis</button>
						
					</article>
				
				</form>
			</section>
		
			<?php 
			
			
			
				if(isset($_POST["tytul"])&&isset($_POST["tresc"]))
				{
					$tytul=$_POST["tytul"];
					$tresc=nl2br($_POST["tresc"]);
			
					$query = "INSERT INTO `wpisy` (`Data`, `Tytul`, `Tresc`) VALUES (?, ?, ?)";
					$statement = $connection->prepare($query);
					$statement->bind_param("sss", $data, $tytul, $tresc);
					$data = date("d-m-Y H:i:s");
					$tytul = $connection->real_escape_string($tytul);
					$tresc = $connection->real_escape_string($tresc);
					$statement->execute();
					$statement->close();
				}
			
				if(isset($_POST["del"]))
				{
					$id=$_POST["del"];
					$zapytanie="DELETE FROM wpisy WHERE Id='$id' ";
					$rezultat=mysqli_query($connection, $zapytanie);			
					if($rezultat)
					{
						echo '<h5 class="mx-auto mb-5 text-danger">Usunięto</h5>>';		
					}
					else
					{
						echo '<h5 class="mx-auto mb-5 text-danger">Nie udało się usunąć postu. Sprawdź czy podałeś dobry numer id</h5>';
					}
				}

		
				mysqli_close($connection);	
			?>
		</section>
	</section>

	<?php
		include("tmp/footer.php");
	?>
<script src="js/edycja.js"></script>
</body>
</html>