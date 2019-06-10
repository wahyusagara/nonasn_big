<style>
	/* Always set the map height explicitly to define the size of the div
	* element that contains the map. */
	#map {
	height: 100%;
	}
	/* Optional: Makes the sample page fill the window. */
	html, body {
	height: 100%;
	margin: 0;
	padding: 0;
	}
</style>
<div class="container-fluid">
	<div class="container">
		<div class="row">
		<div class="jumbotron col-sm-12">
		<h1 class="display-4">
		<?php 
			echo "Welcome Back,";
			echo $_SESSION["user_nama"];
		?>
		</h1>
		<!-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p> -->
		<hr class="my-4">
		<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
		<p class="lead">
			<a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
		</p>
		</div>
		</div>
	</div>

</div>
