<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-9 col-lg-9 col-xl-9 bg-contain bg-white border mb-4">
				<h1 class="h2 px-3 m-0 txt-rblue font-weight-semibold mb-4">Informasi Biodata Pegawai</h1>
				<div class="text-size px-3 bg-white-transparent">

				<?php foreach ($single_peg as $pegawainya): ?>
				<form method="post" action="<?php echo base_url() . "index.php/dashboard/update_peg"?>">

					<div class="form-group row">
						<div class ="col-sm-3">
							<label id="hide">ID Absen :</label>
						</div>
						<div class="col-sm-9">
						<input type="text" class="form-control" id="hide" disabled name="xid" value="<?php echo $pegawainya->absenid; ?>">
						</div>
					</div>

					<div class="form-group row">
						<div class ="col-sm-3">
							<label id="hide">Nama Lengkap:</label>
						</div>
						<div class="col-sm-9">
						<input type="text" class="form-control" id="hide" name="xnama" value="<?php echo $pegawainya->nama_pegawai; ?>">
						</div>
					</div>
					
					<div class="form-group row">
						<div class ="col-sm-3">
							<label id="hide">Tanggal Registrasi :</label>
						</div>
						<div class="col-sm-9">
						<input type="text" class="form-control" id="hide" disabled name="xtglregistrasi" value="<?php echo $pegawainya->tgl_registrasi; ?>">
						</div>
					</div>

					<div class="form-group row">
						<div class ="col-sm-3">
							<label id="hide">Tempat Lahir :</label>
						</div>
						<div class="col-sm-9">
						<input type="text" class="form-control" id="hide" name="xtempatlahir" value="<?php echo $pegawainya->tempat_lahir; ?>">
						</div>
					</div>
					<div class="form-group row">
						<div class ="col-sm-3">
							<label id="hide">Tanggal Lahir :</label>
						</div>
						<div class="col-sm-9">
						<input type="text" class="form-control" id="hide" name="xtgllahir" value="<?php echo $pegawainya->tgl_lahir; ?>">
						</div>
					</div>
					
					<div class="form-group row">
						<div class ="col-sm-3">
							<label id="hide">Email Pegawai:</label>
						</div>
						<div class="col-sm-9">
						<input type="text" class="form-control" id="hide" name="xemail" value="<?php echo $pegawainya->email; ?>">
						</div>
					</div>

					<div class="form-group row">
						<div class ="col-sm-3">
							<label id="hide">Tahun Masuk :</label>
						</div>
						<div class="col-sm-9">
						<input type="text" class="form-control" id="hide" disabled name="xthnmasuk" value="<?php echo $pegawainya->thn_masuk; ?>">
						</div>
					</div>
					
					<div class="form-group row">
						<div class ="col-sm-3">
							<label id="hide">Jabatan :</label>
						</div>
						<div class="col-sm-9">
						<input type="text" class="form-control" id="hide" disabled name="xjabatan" value="<?php echo $pegawainya->jabatan; ?>">
						</div>
					</div>

					<div class="form-group row">
						<div class ="col-sm-3">
							<label id="hide">No. KTP :</label>
						</div>
						<div class="col-sm-9">
						<input type="text" class="form-control" id="hide" name="xktp" value="<?php echo $pegawainya->no_ktp; ?>">
						</div>
					</div>
					
					<div class="form-group row">
						<div class ="col-sm-3">
							<label id="hide">Agama :</label>
						</div>
						<div class="col-sm-9">
						<!-- <input type="text" class="form-control" id="hide" name="xagama" value="<?php echo $pegawainya->agama; ?>"> -->
						<select name="xagama" class="form-control" id="sel1">
							<option selected disabled hidden value="<?php echo $pegawainya->agama; ?>"><?php echo $pegawainya->agama; ?></option>
							<option value="Islam">Islam</option>
							<option value="Katolik">Katolik</option>
							<option value="Protestan">Protestan</option>
							<option value="Hindu">Hindu</option>
							<option value="Budha">Budha</option>
							<option value="Konghucu">Konghucu</option>
						</select>
						</div>
					</div>

					<div class="form-group row">
						<div class ="col-sm-3">
							<label id="hide">Alamat :</label>
						</div>
						<div class="col-sm-9">
						<input type="text" class="form-control" id="hide" name="xalamat" value="<?php echo $pegawainya->alamat; ?>">
						</div>
					</div>

					<div class="form-group row">
						<div class ="col-sm-3">
							<label id="hide">No. HP :</label>
						</div>
						<div class="col-sm-9">
						<input type="text" class="form-control" id="hide" name="xtlp" value="<?php echo $pegawainya->no_hp; ?>">
						</div>
					</div>
				</div>
				<div class="text-center pb-3">
					<!-- <button type="button" name="submit_button" class="btn btn-primary radius-full shadow-small" ng-disabled="processing">Apply Now</button> -->
					<input type="submit" class="btn btn-primary radius-full shadow-small" ng-disabled="processing" id="submit" name="dsubmit" value="Update">
				</div>
				</form>
				<?php endforeach; ?>
			</div>
			<!-- <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 d-none d-sm-block border">
				<div class="text-center">Advertisment</div>
			</div> -->
		</div>
	</div>

</div>
