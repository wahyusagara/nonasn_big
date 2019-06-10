<div class="container-fluid">
	<!-- Content Row -->
	<div class="row">
	<div class="container" >
	<!-- <h3>Hello, 
	<?php 
		echo $_SESSION["user_nama"]," - ",$_SESSION['user_tl'];
	?>
	</h3> -->
	<h3> Daftar Pegawai NON PNS </h3>

	<div class="row">
		<div class="col-md-12">

		
			<table id="example" class="display" style="width:100%;">
				<thead>
					<tr>
						<th scope="col">Nama</th>
						<th scope="col">Tempat Lahir</th>
						<th scope="col">Jabatan</th>
						<th scope="col">Unit Kerja</th>
						<th scope="col">Kedeputian</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($query as $row): ?>
				<tr>   
					<td><?php echo $row->nama_pegawai; ?></td>
					<td><?php echo $row->tempat_lahir; ?></td>
					<td><?php echo $row->nama_jabatan; ?></td>
					<td><?php echo $row->nama_unit_kerja_es_2; ?></td>
					<td><?php echo $row->nama_unit_kerja_es_1; ?></td>
				</tr>
				<?php endforeach; ?>
					
				</tbody>
				<tfoot>
					<tr>
						<th scope="col">Nama</th>
						<th scope="col">Tempat Lahir</th>
						<th scope="col">Jabatan</th>
						<th scope="col">Unit Kerja</th>
						<th scope="col">Kedeputian</th>
					</tr>
				</tfoot>
			</table>
			</div>
			
		</div>
	</div>
	</div>

</div>
