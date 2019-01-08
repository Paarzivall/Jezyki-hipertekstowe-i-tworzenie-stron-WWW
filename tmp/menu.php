<!doctype html>
<html lang="pl">
<head>
<title>Strona Zaliczeniowa</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link rel="Stylesheet" type="text/css" href="css/arkusz.css">
<!--Pod galerię-->

	<?php if(isset($galeria)): ?>
	<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
	<script type="text/javascript" src="js/lightbox-plus-jquery.min.js"></script>
	<?php endif; ?>

</head>
<body>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script  src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<header class="container-fluid">
		<section class="row d-none d-md-none d-lg-flex " id="desktop_menu"><!--menu desktop -->
				<article class="col-lg-3 col-xl-3 mt-2 ml-3">
					<img src="img/logo.png" alt="logo"><!--300x60px-->
				</article>
				<article class="col-lg-7 col-xl-7"></article>
				<?php if(!isset($_SESSION["sessionid"])): ?>
					<a href="logowanie.php" class="btn btn-primary btn-lg active" id="btn"  role="button" aria-pressed="true">Zaloguj się</a>
				<?php else: ?>
					<a href="logout.php" class="btn btn-primary btn-lg active" id="btn" role="button" aria-pressed="true">Wyloguj się</a>
				<?php endif ?>
				<article class="col-lg-12 col-xl-12" id="menu">	
					<ul class="nav nav-pills offset-1">
						<li class="link nav-item col-lg-2 col-xl-2 blockquote text-center">
							<a class="nav-link " href="index.php">Home</a>
						</li>
						<li class=" link nav-item col-lg-2 col-xl-2 blockquote text-center">
							<a class="nav-link " href="wpisy.php">Wpisy</a>
						</li>
						<li class="link nav-item col-lg-2 col-xl-2 blockquote text-center">
							<a class="nav-link" href="spr_haslo.php">Sprawdź swoje hasło</a>
						</li>
						<li class="link nav-item col-lg-2 col-xl-2 blockquote text-center">
							<a class="nav-link" href="canvas.php">Kontakt</a>
						</li>
						<li class="link nav-item col-lg-2 col-xl-2 blockquote text-center">
							<a class="nav-link" href="galeria.php">Galeria</a>
						</li>
						<?php if(isset($_SESSION["sessionid"])): ?>
						<li class="link nav-item col-lg-2 col-xl-2 blockquote text-center">
							<a class="nav-link" href="admin.php">Panel Administracyjny</a>
						</li>
						<?php endif ?>
					</ul>
				</article>
		</section>

			<section class="row d-lg-none" id="phone_menu"><!--phone menu-->
				
				<article class="col-9 col-md-3 ml-4 ml-md-2 mb-2">
					<img src="img/logo.png" alt="logo"><!--300x60px-->
				</article>
					<p class="col-3 col-sm-4 col-md-6 ml-4 ml-sm-5"></p>
				<?php 
				if(!isset($_SESSION["sessionid"])) 
					echo '<a href="logowanie.php" class="btn btn-primary btn-lg active"  role="button" aria-pressed="true">Zaloguj się</a>';
				else
					echo '<a href="logout.php" class="btn btn-primary btn-lg active " role="button" aria-pressed="true">Wyloguj się</a>';
				?>
				<br>
				<article class="col-4 col-sm-4 col-md-4 mx-auto"></article>				
					<section class="pos-f-t col-12 mx-auto">
						<article class="collapse" id="navbarToggleExternalContent">  
							<ul class="nav flex-column data-offset-auto">
								<li class="nav-item ">
									<a class="nav-link  text-center" href="index.php" role="button" >Home</a>
								</li>
								<li class="nav-item">
									<a class="nav-link  text-center" href="wpisy.php" role="button" >Wpisy</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-center" href="spr_haslo.php" role="button" >Sprawdź swoje hasło</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-center" href="canvas.php" role="button" >Kontakt</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-center" href="galeria.php" role="button" >Galeria</a>
								</li>
								<?php if(isset($_SESSION["sessionid"])): ?>
								<li class="nav-item">
									<a class="nav-link text-center" href="admin.php" role="button" >Panel Administracyjny</a>
								</li>
								<?php endif ?>
							</ul>		  
						</article>
						<nav class="navbar navbar-dark ml-sm-4">
							<button class="navbar-toggler mx-auto" type="button" id="roll_button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon mx-auto"></span>Menu
							</button>
						</nav>
					</section>
			</section>
	</header>