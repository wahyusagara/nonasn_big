<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.js" data-modules="effect effect-bounce effect-blind effect-bounce effect-clip effect-drop effect-fold effect-slide"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />

<div class="container-fluid">
	<!-- Content Row -->
	<div class="row">
	<div class="container" >
	<!-- <h3>Hello, 
	<?php 
		echo $_SESSION["user_nama"]," - ",$_SESSION['user_tl'];
	?>
	</h3> -->

	<div class="row">
		<div class="col-md-12" style="background:#fff;">
		<button type="button" class="btn btn-info btn-lg float-right" data-toggle="modal" data-target="#tambah_user">Tambah User</button>
		
			<table id="example" class="display" style="width:100%;">
				<thead>
					<tr>
						<th scope="col">Nama</th>
						<th scope="col">Email</th>
						<!-- <th scope="col">Tempat Lahir</th> -->
						<th scope="col">Jabatan</th>
						<th scope="col">Unit Kerja</th>
						<!-- <th scope="col">Kedeputian</th> -->
					</tr>
				</thead>
				<tbody>
				<?php foreach($query as $row): ?>
				<tr>   
					<td><?php echo $row->nama_pegawai; ?></td>
					<td width=20%>
						<div class="input-group mb-10">
							<input type="text" class="form-control" value="<?php echo $row->email; ?>" disabled  id="emailBtn">
							<div class="input-group-append">
								<button  onclick="myFunction()" class="btn btn-outline-secondary" type="button">
								<i class="far fa-copy"></i>
								</button>
							</div>
						</div>
						<!-- <?php echo $row->email; ?> -->
						<!-- <input type="text" value="<?php echo $row->email; ?>" id="emailBtn">
						<button onclick="myFunction()">Copy</button> -->
					</td>
					<!-- <td><?php echo $row->tempat_lahir; ?></td> -->
					<td><?php echo $row->nama_jabatan; ?></td>
					<td><?php echo $row->nama_unit_kerja_es_2; ?></td>
					<!-- <td><?php echo $row->nama_unit_kerja_es_1; ?></td> -->
				</tr>
				<?php endforeach; ?>
					
				</tbody>
				<tfoot>
					<tr>
						<th scope="col">Nama</th>
						<th scope="col">Tempat Lahir</th>
						<th scope="col">Jabatan</th>
						<th scope="col">Unit Kerja</th>
						<!-- <th scope="col">Kedeputian</th> -->
					</tr>
				</tfoot>
			</table>
			</div>
			
		</div>
	</div>
	</div>

</div>

<div id="tambah_user" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!-- <h4 class="modal-title">Modal Header</h4> -->
      </div>
      <div class="modal-body">
	  	<div class="container">
		  <?php $this->load->view("content/form_add_user"); ?>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
function myFunction() {
  var copyText = document.getElementById("emailBtn");
  copyText.select();
  document.execCommand("copy");
  alert("Copied Text: " + copyText.value);
}
</script>
<script type="text/javascript">
    $( ".lahir" ).datepicker({
    dateFormat: 'yy-mm-dd',//check change
    changeMonth: true,
    changeYear: true
    });
</script>   
<script type="text/javascript">
    $( ".regis" ).datepicker({
    dateFormat: 'yy-mm-dd',//check change
    changeMonth: true,
    changeYear: true
    });
</script>   
