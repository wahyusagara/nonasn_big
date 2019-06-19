<script src="<?= base_url();?>assets/js/tanggal.js"></script>
<?php  
 $sumber = 'http://10.10.160.189/absen/konek.php';
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
    <script>document.write('<em>' + hari +'</em>' + tanggal + '<em> ' + bulan + '</em> ' + tahun);</script>
	<div class="container">
         <!-- <?php foreach($list as $result) {
            echo "<pre>";
            echo substr($result[''],5);
            echo "</pre>";
        }
        ?>  -->

        <?php

            $grouped_types = array();
            foreach($list as $type){
                $grouped_types[substr($type[''],0,10)][] = substr($type[''],11);
            }
            // print "<pre>";
            // print_r($grouped_types);
            // print "</pre>";

            foreach($grouped_types as $key=> $val)
            {
            echo $key." absen pada jam ->". $val[''];
            }
        ?>
    </div>
</div>