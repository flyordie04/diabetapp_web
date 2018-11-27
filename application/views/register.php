<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
</head>
<body>
<div id="wrap">
	<div id="main" class="container clear-top">
		<div class="container" id="register_container">
			<div id="register">
				<img src="<?php echo base_url(); ?>images/splash_without.png" height="100" class="d-inline-block align-top" alt="">
				<div id="title">
					<h3>Rejestracja</h3>
				</div>
				<form method="post" action="<?php echo base_url();?>rejestracja">
					<div id="form">

						<input type="email" class="form-control" name="email" title="email" id="email" placeholder="E-mail" required>
						<input type="password" class="form-control" name="password" title="password" id="password" placeholder="Hasło" required>
						<input type="password" class="form-control" name="re-password" title="re-password" id="re-password" placeholder="Powtórz hasło" required>
						<input type="text" class="form-control" name="first_name" title="first_name" id="first_name" placeholder="Imię" required>
						<input type="text" class="form-control" name="surname" title="surname" id="surname" placeholder="Nazwisko" required>
						<input type="text" class="form-control" name="city" title="city" id="city" placeholder="Miasto" required>
						<input type="text" class="form-control" name="place" title="place" id="place" placeholder="Placówka lecznicza" required>
						<input type="number" class="form-control" name="phone_number" title="phone_number" id="phone_number" placeholder="Numer telefonu" required>
						<small>*W celu weryfikacji konta przez pacjenta wszystkie pola są wymagane.</small>
					</div>
					<input type="submit" name="submit" class="btn btn-primary" onclick="register()" id="btnRegister" value="Zarejestruj się!">
				</form>
				Masz już konto? <a href="<?php echo base_url(); ?>logowanie">Zaloguj się!</a>

			</div>
		</div>
	</div>
</div>

<script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-auth.js"></script>
<script src="<?php echo base_url(); ?>js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">

		let config = {
			apiKey: "AIzaSyA6YCmZiBsq1-hlMTBMmMzWePy2va10kks",
			authDomain: "diabetapp-9579f.firebaseapp.com",
			databaseURL: "https://diabetapp-9579f.firebaseio.com",
			projectId: "diabetapp-9579f",
			storageBucket: "diabetapp-9579f.appspot.com",
			messagingSenderId: "316734541658"
		};
		firebase.initializeApp(config);

		function register() {
				let email = document.getElementById("email").value;
				let password = document.getElementById("password").value;
				firebase.auth().createUserWithEmailAndPassword(email, password).catch(function (error) {
					alert(error.message);
				})
		}

</script>
