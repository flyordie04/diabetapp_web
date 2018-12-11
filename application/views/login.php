<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

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
				<input type="submit" name="submit" class="btn btn-primary" onclick="login()" id="btnRegister" value="Zaloguj się!">
				Nie masz konta? <a href="<?php echo base_url(); ?>rejestracja">Zarejestruj się!</a>
			</div>

			</div>
		</div>
	</div>

<script type="text/javascript">

	function login(){

		let email = document.getElementById("email").value;
		let password = document.getElementById("password").value;

		firebase.auth().signInWithEmailAndPassword(email, password).then(function () {

			firebase.auth().currentUser.getIdToken(true).then(function (idToken) {
				$.ajax({
					url: base_url+'logowanie',
					method: 'POST',
					data: {
						userToken: idToken
					},
					success: function () {
						window.location.href = base_url;
					},
					error: function () {
						alert('blad logowania');
					}
				});
			});

		}).catch(function (error) {
			alert(error.message);
		})
	}
</script>
