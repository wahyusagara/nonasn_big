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
                <div class="col-md-3">
                    <h3>
                        <script>document.write('<em> ' + bulan + '</em> ' + tahun);</script>
                    </h3>
                </div>
                <div class="col-md-3 float-right">
                <select name="forma" onchange="location = this.value;">
                    <option value="presensi/jan">januari</option>
                    <option selected value="presensi/feb">februari</option>
                    <option value="presensi/mar">maret</option>
                    <option value="presensi/apr">April</option>
                    <option value="presensi/mei">Mei</option>
                    <option value="presensi/jun">Juni</option>
                    <option value="presensi/jul">Juli</option>
                    <option value="presensi/agu">Agustus</option>
                    <option value="presensi/sep">September</option>
                    <option value="presensi/okt">Oktober</option>
                    <option value="presensi/nov">November</option>
                    <option value="presensi/des">Desember</option>
                </select>
                </div>
            </div>
            
    </div>
</div>
