<link rel="stylesheet" href="<?= base_url();?>assets/css/big.css" />
<script src="<?= base_url();?>assets/js/tanggal.js"></script>
<style>
    .nopadding {
    padding: 0 !important;
    margin: 0 !important;
    }
</style>
<?php  
 $sumber = 'http://10.10.160.189/absen/mo/feb.php';
 $user = $_SESSION["user_name"];
//  echo $user;
 $konten = file_get_contents($sumber);
 $data = json_decode($konten, true);

  $ID = $user;
  $list = array_filter($data, function ($var) use ($ID) {
      return ($var['userID'] == $ID);
  });
  

//   print "<pre>";
//   print_r($list);
//   print "</pre>";
//     die();
?>
<div class="container-fluid">
    
	<div class="container">
        <!-- DEBUG ARRAY 
            <?php
            $grouped_types = array();
            foreach($list as $type){
                $grouped_types[substr($type[''],0,10)][] = substr($type[''],11);
            }
            print "<pre>";
            print_r($grouped_types);
            print "</pre>";

        ?> -->
        <div class ="row justify-content-md-center">
            <div class ="col-md-12">
                <div class="col-md-12">
                    <center>
                        <span class="judul-presensi">
                            Data Presensi Kehadiran
                        <!-- <script>document.write('JANUARI ' + tahun);</script> -->
                        </span>
                    </center>
                </div>
                <div class="col-md-3 float-right ">
                <select class="form-control margin20" name="forma" onchange="location = this.value;">
                    <option value="jan">januari</option>
                    <option selected value="feb">februari</option>
                    <option value="mar">maret</option>
                    <option value="apr">April</option>
                    <option value="mei">Mei</option>
                    <option value="jun">Juni</option>
                    <option value="jul">Juli</option>
                    <option value="agu">Agustus</option>
                    <option value="sep">September</option>
                    <option value="okt">Oktober</option>
                    <option value="nov">November</option>
                    <option value="des">Desember</option>
                </select>
                </div>
            </div>
            <div class ="col-md-3 nopadding">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="20%">Tanggal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- ==== tanggal ==== -->
                    <?
                        // $grouped_types = array();

                        foreach($list as $type){
                            $grouped_types[substr($type[''],0,10)][] = substr($type[''],11);
                            // print "<pre>";
                            // print_r ($grouped_types);
                            // print "</pre>";
                            // die;
                            foreach ($grouped_types as $gpkey => $gpvalue) {
                                // echo "<tr><td>";
                                $gplist = $gpkey;
                                $arr[] = $gplist;
                                // echo "</td></tr>";
                            }
                            
                            $unique = array_unique($arr); 
                            foreach ($unique as $key => $value) {
                                echo "<tr><td>";
                                echo $value;
                                echo "</td></tr>";
                            }
                        
                            break;
                    
                        }
                    
                    ?> 
                    </div>
                </div>
                </tbody>
            </table>
            </div>
            
            <div class ="col-md-6 nopadding">
            <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Jam Datang</th>
                        <th>Jam Pulang</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- ==== jam ==== -->

                    <? foreach ($grouped_types as $row) { ?>
                        <tr>
                            <td>
                                <? 
                                    // echo end($row);
                                    echo min($row);
                                ?>
                            </td>
                            <td>
                                <!-- <? echo $row[0]; ?> -->
                                <?php
                                    if(count($row) < 2)
                                    {
                                        echo "belum absen pulang";
                                    }
                                    else{
                                        // echo $row[0];
                                        echo reset($row);
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    $datang = strtotime(min($row));  
                                    $pulang = strtotime(reset($row));  
                                    $selisih = ($pulang - $datang)/3600;
                                    $pembulatan = round($selisih, 2);
                                    // echo $pembulatan;

                                    if ($pembulatan > "8.5") {
                                        echo "<span class=' alert-success'>";
                                        echo "Pulang sesuai waktu";
                                        echo "</span>";
                                    }
                                    else{
                                        echo "<span class=' alert-danger'>";
                                        echo "Absen tidak sesuai";
                                        echo "</span>";
                                    }
                                    
                                ?>
                            </td>
                        </tr>
                    <?  } ?>
                    </div>
                </div>

                        
            

                </tbody>
            </table>

            </div>
            <?php
                if(count($list) < 1)
                
                {
                    $this->load->view("m/notfound");
                }
            ?>
            
        </div>
    </div>
</div>
