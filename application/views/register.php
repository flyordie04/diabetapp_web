<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div id="wrap">
	<div id="main" class="container clear-top">
		<div class="container" id="register_container">
			<div id="register">
				<img src="<?php echo base_url(); ?>images/splash_without.png" height="100" class="d-inline-block align-top" alt="">
				<div id="title">
					<h3>Rejestracja</h3>
				</div>
				<form method="post" action="<?php echo base_url();?>rejestracja" id="registerForm">
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
					<input type="submit" name="submit" class="btn btn-primary" id="btnRegister" value="Zarejestruj się!">
				</form>
				Masz już konto? <a href="<?php echo base_url(); ?>logowanie">Zaloguj się!</a>

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	$(document).ready(function () {
		$('#registerForma').submit(function (e) {
			e.preventDefault();
			let email = document.getElementById("email").value;
			let password = document.getElementById("password").value;

			firebase.auth().createUserWithEmailAndPassword(email, password).then(function () {
				$('#registerForm').unbind('submit').submit();
			}).catch(function (error) {
				alert(error.message);
			})
		});
	});

</script>

