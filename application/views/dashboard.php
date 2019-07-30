<script src="<?= base_url();?>assets/js/d3v3.js""></script>
<link rel="stylesheet" href="<?= base_url();?>assets/css/leaflet.css" />
<link rel="stylesheet" href="<?= base_url();?>assets/css/big.css" />
<link href="https://fonts.googleapis.com/css?family=Bungee+Inline&display=swap" rel="stylesheet">
<script src="<?= base_url();?>assets/js/topos.js"></script>
<script src="<?= base_url();?>assets/js/leaflet.js"></script>
<script src="<?= base_url();?>assets/js/tanggal.js"></script>
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
	height: 200px;
	}
	#map {
		height: 500px;
		padding:20px;
	}
	.jam{
		font-family: 'Bungee Inline', cursive;
		font-size: 58px;
	}
	.nama{
		font-family: 'Bungee Inline', cursive;
		font-size: 30px;
		margin-left:10px;
	}
	.bg-hijau{
		padding:20px; text-align:center; background:#ddd; background: #5bc763;
    	color: #a9ff3f;
	}
	.heads{
		padding:10px;
		background:#f4f4f4;
	}
	.bigtext {
		height:200px;
	}
</style>
<?php  
 $sumber = 'http://10.10.160.189/absen/today.php';
 $user = $_SESSION["user_name"];
//  echo $user;
 $konten = file_get_contents($sumber);
 $data = json_decode($konten, true);

  $ID = $user;
  $list = array_filter($data, function ($var) use ($ID) {
      return ($var['userID'] == $ID);
  });
  

//   print "<pre>";
//   print_r($list);
//   print "</pre>";
//     die();
?>
<div class="container-fluid">
	<div class="container">
	<div class="col-md-4">
				<br>
				<p class="calendar">
					<!-- 15<em>March</em> -->
					<script>document.write('<em>' + hari +'</em>' + tanggal + '<em> ' + bulan + '</em> ');</script>
				</p>
			</div><!--./col-md-->
		<div class="row">
			<div class="heads col-sm-8">
			<b>Welcome Back, </b>
			<h1 class="nama">
				<?php 
					// echo "Welcome Back, ";
					echo "<b>";
					echo $_SESSION["user_nama"];
					echo "</b>";
				?>
			</h1>


			<hr class="my-4">
				<div class="row">
					
					<!-- <div class="col-md-12">
						<div class="card bg-c-green order-card">
							<div class="card-block">
								<h6 class="m-b-20">Absen Pulang</h6>
								<h2 class="text-center">
								<span>
									<?php echo $last; ?>
								</span>
								</h2>
							</div>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="card bg-c-yellow order-card">
							<div class="card-block">
								<h6 class="m-b-20">Orders Received</h6>
								<h2 class="text-center"><span>486</span></h2>
							</div>
						</div>
					</div>
					</div> -->
					<div class="col-md-12" id="mapid"></div>

					<div class="col-md-12" style="margin-top:20px;">
						<form>
						<h2>LOG BOOK</h2>
						<div class="form-group row">
							<div class="col-sm-12">
							<input type="text" class="form-control bigtext" placeholder="apa yang anda lakukan hari ini ....">
							</div>
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect1">Type</label>
							<select class="form-control" id="exampleFormControlSelect1">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							</select>
						</div>
						<button type="button" class="btn btn-primary btn-lg btn-block">Isi Log Book</button>
						</form>
					</div>
					
				<!-- </div> -->
				
			</div>
		</div>
		<div class="col-md-4">
			<div class="col-md-12 bg-hijau">
			absen anda hari ini: <br>
			<span class="jam">
				<?php 
				foreach($list as $result) {
				echo substr($result[''],10,6);

				$hasil = $result;
				$first = reset($hasil);
				$last = end($hasil);
				// $arrayList = array();
				// echo $first ;
				// echo "<br>";
				// echo $last; 
				}
				?>
			</span>	
				
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