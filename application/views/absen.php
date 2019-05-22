<div class="containers" style="padding:10px;">
	daf
	<?php

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://10.10.160.189/sinkron/konek.php",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"postman-token: a9eb45ca-e4bf-bc8b-803c-73f276fe4032"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		echo "cURL Error #:" . $err;
		} else {
			// echo "<script>console.log('" . json_encode($response) . "');</script>";
		// echo "<pre>";
		echo $response;
		}
	?>
	
	

</div>