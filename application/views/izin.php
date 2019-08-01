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
            <form action="<?php echo base_url();?>index.php/izin/do_insert" method="post">
                <input type="hidden" value="<? echo $_SESSION["user_name"]; ?>" name="id_karyawan" placeholder="1111">
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
                        <div class="input-group date form_datetime" data-provide="datepicker">
                            <input name="tanggal" type="text">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
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
    $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd'});
</script>   