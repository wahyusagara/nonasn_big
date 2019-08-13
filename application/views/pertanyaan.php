<style>
.input-tinggi{
        height:300px
      }
</style>
<div class="container">
    <div class ="row">
            <div class="col-sm-12">
                <h4>Kirim Pertanyaan </h4>
            </div>
            <div class="col-md-7" style="background:#e8e8e8; color:#000; padding:10px;">
                <!-- <form action="" method="post"> -->
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('kontak/create_pertanyaan');?>
                    <input type="hidden" value="<? echo $_SESSION["user_id"]; ?>" name="id_pegawai" placeholder="1111">
                    
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-7">
                        <input disabled type="text" class="startdate form-control" name="nama" size="30" value="<? echo $_SESSION["user_nama"]; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Topik Masalah</label>
                        <div class="col-sm-7">
                        <input type="text" class="startdate form-control" name="topik" size="30" autocomplete="off"/>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Deskripsi Masalah</label>
                        <div class="col-sm-7">
                        <input type="text" class="startdate input-tinggi form-control" name="deskripsi" size="30" autocomplete="off"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Attach File</label>
                        <div class="col-sm-7">
                        <input type="file" class="startdate form-control" name="userfile"  class="btn btn-default btn-file" />
                        </div>
                    </div>

                    <center>
                    <input class=" btn btn-primary" type='submit' value="Kirim Pertanyaan">
                    </center>
                </form>
            </div>

    </div>
</div>