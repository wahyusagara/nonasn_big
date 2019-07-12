<style>
    .detail {
        height:100px;
    }
    input{
        width:100%;
    }
    .kanan{
        background:#ddd;
    }
</style>
<div class="container-fluid">
    <table class="table table-striped">
        <h2> Form Pengurusan Izin Cuti </h2>
        <tbody>
            <tr>
                <td>
                <form action="<?php echo base_url(). 'Izin/tambah_aksi'; ?>" method="post" class="well form-horizontal">
                <div class="row">
                    <div class="col-sm-6">
                        <fieldset>
                            <input type="hidden" name="id_karyawan" value="<?php echo $_SESSION["user_id"]; ?>">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Jenis Cuti</label>
                                <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                                    <select class="selectpicker form-control" name="jenis_cuti">
                                        <?php 
                                            foreach($user as $u){ 
                                        ?>
                                        <option value="<?php echo $u->id ?>">
                                            <?php echo $u->jenis_cuti ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tanggal</label>
                                <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group date" data-provide="datepicker">
                                        <input name="tanggal" type="text" class="form-">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label">Lama Izin (Hari) </label>
                                <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                        <input name="lama" name="phoneNumber" class="form-control" required="true" type="number">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12 control-label">Detail Keperluan </label>
                                <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                    <input name="detail" id="phoneNumber" name="detail" class="form-control detail" required="true" type="text"></div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Atasan</label>
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                                <select name="id_atasan" name="jenis_cuti" class="selectpicker form-control">
                                    <option value="1">1</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama</label>
                            <div class="col-md-8 inputGroupContainer">
                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input disabled id="email" name="nama" placeholder="Namanya" class="form-control" required="true" type="text"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">NIP</label>
                            <div class="col-md-8 inputGroupContainer">
                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input disabled id="phoneNumber" name="nip" placeholder="19900001991019" class="form-control" required="true" type="text"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Golongan</label>
                            <div class="col-md-8 inputGroupContainer">
                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input disabled id="phoneNumber" name="nip" placeholder="" class="form-control" required="true" type="text"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <center>
                    <a href="" class="btn btn-primary"> Submit Data </a>
                    <a href="" class="btn btn-default"> cancel </a>
                    </center>
                </div>
                    
                </form>
                </td>

                <div class="col-sm-12" style="border:1px solid #f00; padding: 10px;">
                Informasi kelengkapan syarat cuti
                <br> 1. Pengambilan Cuti Minimal 1 Hari
                <br> 2. Waktu pengambilan cuti maksimal H+5 kerja setelah cuti mulai dilakukan

                </div>
                </form>
            </tr>
            
        </tbody>
    </table>
</div>

<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>