<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.js" data-modules="effect effect-bounce effect-blind effect-bounce effect-clip effect-drop effect-fold effect-slide"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />

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
<!-- <h1 class="nama">
    <?php 
        // echo "Welcome Back, ";
        echo "<b>";
        echo $_SESSION["user_name"];
        echo "</b>";
    ?>
</h1> -->
<div class ="container">
    <div class="row">
        
        <div class="col-md-12">
            <h2> Form Pengurusan Izin Cuti </h2>
        </div>

        <div class="col-md-3" style="margin-top:10px; background:#e8da72; color:#000;">
            
            <table class="table" style="margin-top:10px;color:#000;">
            
            <br> <b>Tabel Cuti: </b>
            <tbody>
            <tr>
                <th scope="row">Cuti Tahunan</th>
                <td>
                    <?php 
                        // print_r ($total_cuti[0]);
                        $cuti_tahun = '12';
                        echo $cuti_tahun. " Hari";
                    ?>
                </td>
                </tr>
                <tr>
                <th scope="row">Total Cuti</th>
                <td>
                    <?php 
                        // $tot = print_r ($total_cuti[0]);
                        echo $total_cuti[0];
                        echo " Hari";
                    ?>
                </td>
                </tr>
                
            </tbody>
            </table>
            
            <center>
            Sisa Cuti Anda:
                <br> 
                
                    <?
                    $total_cutinya = $cuti_tahun - $total_cuti[0];
                    echo "<h1>".$total_cutinya. "</h1>";
                    echo " Hari Lagi "
                    ?>
            </center>
        </div>

        <div class="col-sm-9 ">
        <button type="button" class="btn btn-info btn-md float-right" 
            data-toggle="modal" 
            data-target="#myModal"
            style="margin-bottom:20px;"
        >
            Tambah Izin Cuti
        </button>
            <table class="table" >
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
                    <form action="<?php echo base_url(). 'index.php/izin/del_cuti'; ?>" method="post">
                        <?php 
                            echo "<td>"; echo $cut->tanggal; echo "</td>";
                            echo "<td>"; echo $cut->jenis_cuti; echo "</td>";
                            echo "<td>"; echo $cut->lama_cuti; echo " hari"; echo "</td>";
                            echo "<td>"; echo $cut->detail; echo "</td>";
                        ?>
                        <td>
                        <input type="hidden" name="idnya" value="<?php echo $cut->idCuti ?>">
                        <input type="hidden" name="status" value="99">
                            <input type="submit" class="tombol btn-sm btn-danger" value="X">
                        </td>
                    </tr>
                    </form>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">Form Cuti</h4>
        </div>
        <div class="modal-body">
            <table class="table table-striped">
                <?php echo validation_errors(); ?>
                <form action="<?php echo base_url();?>index.php/izin/do_insert" method="post">
                    <input type="hidden" value="<? echo $_SESSION["user_id"]; ?>" name="id_karyawan" placeholder="1111">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Jenis Cuti</label>
                        <div class="col-sm-9">
                        <select class="selectpicker form-control" name="id_cuti">
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

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                        <input type="text" class="startdate" name="tanggal" size="30" autocomplete="off"/>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Jumlah Hari</label>
                        <div class="col-sm-9">
                        <input type="number" class="form-control" id="staticEmail" name="lama_cuti">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Deskripsi Izin</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="staticEmail" name="detail">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Nama Atasan</label>
                        <div class="col-sm-9">
                        <select class="selectpicker form-control" name="id_atasan">
                                <?php 
                                    foreach($eselon as $pj){ 
                                ?>
                                <option value="<?php echo $pj->id ?>">
                                    <?php 
                                        echo $pj->nama ;
                                        echo " / ";
                                        echo $pj->gol ;
                                        // echo "]" ;
                                    ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <!-- <input type="text" name="id_cuti" placeholder="2222"> -->
                    <!-- <input type="text" name="lama_cuti" placeholder="3333">
                    <input type="text" name="detail" placeholder="4444">
                    <input type="text" name="id_atasan" placeholder="5555"> -->
                    <!-- <a href="<?php echo base_url('index.php/izin/do_insert'); ?>" class="btn btn-primary btn-lg active" role="button">Primary link</a> -->
                    <input class="btn btn-success" type='submit'>
                </form>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<script type="text/javascript">
    $( ".startdate" ).datepicker({
    dateFormat: 'yy-mm-dd',//check change
    changeMonth: true,
    changeYear: true
    });
</script>   