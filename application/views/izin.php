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
<div class="container-fluid">
    <table class="table table-striped">
        <h2> Form Pengurusan Izin Cuti </h2>
        <div class="col-md-6">
            <!-- <form action="" method="post"> -->
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
                <!-- <input type="text" name="id_cuti" placeholder="2222"> -->
                <!-- <input type="text" name="lama_cuti" placeholder="3333">
                <input type="text" name="detail" placeholder="4444">
                <input type="text" name="id_atasan" placeholder="5555"> -->
                <!-- <a href="<?php echo base_url('index.php/izin/do_insert'); ?>" class="btn btn-primary btn-lg active" role="button">Primary link</a> -->
                <input type='submit'>
            </form>
        </div>
    </table>

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

<script type="text/javascript">
    $( ".startdate" ).datepicker({
    dateFormat: 'yy-mm-dd',//check change
    changeMonth: true,
    changeYear: true
    });
</script>   