<link rel="stylesheet" href="<?= base_url();?>assets/css/big.css" />
<script src="<?= base_url();?>assets/js/tanggal.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/moment@2/moment.min.js"></script>
<script>
// const currentMoment = moment().subtract(30, 'days');
// const endMoment = moment().add(1, 'days');
const currentMoment = moment().subtract(2, 'days');
const endMoment = moment().add(1, 'days');
while (currentMoment.isBefore(endMoment, 'day')) {
//   console.log(`Loop at ${currentMoment.format('YYYY-MM-DD')}`);
  currentMoment.add(1, 'days');
  document.write(` ${currentMoment.format('YYYY-MM-DD')}<br>`);
}
</script> -->

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
    <h3>
        <script>document.write('<em> ' + bulan + '</em> ' + tahun);</script>
    </h3>
	<div class="container">

        DEBUG ARRAY 
            <?php
            $grouped_types = array();
            foreach($list as $type){
                $grouped_types[substr($type[''],0,10)][] = substr($type[''],11);
            }
            // print "<pre>";
            // print_r($grouped_types);
            // print "</pre>";
            echo $type[''];

        ?>




    
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Tanggal</th>
            <th>Jam Datang</th>
            <th>Jam Pulang</th>
        </tr>
        </thead>
        <tbody>
        <?
            foreach($list as $key => $ls){
            
        ?>
            <tr>
                <td>
                    <? 
                        echo " ". $ls[''];
                    ?>
                </td>

                <td>
                    <? 
                        echo $key ." ". $ls['']
                    ?>
                </td>

                <td>
                    <? 
                        echo $key ." ". $ls[''];
                    ?>
                </td>
            </tr>
        <? } ?>
        </tbody>
    </table>
    </div>
</div>