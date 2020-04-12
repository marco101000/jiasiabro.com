<?php
   header("Access-Control-Allow-Origin:*");

   $arrContextOptions=array(
        "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
        ),
    );

   $Lat = floatval($_POST['lat']);
   $Lng = floatval($_POST['lng']);
   // $curlatlng = strval($_POST(['latlng']));
   // $radius = $_POST['radius'];
   // 逢甲大學/@24.178824,120.6466926
   // 臺北車站/@25.0477068,121.5151848
   // 台北市信義區信義路五段7號/@25.0339808,121.5623449
   $keyword = urlencode($_POST['keyword']);

   // fsockopen();

   $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$Lat,$Lng&radius=500&type=restaurant&keyword=$keyword&key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI";

   $result = file_get_contents($url, false, stream_context_create($arrContextOptions));
   echo $result;

   // echo $url."<br>";
   // echo $Lat."<br>";
   // echo $Lng."<br>";
   // echo $keyword.'<br>';
   // echo urldecode($keyword);
?>
