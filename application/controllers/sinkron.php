<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sinkron extends CI_Model
{
	function sinchronize() {
        echo "Mulai proses transfer data : \n";
        $config 		= get_configuration(); 
        $last_read		= $config['start'];	
        if($config['is_read'] == 0){
            $data_peg = get_data_pegawai();
         //   echo "Data pegawai =>";
        // print_r($data_peg);
    //exit(0);
            foreach($data_peg as $row){ echo "Masuk ";
                echo "-";
                $enroll		= $row['enroll'];
                $no_pekerja = $row['pegawai_id'];
                $unit_kerja = $row['unit'];
                
                $data_mesin = get_data_mesin($config['start'],$enroll);
              //  exit(0);
          //    print_r($data_mesin);
           //   echo "<br>";
                foreach($data_mesin as $rm){
                    $last_read 	= $rm['ID'];
                    $time		= $rm['waktu'];
                    
                    $conn 		= connect_presensi();
                    $sql		= "call fingersync('$no_pekerja','$time')";
                    $rs			= mysqli_query($conn,$sql);
                    
                    if($rs){
                        while($rowp = mysqli_fetch_array($rs)){
                            $status_sync = $rowp['status_sync'];
                        }
                        $msg = "Pegawai $no_pekerja Finger Jam $time => $status_sync";
                    }else{
                        //$msg = "Pegawai $no_pekerja Finger Jam $time => Update Data Gagal";
                        $msg = $sql;
                    }
                    write_log($msg);
                }
                sleep(0.1);
            }  
        }
        echo "[ $last_read ]";
        set_configuration($last_read);
        echo "\nProses transfer data selesai";
    }
    
    function write_log($msg = ''){
        if(!empty($msg)){
            $handle = fopen($GLOBALS['FILE_LOG'],'a');
            echo "$msg\n";
            fwrite($handle,"$msg \n");
            fclose($handle);
        }
    }
    
    function connect_presensi(){ 
        $conn = mysqli_connect($GLOBALS['HOST_PRES'],$GLOBALS['USER_PRES'],$GLOBALS['PASS_PRES']);
        mysqli_select_db($conn,$GLOBALS['DB_PRES']);
        return $conn;
    }
    
    function connect_mesin(){
        $conn = sqlsrv_connect($GLOBALS['HOST_FING'], array( "Database" => $GLOBALS['DB_FING'], "UID" => $GLOBALS['USER_FING'], "PWD" => $GLOBALS['PASS_FING']));
        //$conn = mssql_connect($GLOBALS['HOST_FING'],$GLOBALS['USER_FING'],$GLOBALS['PASS_FING']);
        //mssql_select_db($GLOBALS['DB_FING'],$conn);
        return $conn;	
    }
    
    function get_configuration(){
        echo "Get Configuration : ";
        $conn	= connect_presensi();	 
        $sql	= 'SELECT * FROM tbl_konstanta WHERE id_batas IN(7,8,9)'; 
        $rs		= mysqli_query($conn,$sql); 
        $jeda_finger	= 5; // jeda waktu finger
        $start_read		= 0; // ID finger terakhir data yang dibaca pada database ICDAT
        $status_read 	= 0;
        $msg_error		= '';
        if($rs) { 
            while($row = mysqli_fetch_array($rs)){ 
                if($row['id_batas'] == 7){ 
                    $jeda_finger = $row['nilai_batas'];
                    $GLOBAL['JEDA_FING']= $row['nilai_batas'] * 60;
                }
                if($row['id_batas'] == 8){ 
                    $start_read = $row['nilai_batas'];
                }
                if($row['id_batas'] == 9){ 
                    $status_read = $row['nilai_batas'];
                }
            }  
            $sql= "UPDATE tbl_konstanta SET nilai_batas = 1 WHERE id_batas=9";
            mysqli_query($conn,$sql); 
            echo "Sukses \n";
        }else{
            $msg_error = "Gagal dalam menyiapkan konfigurasi";  
            write_log($msg_error); 		
        }
        if($conn){
            close($conn);
        }
        $data = array('jeda'=>$jeda_finger,'start'=>$start_read,'is_read'=>$status_read);
        return $data;
    }
    
    function set_configuration($last_read = 0){
        $conn	= connect_presensi(); 
        $sql 	= "UPDATE tbl_konstanta SET nilai_batas = '$last_read' WHERE id_batas=8"; 
        mysqli_query($conn,$sql);
        $sql    = "UPDATE tbl_konstanta SET nilai_batas = 0 WHERE id_batas=9";
        mysqli_query($conn,$sql); 
        if($conn){
            close($conn);
        } 
    }
    
    function close($conn){
        if($conn){
            //mysqli_close($conn);
        }
    }
    
    function get_data_mesin($start_read = 0, $enroll){
        $data	= array();
        $conn 	= connect_mesin();
        $sql	= "	
            select indexkey ID, userid enroll, convert(char(30),transactiontime,20) waktu
            from NGAC_AUTHLOG
            where IndexKey > $start_read
            and userid = '$enroll'
            and AuthResult ='0'
        ";
        $rs = sqlsrv_query($conn, $sql);
        if($rs){
            while($row = sqlsrv_fetch_array($rs)){
                $data[] = $row;
            }
            echo "Sukses Get Data Machine\n";
        }
        if($conn){
            close($conn);
        }
        return $data;
    }
    
    function get_data_pegawai(){
        //echo "get_data_pegawai $enroll | ";
        $data	= array();
        $conn 	= connect_presensi();
        $sql	= "	SELECT nomor_pekerja pegawai_id,kode_unit_kerja unit, LEFT(enroll_no,4) enroll FROM tpegawai WHERE status_dinas = 1";
        $rs		= mysqli_query($conn,$sql);
        if($rs){
            while($row = mysqli_fetch_array($rs)){
                $data[] = $row;
            }
        }
    
        if($conn){
            close($conn);
        }
        return $data;
    }
    
    while(true){	
        sinchronize();
        sleep($TIME_SINCH);
    }
}