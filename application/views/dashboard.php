<script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script>
<script src="<?= base_url();?>assets/js/d3v3.js""></script>
<link rel="stylesheet" href="<?= base_url();?>assets/css/leaflet.css" />
<script src="<?= base_url();?>assets/js/topo.js"></script>
<script src="<?= base_url();?>assets/js/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-extra-markers@1.0.6/src/assets/css/leaflet.extra-markers.css" />
<script src="https://unpkg.com/leaflet-extra-markers@1.0.6/src/assets/js/leaflet.extra-markers.js"></script>
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
	#mapid { 
	height: 500px;
	}
	#map {
		height: 500px;
	}
	
</style>
<div class="container-fluid">
	<div class="container">
		<div class="row">
		<div class="jumbotron col-sm-12">
		<h3 class="display-6">
		<?php 
			echo "Welcome Back,";
			echo "<b>";
			echo $_SESSION["user_nama"];
			echo "</b>";
		?>
		</h3>
		<!-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p> -->
		<hr class="my-4">
		<div id="mapid"></div>
		</div>
		</div>
	</div>

</div>
<script src="<?= base_url();?>/assets/js/geo.js"></script>
<script>
	L.ClickableTooltip = L.Tooltip.extend({
    onAdd: function (map) {
        L.Tooltip.prototype.onAdd.call(this, map);

        var el = this.getElement(),
            self = this;

        el.addEventListener('click', function() {
            self.fire("click");
        });
        el.style.pointerEvents = 'auto';
    }
});

var tooltip = new L.ClickableTooltip({
    direction: 'center',
    permanent: true,
    noWrap: true,
    opacity: 0.9
});
tooltip.setContent( "Example" );
tooltip.setLatLng(new L.LatLng(48.8583736, 2.2922926));
tooltip.addTo(map);

tooltip.on('click', function() {
    console.log("clicked too");
});
</script>