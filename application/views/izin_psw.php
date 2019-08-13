<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.js" ></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
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
    .tombol{
        width:100%;
        border-radius:0px;
    }
    .btn-sm{
        font-size:12px;
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
<div class="container">
    <div class ="row justify-content-md-center">
        <div class="col-sm-10 ">
            <h4> Pulang sebelum waktunya </h4>
        </div>
        

        <div class="col-sm-10">
            <button type="button" class="btn btn-info btn-md float-right" 
                data-toggle="modal" 
                data-target="#myModal"
                style="margin-bottom:20px;">
                Tambah Izin Pulang Sebelum Waktu
            </button>
            <table class="table">
                <thead>
                <tr>
                    <th width="10%">Tanggal</th>
                    <th width="15%">Jam</th>
                    <th width="10%">Kategori</th>
                    <th width="45%">Deskripsi</th>
                    <th width="10%">File</th>
                    <th width="10%"></th>
                </tr>
                </thead>
                <tbody>
                
                    <?php 
                        foreach($izin_psw as $izin){ 
                    ?>
                    <form action="<?php echo base_url(). 'index.php/izin/del'; ?>" method="post">
                        <?php 
                            echo "<td>"; echo $izin->tanggal; echo "</td>";
                            echo "<td>"; 
                                echo $izin->jam_awal." - ".$izin->jam_akhir;  
                            echo "</td>";
                            echo "<td>"; echo $izin->id_izin; echo "</td>";
                            echo "<td>"; echo $izin->detail; echo "</td>";
                        ?>
                        <td> 
                            <a class="tombol btn btn-sm btn-success" href="<?php echo base_url('uploads/'); echo $izin->path;?>" class ="btn-sm">lihat</a> 
                            <input type="hidden" name="id" value="<?php echo $izin->id ?>">
                            <input type="hidden" name="status" value="99">
                        </td>
                        <td>
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
          <h4 class="modal-title">Form Izin</h4>
        </div>
        <div class="modal-body">
        <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('izin/create_psw');?>
                <input type="hidden" value="<? echo $_SESSION["user_id"]; ?>" name="id_karyawan" placeholder="1111">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Jenis Cuti</label>
                    <div class="col-sm-7">
                    <select class="selectpicker form-control" name="id_izin">
                        <option value="izin">
                            Izin 
                        </option>
                        <option value="info">
                            pemberitahuan 
                        </option>
                    </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Tanggal</label>
                    <div class="col-sm-7">
                    <input type="text" class="startdate" name="tanggal" size="30" autocomplete="off"/>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Jam Awal</label>
                    <div class="col-sm-4">
                    <input name="jam_awal" class="timepicker text-center" 
                        jt-timepicker="" time="model.time" 
                        time-string="model.timeString" 
                        default-time="model.options.defaultTime" 
                        time-format="model.options.timeFormat" 
                        start-time="model.options.startTime" 
                        min-time="model.options.minTime" 
                        max-time="model.options.maxTime" 
                        interval="model.options.interval" 
                        dynamic="model.options.dynamic" 
                        scrollbar="model.options.scrollbar" 
                        dropdown="model.options.dropdown">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Jam akhir</label>
                    
                    <div class="col-sm-4">
                        <div class='input-group date' id='jam_awal'>
                        <input name="jam_akhir" class="timepicker text-center" 
                            jt-timepicker="" time="model.time" 
                            time-string="model.timeString" 
                            default-time="model.options.defaultTime" 
                            time-format="model.options.timeFormat" 
                            start-time="model.options.startTime" 
                            min-time="model.options.minTime" 
                            max-time="model.options.maxTime" 
                            interval="model.options.interval" 
                            dynamic="model.options.dynamic" 
                            scrollbar="model.options.scrollbar" 
                            dropdown="model.options.dropdown">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Deskripsi Izin</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="staticEmail" name="detail">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Attach File</label>
                    <div class="col-sm-7">
                    <input class="startdate" type="file" name="userfile"  class="btn btn-default btn-file" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Nama Atasan</label>
                    <div class="col-sm-7">
                    <select class="selectpicker form-control" name="id_atasan">
                            <?php 
                                foreach($pejabat as $pj){ 
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
                <!-- <input type="text" name="id_izin" placeholder="2222"> -->
                <!-- <input type="text" name="lama_cuti" placeholder="3333">
                <input type="text" name="detail" placeholder="4444">
                <input type="text" name="id_atasan" placeholder="5555"> -->
                <!-- <a href="<?php echo base_url('index.php/izin/do_insert'); ?>" class="btn btn-primary btn-lg active" role="button">Primary link</a> -->
                <input class="btn btn-success" type='submit'>
            </form>
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
<script type="text/javascript">
    $('.timepicker').timepicker({
        timeFormat: 'h:mm p',
        interval: 30,
        minTime: '8',
        maxTime: '5:00pm',
        defaultTime: '8',
        startTime: '10:00',
        dynamic: true,
        dropdown: true,
        scrollbar: true,
        dateFormat: "dd-mm-yy", 
        timeFormat: "HH:mm"
    });
</script> 