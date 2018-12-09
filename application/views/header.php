<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">

</head>
<body>
<script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-auth.js"></script>
<script src="<?php echo base_url(); ?>js/jquery-3.3.1.min.js"></script>


<header>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="<?php echo base_url(); ?>">
			<img src="<?php echo base_url(); ?>images/splash_without.png" height="80" class="d-inline-block align-top" alt="">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link active" href="#">Strona główna <span class="sr-only">(current)</span></a>
				<a class="nav-item nav-link" href="#">Statystyki</a>
				<a class="nav-item nav-link" href="#">Kontakt</a>
				<a class="nav-item nav-link" id="username"></a>
				<a class="nav-item nav-link" style="right:100px; position:absolute" href="<?php echo base_url(); ?>logowanie" onclick="logout()">Wyloguj </a>
			</div>
			<form action="<?php echo base_url();?>application/controllers/Homepage" method="post" id="emailForm">
				<input type="hidden" name="currentUser" id="currentUser">
			</form>
		</div>
	</nav>

</header>
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
		firebase.auth().onAuthStateChanged(function (user) {
			if (user) {
				//document.getElementById('username').innerHTML = user.email;
				//document.getElementById('currentUser').value = user.email;
				//document.getElementById('emailForm');
			} else {
				window.location.assign("<?php echo base_url();?>logowanie");
			}
		});

		function logout() {
			firebase.auth().signOut()
				.catch(function (err) {
				});
		}

		let base_url = "<?php echo base_url();?>";
</script>
