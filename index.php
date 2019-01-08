<?php
	session_start();
	include("tmp/menu.php");
?>

	<section class="container-fluid">
		

		<section class="row">
			<section id="demo" class="p-0 col-12 w-100  carousel slide" data-ride="carousel"><!--col-lg-6-->
				
				<!-- Indicators -->
				<ul class="carousel-indicators">
					<li data-target="#demo" data-slide-to="0" class="active"></li>
					<li data-target="#demo" data-slide-to="1"></li>
					<li data-target="#demo" data-slide-to="2"></li>
				</ul>
			
				<!-- The slideshow -->
		
				<article class="carousel-inner" id="slideshow">
		
					<aside class="carousel-item active obraz">
						<img src="img/img_slider1.jpg" alt="Slider_1"  class="obraz d-block img-fluid w-100 ">
					</aside>
					<aside class="carousel-item obraz">
						<img src="img/img_slider2.jpg" alt="Slider_2"  class="obraz d-block img-fluid w-100 ">
					</aside>
					<aside class="carousel-item obraz">
						<img src="img/img_slider3.jpg" alt="Slider_3"  class="obraz d-block img-fluid w-100 ">
					</aside>
				</article>

				<!-- Left and right controls -->
		
				<a class="controls carousel-control-prev" href="#demo" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a class="controls carousel-control-next"  href="#demo" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>
			</section>
		</section>


		<div class="row">	
			<div class="col-lg-4">

			</div>
		</div>
	</section>
	<section class="container-fluid mt-2">
		<section class="row" >
			<article class="col-10 mx-auto" id="last">
				<?php
					include("skryptyPHP/dane.php");
					$connection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbDatabase) 
						or die('Brak połączenia z serwerem MySQL.<br />Błąd: '.mysqli_error($connection)); 
						mysqli_set_charset($connection, "utf-8");
					
					$zapytanie="SELECT * FROM wpisy ORDER BY Id DESC LIMIT 1";
					$rezultat=mysqli_query($connection, $zapytanie);
					$bufor=mysqli_fetch_assoc($rezultat);
					echo '<p class="col-12 text-right">Dodano: '.$bufor['Data'].'</p>';	
						if(isset($_SESSION["sessionid"]))	
						{
						echo '<p class="col-12 text-left"><b>Id='.$bufor['Id'].'</b></p>';		
						}
					echo '<h3 class="col-12 text-left ml-md-5"><br>'.$bufor["Tytul"].'</h3>';
					echo '<p class="col-12 text-center"><br>'.$bufor["Tresc"].'</p>';			
				mysqli_close($connection);
				?>
			</article>
		</section>
	</section>

	
	<?php
		include("tmp/footer.php");
	?>
</body>
</html>