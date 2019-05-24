<?php  
 $sumber = 'http://10.10.160.189/sinkron/konek.php';

 
 $user = $_SESSION["user_name"];
 
 $konten = file_get_contents($sumber);
 $data = json_decode($konten, true);

?>

<div class="container" style="padding:10px;">


  <table id="example" class="display" style="width:100%;">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Tempat Lahir</th>
        <th scope="col">Jabatan</th>
        <th scope="col">Unit Kerja</th>
        <th scope="col">Unit Kerja</th>
      </tr>
    </thead>
    <tbody>
    <?php   
      for($a=1; $a < count($data); $a++)
      {
        print "<tr>";
        // penomeran otomatis
        print "<td>".$a."</td>";
        // menayangkan 
        print "<td>".$data[$a]['userID'] = "1111"."</td>";
        print "<td>".$data[$a]['terminalName']."</td>";
        print "<td>".substr_replace( $data[$a][''], '', 10 )."</td>";
        print "<td>".substr($data[$a][''], 10, -3)."</td>";

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
