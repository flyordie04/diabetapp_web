$(document).ready(function() {
	let config = {
		apiKey: "AIzaSyA6YCmZiBsq1-hlMTBMmMzWePy2va10kks",
		authDomain: "diabetapp-9579f.firebaseapp.com",
		databaseURL: "https://diabetapp-9579f.firebaseio.com",
		projectId: "diabetapp-9579f",
		storageBucket: "diabetapp-9579f.appspot.com",
		messagingSenderId: "316734541658"
	};
	firebase.initializeApp(config);

	let currentUser = firebase.auth().currentUser;

	function pokaz(){
		show(currentUser);
		alert(currentUser);
	}

});
