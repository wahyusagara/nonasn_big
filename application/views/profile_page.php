<script src="<?= base_url();?>assets/js/d3v3.js""></script>
<link rel="stylesheet" href="<?= base_url();?>assets/css/leaflet.css" />
<link rel="stylesheet" href="<?= base_url();?>assets/css/big.css" />
<link href="https://fonts.googleapis.com/css?family=Bungee+Inline&display=swap" rel="stylesheet">
<script src="<?= base_url();?>assets/js/topos.js"></script>
<script src="<?= base_url();?>assets/js/leaflet.js"></script>
<script src="<?= base_url();?>assets/js/tanggal.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-extra-markers@1.0.6/src/assets/css/leaflet.extra-markers.css" />
<script src="https://unpkg.com/leaflet-extra-markers@1.0.6/src/assets/js/leaflet.extra-markers.js"></script>

<style>
	/* Always set the map height explicitly to define the size of the div
	* element that contains the map. */
	#map {
	height: 100%;
	}
	/* Optional: Makes the sample page fill the window. */
	html, body {
	height: 100%;
	margin: 0;
	padding: 0;
	}
	#mapid { 
	height: 200px;
	}
	#map {
		height: 500px;
		padding:20px;
	}
	.jam{
		font-family: 'Bungee Inline', cursive;
		font-size: 58px;
	}
	.nama{
		font-family: 'Bungee Inline', cursive;
		font-size: 30px;
		margin-left:10px;
	}
	.bg-jam{
        float: right;
        text-align: right;
        margin: 40px 10px 10px 10px;
        color: #fff;
	}
	.heads{
		padding:10px;
		background:#f4f4f4;
	}
	.bigtext {
		height:100px;
    }
    .logbook{
        padding:20px;
        /* width:60%; */
    }
    .card{
        text-align:center;
    }
</style>
<!------ Include the above in your HEAD tag ---------->
<?php  
 $sumber = 'http://10.10.160.189/absen/today.php';
 $user = $_SESSION["user_name"];
//  echo $user;
 $konten = file_get_contents($sumber);
 $data = json_decode($konten, true);

  $ID = $user;
  $list = array_filter($data, function ($var) use ($ID) {
      return ($var['userID'] == $ID);
  });
?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
        <!-- code start -->
            <div class="twPc-div">
                <a class="twPc-bg twPc-block">
                    <div class="bg-jam">
                    absen anda hari ini: <br>
                    <span class="jam">
                        <?php 
                        foreach($list as $result) {
                        echo substr($result[''],10,6);

                        // $hasil = $result;
                        // $first = reset($hasil);
                        // $last = end($hasil);
                        }
                        ?>
                    </span>
                  </div>
                </a>
                <!-- <div class="twPc-bg twPc-block" id="mapid"></div> -->

                <div>
                

                    <a title="namana" href="#" class="twPc-avatarLink">
                        <img alt="namana" src="http://www.icons101.com/icons/47/Icons_Material_Design_color_by_Rammist/128/user.png" class="twPc-avatarImg">
                    </a>

                    <div class="twPc-divUser">
                        <div class="twPc-divName">
                            <?php 
                                // echo "Welcome Back, ";
                                echo "<b>";
                                echo $_SESSION["user_nama"];
                                echo "</b>";
                            ?>
                        </div>
                        <span>
                            <a href="#">
                            @<span>
                            <?php 
                                // echo "Welcome Back, ";
                                echo "<b>";
                                echo $_SESSION["email"];
                                echo "</b>";
                            ?>
                            </span></a>
                        </span>
                    </div>

                    <!-- <div class="twPc-divStats">
                        <ul class="twPc-Arrange">
                            <li class="twPc-ArrangeSizeFit">
                                <a href="https://twitter.com/mertskaplan" title="9.840 Tweet">
                                    <span class="twPc-StatLabel twPc-block">Tweets</span>
                                    <span class="twPc-StatValue">9.840</span>
                                </a>
                            </li>
                            <li class="twPc-ArrangeSizeFit">
                                <a href="https://twitter.com/mertskaplan/following" title="885 Following">
                                    <span class="twPc-StatLabel twPc-block">Following</span>
                                    <span class="twPc-StatValue">885</span>
                                </a>
                            </li>
                            <li class="twPc-ArrangeSizeFit">
                                <a href="https://twitter.com/mertskaplan/followers" title="1.810 Followers">
                                    <span class="twPc-StatLabel twPc-block">Followers</span>
                                    <span class="twPc-StatValue">1.810</span>
                                </a>
                            </li>
                        </ul>
                    </div> -->
                    <!-- <div class="logbook">
                        <form>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                <input type="text" class="form-control bigtext" placeholder="apa yang anda lakukan hari ini ....">
                                </div>
                            </div>
                            
                            
                            <button type="button" class="btn btn-primary btn-lg btn-block">Isi Log Book</button>
                        </form>
                    </div> -->
                </div>
            </div>
        <!-- code end -->
            

        </div>

        <div class="col-md-4 mb-4">
            
            ...
        </div>
        
    </div>
</div>

<script>
var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://sdm.big.go.id/siap/presensi/index.php/api/api/hari_libur",
  "method": "POST",
  "headers": {
    "Authorization": "Basic ZGF0NGFrczNzOmMxYjFuMG5n",
    "User-Agent": "PostmanRuntime/7.15.2",
    "Accept": "*/*",
    "Cache-Control": "no-cache",
    "Postman-Token": "d77599ca-32c8-4fef-a288-19a59e3d2962,28d9ef96-845d-47ec-857a-c54bf4254ea5",
    "Host": "sdm.big.go.id",
    "Cookie": "BIG_session_Name=a%3A5%3A%7Bs%3A10%3A%22session_id%22%3Bs%3A32%3A%22d7fb167a829a2139add8dbf94be5afe3%22%3Bs%3A10%3A%22ip_address%22%3Bs%3A14%3A%22192.168.218.57%22%3Bs%3A10%3A%22user_agent%22%3Bs%3A21%3A%22PostmanRuntime%2F7.15.2%22%3Bs%3A13%3A%22last_activity%22%3Bi%3A1566527664%3Bs%3A9%3A%22user_data%22%3Bs%3A0%3A%22%22%3B%7D4a33a6ebd1f415e08e1a7cf389a92e72",
    "Accept-Encoding": "gzip, deflate",
    "Content-Length": "",
    "Connection": "keep-alive",
    "cache-control": "no-cache"
  }
}

$.ajax(settings).done(function (response) {
  console.log(response);
});
</script>