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
  

  // print "<pre>";
  // print_r($list);
  // print "</pre>";
    // die();
?>

