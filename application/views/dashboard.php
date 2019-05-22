<div class="container-fluid">
	<!-- Content Row -->
	<div class="row">
	<div class="container" >
	<h3>Informasi, 
	<?php 
		echo $_SESSION["user_nama"];
	?>
	</h3>

		<form>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-10">
				<input type="text" disabled class="form-control-plaintext" id="staticEmail" value="<?php echo $_SESSION["user_nama"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">No KTP</label>
				<div class="col-sm-10">
				<input type="text" disabled class="form-control-plaintext" id="staticEmail" value="<?php echo $_SESSION["no_ktp"]; ?>">
				</div>
			</div>
			
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">Absen ID</label>
				<div class="col-sm-10">
				<input type="text" disabled class="form-control-plaintext" id="staticEmail" value="<?php echo $_SESSION["user_name"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
				<div class="col-sm-10">
				<input type="text" disabled class="form-control-plaintext" id="staticEmail" value="<?php echo $_SESSION["user_tl"], ", ", $_SESSION["tgl_lahir"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
				<input type="text" disabled class="form-control-plaintext" id="staticEmail" value="<?php echo $_SESSION["email"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Registrasi</label>
				<div class="col-sm-10">
				<input type="text" disabled class="form-control-plaintext" id="staticEmail" value="<?php echo $_SESSION["tgl_reg"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">Tahun Masuk</label>
				<div class="col-sm-10">
				<input type="text" disabled class="form-control-plaintext" id="staticEmail" value="<?php echo $_SESSION["tgl_masuk"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">Jabatan</label>
				<div class="col-sm-10">
				<input type="text" disabled class="form-control-plaintext" id="staticEmail" value="<?php echo $_SESSION["jabatan"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">No. Telepon</label>
				<div class="col-sm-10">
				<input type="text" disabled class="form-control-plaintext" id="staticEmail" value="<?php echo $_SESSION["no_hp"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-10">
				<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $_SESSION["agama"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
				<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $_SESSION["alamat"]; ?>">
				</div>
			</div>
		</form>
	</div>
	<div class="row">
		
	</div>

</div>
