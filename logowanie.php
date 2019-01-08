<?php
	include("tmp/menu.php");
?>
	<section class="container-fluid mb-md-5 pb-md-5">
		<section class="row d-flex justify-content-center text-center mb-md-5 pb-md-5">
			<article class="col-7 mt-5 position-relative text-center mb-md-5 pb-md-5" id="zalogujSie">
					<h5 class="text-center">Istnieje tylko konto Administratora strony!!!</h5><br><br>
					<form method="post" action="login.php" class="mb-md-5 pb-md-5">
						<aside class="form-group col-12 justify-content-center">
							<label>Podaj login:</label>
							<input type="text" class="form-control col-lg-6 mx-auto text-center"   placeholder="Login" name="log" required style="font-size:1.2rem;">
						</aside>
						<aside class="form-group col-12 justify-content-center">
							<label>Podaj hasło:</label>
							<input type="password" class="form-control col-lg-6 mx-auto text-center" id="exampleInputPassword1" placeholder="Hasło" name="pas" required style="font-size:1.2rem;">
						</aside>
						<button type="submit" class="btn btn-primary mx-auto mb-1 mb-md-4" aria-pressed="true" >Zaloguj się</button>
					</form>
			</article>
		</section>
</section>
	
	<?php
		include("tmp/footer.php");
	?>
</body>
</html>