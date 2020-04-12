<?php
session_start();

if (!isset($_SESSION["account"])) {
    echo
        '<script>
                alert("尚未登入");
                location.href = "mem_login.php";
            </script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
    <script src="js/jquery-2.1.0.min.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>
    <!-- <script /*async*/ defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI"> </script> -->

    <style>
        .imgcenter {
            margin-right: auto;
            margin-left: auto;
            margin-top: 0;
            margin-bottom: 0;
            border: 2px solid #0080ff;
            border-radius: 10px;
            text-align: center;
            max-width: 50%;
            display: block;
            position: relative;
        }

        .ul-grid-rwd {
            display: grid;
            grid-template-columns: auto auto;
        }

        @media screen and (max-width: 768px) {
            .ul-grid-rwd {
                display: grid;
                grid-template-columns: auto;
                text-align: center;
            }
        }
    </style>
    <script>
        var crd_lat=24.178824;
        var crd_lng=120.6466926;
        $(function() {
            // console.log("<?php echo $_SESSION["account"];?>");
            if (navigator.geolocation){
                navigator.geolocation.getCurrentPosition(geo_success, geo_error, geo_options);
            } else{
                console.log('Geolocation is not support by this browser');
            }

            $("#listView").empty();

            $("#search_btn").bind("click", function() {
                if ($("#keyword").val().length == 0) {
                    $("#listView").empty();
                    alert("請輸入關鍵字");
                } else {
                    go_to_ajax();
                }
            });

        });

        function geo_success(position){
            var crd = position.coords;
            crd_lat=crd.latitude;
            crd_lng=crd.longitude;
            // console.log('latitude: ' + crd.latitude);
            // console.log('longitude: ' + crd.longitude);
            // console.log('accuracy: ' + crd.accuracy);
            // console.log('timestamp:' + position.timestamp);
        }

        function geo_error(err){
            // console.warn('ERROE(' + err.code + '): ' + err.message);
            alert("不允許定位 將傳至逢甲大學");
        }

        var geo_options = {
            enableHighAccuracy: true,
            maxmumAge:60000,
            timeout:10000 
        };

        function go_to_ajax(){
            $.ajax({
                type: "POST",
                url: "api/google-api.php",
                data: {
                    lat:(crd_lat),
                    lng:(crd_lng),
                    keyword: $("#keyword").val()
                },
                dataType: "json",
                async: false,
                cache: true,
                success: show,
                error: function() {
                    alert("api error");
                }
            });
        }

        function show(data) {
            $("#listView").empty();

            if (!data.results[0]) {
                alert("查無資料");
                strHtml =
                    '<li><a href="#">' + data.status + '<span class="ui-li-aside"></span></a><a href="" data-icon="location"></a></li>';
                $("#listView").append(strHtml);
            } else {
                for (i = 0; i < data.results.length; i++) {

                    if (data.results[i].name.length > 18) {//20字
                        var substr=data.results[i].name.substring(0, 18);
                        if (data.results[i].photos) {
                            strHtml =
                                '<li class="ul-grid-rwd"><a href="#res" data-id="'+ i +'"><img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=' + data.results[i].photos[0].photo_reference + '&key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI"><div><h1>' + substr + '</h1></div></a><a href="" data-icon="location" data-loc-lat="' + data.results[i].geometry.location.lat + '" data-loc-lng="' + data.results[i].geometry.location.lng + '" id="' + i + '"></a></li>';

                            $("#listView").append(strHtml);
                        } else {
                            strHtml =
                                '<li class="ul-grid-rwd"><a href="#res" data-id="'+ i +'" data-position-to="window"><img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=&key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI" ><div><h1>' + substr + '</h1></div></a><a href="" data-icon="location" data-loc-lat="' + data.results[i].geometry.location.lat + '" data-loc-lng="' + data.results[i].geometry.location.lng + '" id="' + i + '"></a></li>';

                            $("#listView").append(strHtml);
                        }
                    }else{//20字
                       if (data.results[i].photos) {
                            strHtml =
                                '<li class="ul-grid-rwd"><a href="#res" data-id="'+ i +'" data-position-to="window"><img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=' + data.results[i].photos[0].photo_reference + '&key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI" ><div><h1>' + data.results[i].name + '</h1></div></a><a href="" data-icon="location" data-loc-lat="' + data.results[i].geometry.location.lat + '" data-loc-lng="' + data.results[i].geometry.location.lng + '" id="' + i + '"></a></li>';

                            $("#listView").append(strHtml);

                        } else {
                            strHtml =
                                '<li class="ul-grid-rwd"><a href="#res" data-id="'+ i +'" data-position-to="window"><img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=&key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI" ><div><h1>' + data.results[i].name + '</h1></div></a><a href="" data-icon="location" data-loc-lat="' + data.results[i].geometry.location.lat + '" data-loc-lng="' + data.results[i].geometry.location.lng + '" id="' + i + '"></a></li>';

                            $("#listView").append(strHtml);
                        } 

                    }

                    $("#" + i).bind("click", function(e) {
                        // console.log("111");
                        search($(this).attr("data-loc-lat"), $(this).attr("data-loc-lng"));
                        // console.log(this);
                    });
                }

                $('a', $("#listView")).bind("click", function(){
                    // console.log($(this).data("id"));
                    go_to_res($(this).data("id"), data.results[$(this).data("id")]);
                });

            }

            setTimeout(function() {
                $("#listView").listview("refresh", true);
            }, 0);

        }

        function search(lat, lng) {
            // console.log(lat);
            // console.log(lng);
            window.open("https://www.google.com.tw/maps/place/" + lat + "," + lng);
        }

        function go_to_res(id, res_data){
            // console.log(res_data.photos);
            var res_photos='';
            if(!res_data.photos){
                res_photos='https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=&key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI';
            }else{
                res_photos='https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference='+res_data.photos[0].photo_reference+'&key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI';

            }
            $("#res").empty();
            var reverse_res_data=Object.keys(res_data);
            // console.log(res_data);
            // console.log(reverse_res_data);
            strDialog = '<div data-role="header" data-position="fixed" data-theme="b"><h1>'+res_data.name+'</h1><a href="#" data-rel="back" data-icon="back" data-iconpos="notext">back</a></div><div role="main" class="ui-content"><div class="imgcenter"><img src="'+res_photos+'" alt="" width="100%"></div><h1 style="text-align: center;">'+reverse_res_data[reverse_res_data.length-1]+':'+res_data.vicinity+'</h1><p style="text-align: center; font-size: 20px;">'+reverse_res_data[reverse_res_data.length-3]+':'+res_data.types+'</p><p style="text-align: center; font-size: 20px;">'+reverse_res_data[0]+':'+res_data.geometry.location.lat+','+res_data.geometry.location.lng+'</p><div class="ui-grid-a"><a href="" data-role="button" data-theme="b" data-rel="back" class="ui-block-a">取消</a><a href="" data-role="button" data-theme="b" class="ui-block-b" id="res_favorite_btn">收藏</a></div></div><div data-role="footer" data-position="fixed" data-theme="b"><h1>頁尾</h1></div>';
            $("#res").append(strDialog);
            $("#res").enhanceWithin();
            location.href="#res";

            $("#res_favorite_btn").bind("click", function(){
                $.ajax({
                    type:"POST",
                    url:"api/restaurant_favorite_api.php",
                    data:{account : "<?php echo $_SESSION["account"];?>",
                        name : res_data.name,
                        tel : "",
                        address : res_data.vicinity,
                        pic : res_photos,
                        lat : res_data.geometry.location.lat,
                        lng : res_data.geometry.location.lng,
                        },
                    success: res_show,
                    error: function(){
                        alert("接收錯誤");
                    }
                });
            });
        }

        function res_show(data){
            alert(data);
        }
    </script>
</head>

<body>
<!-- home -->
    <div data-role="page" id="home" data-position="fixed">
        <div data-role="header" data-theme="b">
            <h1>頁首</h1>
        </div>
        <div role="main" class="ui-content">
            <div class="imgcenter">
                <img src="img/near.jfif" alt="" width="100%">
            </div>

            <div data-role="fieldcontain">
                <input type="text" name="keyword" id="keyword" value="" placeholder="搜尋關鍵字">

                <a href="" data-role="button" data-theme="b" id="search_btn">搜尋</a>

            </div>

            <ul data-role="listview" data-inset="true" id="listView" class="ul-grid-rwd">
                <li data-role="list-divider" data-theme="b"></li>
                <!-- --------------------------------------------------------------------------- -->
                <!-- <li>
                    <a href="#">
                        <img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=CmRaAAAAkhC4awhMkWjPaVA7WkM6nn3B9cIXRuviO_X8kuM06-F4xvy8BdWeOPG35hk1RZ0cfuprR5bBdBMAhD0tXo94pKsdhr_LNlq3BkA44hga8BuJX588-D9TcFR8a1cmIgalEhCvVFkdmm15Xs0cVl5Rk6L3GhQ5wYggHgjmGJnR8uoXCeR95YRYGw&key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI"
                            class="ui-li-icon" alt="">
                        台中商旅
                        <span class="ui-li-aside">授權精采</span>
                    </a>
                    <a href="https://goo.gl/maps/NyjzV58NnWBe3pMB6" data-icon="location"></a>
                </li> -->
                <!-- --------------------------------------------------------------------------- -->
            </ul>
        </div>
        <div data-role="footer" data-theme="b" data-position="fixed">
            <h1>頁尾</h1>
        </div>
    </div>

<!-- res -->
    <div data-role="page" id="res">
        <div data-role="header" data-position="fixed" data-theme="b">
            <h1>首頁</h1>
            <a href="#" data-rel="back" data-icon="back" data-iconpos="notext">back</a>
        </div>
        <div role="main" class="ui-content">
            <div class="imgcenter">
                <img src="img/near.jfif" alt="" width="100%">
            </div>
            <p></p>
            <p></p>
            <div class="ui-grid-a">
                <a href="" data-role="button" data-theme="b" class="ui-block-a">取消</a>
                <a href="" data-role="button" data-theme="b" class="ui-block-b">收藏</a>
            </div>
        </div>
        <div data-role="footer" data-position="fixed" data-theme="b">
            <h1>頁尾</h1>
        </div>
    </div>
</body>

</html>