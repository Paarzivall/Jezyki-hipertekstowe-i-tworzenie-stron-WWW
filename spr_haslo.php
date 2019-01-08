<?php
	session_start();
	include("tmp/menu.php");
?>

	<section class="container-fluid mt-3 mt-md-4   mb-md-5 pb-md-5">
		<article class="row mb-md-5 pb-md-5">
			<table class="table table-hover text-center mt-3 mb-md-5 pb-md-5" style="font-size:1.2rem;">
				<thead>
					<tr>
						<th scope="col">Jakość hasła</th>
						<th scope="col">Jak stworzyć?</th>
					</tr>
				</thead>
			<tbody>
		
			<?php
				include("skryptyPHP/dane.php");
				
				$connection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbDatabase) 
					or die('Brak połączenia z serwerem MySQL.<br />Błąd: '.mysqli_error($connection)); 
					mysqli_set_charset($connection, "utf-8");			
					$connection->set_charset("utf8");
					$zapytanie="SELECT * FROM hasla ORDER BY Id ASC";
					$rezultat=mysqli_query($connection, $zapytanie);

					while($bufor=mysqli_fetch_assoc($rezultat))
					{
						echo '<tr><td>'.$bufor['Jakosc'].'</td>';
						echo '<td>'.$bufor['Zasada'].'</td></tr>';
					}
				echo '</tbody></table>';
				mysqli_close($connection);
			
			?>
				<form class="col-10 mx-auto mb-md-5 pb-md-5">

						<h5 class="text-center">Podaj swoje hasło(Bez obaw nie będzie ono nigdzie zapisane):</h5>
						<input type="password" class="form-control col-lg-6 mx-auto" id="pas" placeholder="Podaj hasło" onkeyup="Sprawdz()">
				</form>
				<br>
				<p id="wynik" class="col-12 text-center"></p>
				<p class="col-8 col-lg-4 mx-auto mb-md-5" id="spr_kolor"></p>
			<script>
				function Sprawdz()
				{
					var pas=document.getElementById("pas").value;

					var wzorD=/^[a-zA-Z0-9!@#$%\^&*_]{7,}$/;
					var wzorS=/^[a-zA-Z0-9!@#$%\^&*_]{4,6}$/;


					if(pas=="")
					{
						document.getElementById("wynik").innerHTML="<br/>HASŁO JEST PUSTE";
						document.getElementById("wynik").style.color="red";
						document.getElementById("spr_kolor").style.background="red";
					}
					else
					{
						if(wzorD.test(pas))
						{
							document.getElementById("wynik").innerHTML="<br/>HASŁO JEST DOBRE";
							document.getElementById("wynik").style.color="green";
							document.getElementById("spr_kolor").style.background="linear-gradient(to right, red,orange,yellow,green)";
						}
						else
						{
							if(wzorS.test(pas))
							{
								document.getElementById("wynik").innerHTML="<br/>HASŁO JEST ŚREDNIE";
								document.getElementById("wynik").style.color="blue";
								document.getElementById("spr_kolor").style.background="linear-gradient(to right, red,orange,yellow)";
							}
							else 
							{
								document.getElementById("wynik").innerHTML="<br/>HASŁO JEST SŁABE";
								document.getElementById("wynik").style.color="yellow";
								document.getElementById("spr_kolor").style.background="linear-gradient(to right, red,orange)";
							}
						}
					}
				}
			</script>
		</article>
	</section>

	<?php
		include("tmp/footer.php");
	?>
</body>
</html>