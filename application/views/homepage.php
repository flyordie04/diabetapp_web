<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> <!DOCTYPE html>



<div class="container">
	<div class="row">
		<div class="col">
			<div class="scroll">
				<h4>Moi podopieczni:</h4>
				<div class="list-group">
					<a class="list-group-item list-group-item-action">Cras justo odio</a>
					<a class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
					<a class="list-group-item list-group-item-action">Morbi leo risus</a>
					<a class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
					<a class="list-group-item list-group-item-action">Vestibulum at eros</a>
				</div>
			</div>
		</div>
		<div class="col-8">
		<h4>Wybrany podopieczny:</h4>
		</div>
	</div>

</div>


<a href="<?php echo base_url('strona_glowna'); ?>" > Strona główna</a>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

	firebase.auth().onAuthStateChanged(function (user) {
		if (user) {
			//window.alert(user.email);
			let currentUser = user.email;
			alert(currentUser);
			let ajax_processor = base_url + 'application/controllers/homepage/index';
/*
			$.ajax({
				type: "POST",
				url: base_url + 'application/controllers/homepage',
				dataType: 'json',
				contentType: 'json',
				headers: {'api-key': 'AIzaSyA6YCmZiBsq1-hlMTBMmMzWePy2va10kks'},
				data: {'currentUser' : currentUser},
				success: function () {
					//alert("success");
				},
				error: function (error) {
					//alert("error: " + error);
				}
			});
			*/

			document.getElementById('currentUser').value = user.email;
			document.getElementById('emailForm');
			$.post(
				ajax_processor,
				$("#currentUser").serialize(),
				function(responseText){
					$("#currentUser").html(responseText);
				},
				"json"
			);

		} else {
			window.location.assign("<?php echo base_url();?>logowanie");
		}
	});


	//current = firebase.auth().currentUser;

	//let name, email, uid;
	//name = current.displayName;
	//email = current.email;
	//uid = current.uid;
</script>
