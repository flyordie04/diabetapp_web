$(document).ready(function() {
	var config = {
		apiKey: "AIzaSyA6YCmZiBsq1-hlMTBMmMzWePy2va10kks",
		authDomain: "diabetapp-9579f.firebaseapp.com",
		databaseURL: "https://diabetapp-9579f.firebaseio.com",
		projectId: "diabetapp-9579f",
		storageBucket: "diabetapp-9579f.appspot.com",
		messagingSenderId: "316734541658"
	};
	firebase.initializeApp(config);

	function register(){

		var email = $("#email").val();
		var password = $("#password").val();

		firebase.auth().createUserWithEmailAndPassword(email, password)
			.then(function () {
				window.location.href = "homepage.php"
			}).catch(function (error) {
			alert(error.message);
		})
	}
});
