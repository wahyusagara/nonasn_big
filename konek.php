<?php
/*
Update 2013-10-29 
- ganti nama jadi konek.php (Penting)

*/
//$HOST_PRES 	='10.10.160.186';
$HOST_PRES 	='10.10.160.186';
$USER_PRES	='root';
$PASS_PRES	='P@$$w0rd';
$DB_PRES	='dev_presensi_v2_big'; 
$HOST_FING 	='WIN-57339I4F277\SQLEXPRESS'; //nama koneksi di odbc
$USER_FING	='sa';
$PASS_FING	='eagle@#$%02'; // password file db nitgen
$DB_FING	='NitgenAccessManager'; //nama koneksi di odbc 
$FILE_LOG 	='sinkronise_access.log';
$TIME_SINCH	= 5; // dalam satuan second
$JEDA_FING	= 600; // 600 second
$FROM_IN	= false;

	
	function connect_mesin(){
	$conn = sqlsrv_connect($GLOBALS['HOST_FING'], array( "Database" => $GLOBALS['DB_FING'], "UID" => $GLOBALS['USER_FING'], "PWD" => $GLOBALS['PASS_FING']));
	return $conn;	
	}
	
	function get_data_mesin(){
	header('Content-Type: application/json');	
	ini_set('memory_limit', '-1');
		
	// $data	= array();
	$tglnow = date("Y"); 
	$conn 	= connect_mesin();
	// $sql	= "SELECT username, userID, terminalName,convert(char(30),transactiontime,20) from ngv_AuthLog where userID = '' ORDER BY transactiontime Desc;";
	$sql	= "SELECT 
				userID, 
				terminalName,
				transactiontime, 
				convert(char(30),transactiontime,20) 
				from ngv_AuthLog 
				-- where transactiontime > DATEADD(month, -1,GETDATE()) 
				WHERE  (DATEPART(yy, TransactionTime) = $tglnow
				AND    DATEPART(mm, TransactionTime) = 8
				-- AND    DATEPART(dd, TransactionTime) = 8
				)
				AND isnull(userID,'') <> '' ORDER BY TransactionTime DESC;  ";
	
	$rs = sqlsrv_query($conn,$sql);
	// $data[] = print_r($row); 
	// $rs = sqlsrv_query( $conn, $sql);

	if( $rs === false)
	{
		echo "Error in query preparation/execution.\n";  
		die( print_r( sqlsrv_errors(), true));  
	}

	$json = array();

	while( $row = sqlsrv_fetch_array( $rs, SQLSRV_FETCH_ASSOC))
	{    
		$json[] = $row;
	}

	echo json_encode($json);
	
	
	}
	
	get_data_mesin();

	

?>