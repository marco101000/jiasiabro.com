<?php
   header("Access-Control-Allow-Origin:*");

   $arrContextOptions=array(
        "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
        ),
    );

   $lat = $_POST['lat'];
   $lng = $_POST['lng'];
   // $radius = $_POST['radius'];
   $keyword = urlencode($_POST['keyword']);

   $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=". $lat .",". $lng ."&radius=500&type=restaurant&keyword=".$keyword."&key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI";

   $result = file_get_contents($url, false, stream_context_create($arrContextOptions));
   echo $result;
?>
