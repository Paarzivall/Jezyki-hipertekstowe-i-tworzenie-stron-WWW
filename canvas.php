<?php
	session_start();
	include("tmp/menu.php");
	?>

	<section class="container-fluid mb-md-4 pb-md-3">
        <article class="row">
            <canvas id="can" class="col-10 col-lg-4 mt-5 offset-1"  ></canvas>
        	<script>
       			var canvas = document.getElementById("can");
    			var wysokosc=-150;
    			var speed=2.5;

    			function draw() 
				{
        			var ctx = canvas.getContext("2d");
        			ctx.clearRect(0,0,400,150);

        			ctx.save();
        			ctx.translate(0,wysokosc);	
        			
					ctx.beginPath();  
        				ctx.strokeStyle="rgba(255,0,0,0.4)";
        				ctx.fillStyle="rgba(255,0,0,0.3)";
        				ctx.moveTo(130,0);
        				ctx.lineTo(130,70);
        				ctx.lineTo(110,70);
        				ctx.lineTo(140,150);
        				ctx.lineTo(170,70);
       					ctx.lineTo(150,70);
        				ctx.lineTo(150,0);
        				ctx.lineTo(130,0);
        			ctx.fill();

        			ctx.restore();
        
        			wysokosc+=speed;
        
        			if(wysokosc>150)
        			{
           				wysokosc=-150;
        			}

        			window.requestAnimationFrame(draw);
    			}
    
    			$(document).ready(function() {
    				window.requestAnimationFrame(draw);
    			});
            </script>
	</article>
		<section class="row mb-5">    
			<article class="col-12 col-lg-6 mb-md-4">
				<h3 class="col-12  text-center text-danger mt-2">Masz jakieś uwagi? Napisz komentarz :)</h3>
				<form method="post">
						<h6 class="text-center">Podaj adres E-mail</h6>
    						<input type="email" class="form-control col-12 col-lg-6 mx-lg-auto text-center" name="email" placeholder="E-mail" required>
						<h6 class="text-center mt-3">Podaj Twój nick</h6>
							<input type="text" class="form-control col-12 col-lg-6 mx-lg-auto text-center" name="nick" placeholder="Nick" required>
						<h6 class="text-center mt-3">Twój komentarz</h6>
							<textarea class="form-control col-12 col-lg-6 mx-auto text-center mt-1" name="komentarz" placeholder="Dodaj Komentarz"  rows="3" required></textarea>
						<aside class="d-lg-flex justify-content-center">
							<button class="btn btn-primary col-12  col-lg-4 mr-2 mt-2" type="submit">Wyślij</button>
							<input class="btn btn-primary col-12  col-lg-4  mt-2" type="reset" value="Wyczyść">
						</aside>
				</form>
			</article>
					<?php
					include("skryptyPHP/dane.php");
					$connection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbDatabase) 
						or die('Brak połączenia z serwerem MySQL.<br />Błąd: '.mysqli_error($connection)); 
					mysqli_set_charset($connection, "utf-8");
			
					if(!empty($_POST["email"])&&!empty($_POST["nick"])&&!empty($_POST["komentarz"]))
					{
						$email=$_POST["email"];
						$nick=$_POST["nick"];
						$komentarz=nl2br($_POST["komentarz"]);
			
						$query = "INSERT INTO `komentarze` (`data`, `email`, `nick`, `komentarz`) VALUES (?, ?, ?, ?)";
						$statement = $connection->prepare($query);
						$statement->bind_param("ssss", $data, $email, $nick, $komentarz);
						$data = date("d-m-Y H:i:s");
						$email = $connection->real_escape_string($email);
						$nick = $connection->real_escape_string($nick);
						$komentarz = $connection->real_escape_string($komentarz);
						$statement->execute();
						$statement->close();
					}
					
					?>
			<section class="col-11 col-lg-5 mx-auto mt-1" id="komentarz">
				<?php
					$zapytanie="SELECT * FROM komentarze ORDER BY Id DESC";
					$rezultat=mysqli_query($connection, $zapytanie);
				echo '<form method="post"  >';
					while($bufor=mysqli_fetch_assoc($rezultat))
					{
						echo '<article style="	border:1px solid black;border-radius:5px;"><aside class="col-12 text-right">Dodano: '.$bufor['data'].'</aside>';	
							if(isset($_SESSION["sessionid"]))	
							{
								echo '<input type="submit" name="usun" value="'.$bufor['Id'].'" class="btn btn-primary col-2 col-lg-2 mb-1 d-block mx-auto">';
								echo '<aside class="col-12 text-left"><b>Id='.$bufor['Id'].'</b></aside>';	
								echo '<aside class="col-12 text-left"><br>'.$bufor["email"].'</aside>';						
							}
						echo '<aside class="col-12 text-left"><br><b>'.$bufor["nick"].'</b></aside>';	
						echo '<aside class="col-12 text-center">'.$bufor["komentarz"].'</aside></article><br>';	
					}			
				?>	
				</form>
				<?php
					if(!empty($_POST['usun']))
					{
						$id=$_POST["usun"];
						$zapytanie="DELETE FROM komentarze WHERE Id='$id' ";
						$rezultat=mysqli_query($connection, $zapytanie);			
					}
				
				mysqli_close($connection);	
				?>
			</section>
		</section>
	</section>

	<?php
		include("tmp/footer.php");
	?>

</body>
</html>