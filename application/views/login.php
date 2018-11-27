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
					<h3>Logowanie</h3>
				</div>
				<div id="form_login">
					<input type="email" class="form-control" name="email" title="email" id="email" placeholder="E-mail">
					<input type="password" class="form-control" name="password" title="password" id="password" placeholder="Hasło">
				</div>
				<div id="remember">
					Zapomniałeś hasła?
				</div>
				<button type="button" class="btn btn-primary" onclick="login()" id="btnRegister">Zaloguj się!</button>
				Nie masz konta? <a href="<?php echo base_url(); ?>rejestracja">Zarejestruj się!</a>
			</div>
		</div>
	</div>
</div>
<script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-auth.js"></script>
<script src="../../js/jquery-3.3.1.min.js"></script>
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

	function login(){

		let email = document.getElementById("email").value;
		let password = document.getElementById("password").value;
		firebase.auth().signInWithEmailAndPassword(email, password).then(function () {
			window.location.href = "<?php echo base_url(); ?>"
		}).catch(function (error) {
			alert(error.message);
		})
	}
</script>
