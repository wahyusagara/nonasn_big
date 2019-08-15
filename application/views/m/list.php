<?php
    $user = $_SESSION["user_name"];
    //  echo $user;
    $konten = file_get_contents($sumber);
    $data = json_decode($konten, true);
    
    $ID = $user;
    $list = array_filter($data, function ($var) use ($ID) {
        return ($var['userID'] == $ID);
    });
?>
<?php
    if(count($list) == 0) 
        echo "<tr>"."Data Presensi Tidak Ada"."</tr>"; 
    else{
    ?>
    <!-- Jika data ada  -->
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
            </tr>
            </thead>
            <tbody>
            <!-- ==== jam ==== -->

            <? foreach ($grouped_types as $row) { ?>
                <tr>
                    <td>
                        <? echo end($row);?>
                    </td>
                    <td>
                        <? echo $row[0]; ?>
                    </td>
                </tr>
            <?  } ?>
            </div>
        </div>
        </tbody>
    </table>
    </div>
<? } ?> 
<!-- end data jika ada -->