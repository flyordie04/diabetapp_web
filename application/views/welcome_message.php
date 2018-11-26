<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

	<style type="text/css">

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	</style>

<div id="register_container">
	<div id="register">
		<h1>Rejestracja:</h1>

			E-mail: <input type="email" class="form-control" name="email" title="email" id="email"><br>
			Hasło: <input type="password" class="form-control" name="password" title="password" id="password"><br><br>

			<button type="button" class="btn btn-primary" onclick="register()" id="btnRegister">Rejestracja</button>
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

	function register(){

		let email = document.getElementById("email").value;
		let password = document.getElementById("password").value;
		firebase.auth().createUserWithEmailAndPassword(email, password).then(function () {
			window.location.href = "<?php echo base_url(); ?>strona_glowna"
		}).catch(function (error) {
			alert(error.message);
		})
	}
</script>
