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
                <form method="post">
                <!-- <form action="<?php echo base_url(). 'Izin/tambah_aksi'; ?>" method="post" class="well form-horizontal"> -->
                <div class="row">
                    <div class="col-sm-4">
                        <!-- <fieldset>
                            <input type="hidden" name="id_karyawan" value="<?php echo $_SESSION["user_id"]; ?>">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Jenis Cuti</label>
                                <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                                    <select class="selectpicker form-control" name="jenis_cuti">
                                        <?php 
                                            foreach($jenis_cuti as $u){ 
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

                            <div class="form-group">
                                <label class="col-md-12 control-label">Nama Atasan</label>
                                <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                                        <select class="selectpicker form-control" name="atasan">
                                            <?php 
                                                foreach($pejabat as $pj){ 
                                            ?>
                                            <option value="<?php echo $pj->id ?>">
                                                <?php 
                                                    echo $pj->nama_pejabat ;
                                                    echo " / ";
                                                    echo $pj->Gol ;
                                                    // echo "]" ;
                                                ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <center>
                                    <input type="submit" name="save" value="Save Data"/>
                                    <!-- <a href="" class="btn btn-primary"> Submit Data </a> -->
                                    <!-- <a href="" class="btn btn-default"> cancel </a> -->
                                    </center>
                                <!-- </div>
                            </div>
                        </fieldset> --> 

                        <div>
                        <h3>Tambah Data</h3>
                            <?php
                            echo form_open('Izin/tambahdata');
                            ?>
                            <table>
                                <tr>
                                    <td>id karyawan</td>
                                    <td>:</td>
                                    <td><?php echo form_input('id_karyawan'); ?></td>
                                </tr>
                                <tr>
                                    <td>Cuti</td>
                                    <td>:</td>
                                    <td><?php echo form_input('id_cuti'); ?></td>
                                </tr>
                                <tr>
                                    <td>Lama cuti</td>
                                    <td>:</td>
                                    <td><?php echo form_input('lama_cuti'); ?></td>
                                </tr>
                                <tr>
                                    <td>Detail</td>
                                    <td>:</td>
                                    <td><?php echo form_input('detail'); ?></td>
                                </tr>
                                <tr>
                                    <td>Id Atasan</td>
                                    <td>:</td>
                                    <td><?php echo form_input('id_atasan'); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo form_submit('submit','Simpan','id="submit"'); ?></td>
                                </tr>
                            </table>
                            <?php echo form_close(); ?>
                        </div>

                        <div class="col-sm-8">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>jenis Cuti</th>
                                    <th>Lama Cuti</th>
                                    <th>Deskripsi</th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                    <?php 
                                        foreach($cuti as $cut){ 
                                    ?>
                                    <tr>
                                    
                                        <?php 
                                            echo "<td>"; echo $cut->tanggal; echo "</td>";
                                            echo "<td>"; echo $cut->jenis_cuti; echo "</td>";
                                            echo "<td>"; echo $cut->lama_cuti; echo " hari"; echo "</td>";
                                            echo "<td>"; echo $cut->detail; echo "</td>";
                                        ?>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
                
                
                    
                </form>
                </td>

                <div class="col-sm-12" style="border:1px solid #f00; padding: 10px;">
                Informasi kelengkapan syarat cuti
                <br> 1. Pengambilan Cuti Miid_karyawanal 1 Hari
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