<!-- <h4>Tambah User</h4> -->
<div class="tes">
    <form action="<?php echo base_url();?>index.php/Dashboard/insert_pegawai" method="post">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="usr">Nama Pegawai:</label>
                <input name="nama_pegawai" type="text" class="form-control" id="usr">
            </div>
            <div class="form-group">
                <label for="usr">ID Fingerprint:</label>
                <input name="absenid" type="text" class="form-control" id="usr">
            </div>
            <div class="form-group">
                <label for="usr">Tempat Lahir:</label>
                <input name="tempat_lahir" type="text" class="form-control" id="usr">
            </div>
            <div class="form-group">
                <label for="usr">Tanggal Lahir:</label>
                <input type="text" class="lahir form-control" name="tgl_lahir" size="30" autocomplete="off"/>
            </div>
            
            <div class="form-group">
                <label for="usr">Email:</label>
                <input name="email" type="email" class="form-control" id="usr">
            </div>
            <div class="form-group">
                <label for="usr">Tgl registrasi:</label>
                <input type="text" class="regis form-control" name="tgl_registrasi" size="30" autocomplete="off"/>
            </div>
            <div class="form-group">
                <label for="usr">Jabatan:</label>
                <select class="selectpicker form-control" name="jabatan">
                    <?php 
                        foreach($jabatan as $jbt){ 
                    ?>
                    <option value="<?php echo $jbt->id_jabatan ?>">
                        <?php echo $jbt->nama_jabatan ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="usr">No. KTP:</label>
                <input name="no_ktp" type="text" class="form-control" id="usr">
            </div>
            <div class="form-group">
                <label for="usr">Agama:</label>
                <select class="form-control" id="exampleFormControlSelect1" name="agama">
                    <option value="islam">Islam</option>
                    <option value="protestan">Protestan</option>
                    <option value="katolik">Katolik</option>
                    <option value="hindu">Hindu</option>
                    <option value="budha">Budha</option>
                    <option value="konghucu">Konghucu</option>
                </select>
            </div>
        </div>

        <div class ="col-sm-12">
            <div class="form-group">
                <label for="usr">Alamat:</label>
                <input name="alamat" type="text" class="form-control" id="usr">
            </div>
            <div class="form-group">
                <label for="usr">Jenis Kelamin:</label>
                <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                    <option value="1">Laki Laki</option>
                    <option value="2">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usr">No. HP:</label>
                <input name="no_hp" type="text" class="form-control" id="usr">
            </div>
            <div class="form-group">
                <label for="usr">Unit Kerja:</label>
                <select class="selectpicker form-control" name="id_unit_kerja">
                    <?php 
                        foreach($unit as $unker){ 
                    ?>
                    <option value="<?php echo $unker->id_unit_kerja_es_2 ?>">
                        <?php echo $unker->nama_unit_kerja_es_2 ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            
        </div>
        <center>
        <input class="btn btn-success" type='submit' value="Save Data">
        </center>
    </form>
</div>