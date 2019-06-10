<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
function formatDate(date) {
  var monthNames = [
    "January", "February", "March",
    "April", "May", "June", "July",
    "August", "September", "October",
    "November", "December"
  ];

  var day = date.getDate();
  var monthIndex = date.getMonth();
  var year = date.getFullYear();

  return day + ' ' + monthNames[monthIndex] + ' ' + year;
}

</script>

<?php  
 $sumber = 'http://10.10.160.189/sinkron/konek.php';
 $user = $_SESSION["user_name"];
//  echo $user;
 $konten = file_get_contents($sumber);
 $data = json_decode($konten, true);

//  $json = '[{"name":"Juan","Sex":"Male","ID":"1100"},{"name":"Maria","Sex":"Female","ID":"2513"},{"name":"Pedro","Sex":"Male","ID":"2211"}]';
  // $array = json_decode($data,1);
  $ID = $user;
  $list = array_filter($data, function ($var) use ($ID) {
      return ($var['userID'] == $ID);
  });
  // print_r($list);

?>

<div class="container" style="padding:10px;">


  <table id="example" class="display" style="width:100%;">
    <thead>
      <tr>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Tempat Lahir</th>
        <th scope="col">Jabatan</th>
        <th scope="col">Unit Kerja</th>
        <th scope="col">Unit Kerja</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      for($a=1;$a < count($list);$a++)
      // for($i=0;$i < count($item);$i++)
      {
        
        print "<tr>";
        // penomeran otomatis
        print "<td>".$a."</td>";
        // menayangkan 
        print "<td>".$list[$a]['userID']."</td>";
        print "<td>".$list[$a]['terminalName']."</td>";
        print "<td>".substr_replace( $list[$a][''], '', 10 )."</td>";
        print "<td>".substr($list[$a][''], 10, -3)."</td>";

        // print "<td>".$data[$a]['']."</td>";
        // print substr_replace( $data[$a][''], ':', 2 );
        print "</tr>";
      }
    ?>
    
      
    </tbody>
    <tfoot>
      <tr>
        <th scope="col">Nama</th>
        <th scope="col">Tempat Lahir</th>
        <th scope="col">Jabatan</th>
        <th scope="col">Unit Kerja</th>
        <th scope="col">Unit Kerja</th>
      </tr>
    </tfoot>
  </table>
  
</div>
