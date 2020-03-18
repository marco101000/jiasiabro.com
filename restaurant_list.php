<?php
// session_start();

// if (!isset($_SESSION["account"])) {
//     echo
//         '<script>
//                 alert("尚未登入");
//                 location.href = "mem_login.php";
//             </script>';
// }
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
            max-width: 100%;
            display: block;
            position: relative;
        }

        /* img {
            max-height: 100%;
            max-width: 100%;
            width: auto;
            height: auto;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        } */

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
        $(function() {
            $("#listView").empty();

            $("#search_btn").bind("click", function() {
                // console.log($("#keyword").val());
                var space = $("#keyword").val().indexOf(" ", 0);
                if (space > -1) {
                    $("#listView").empty();
                    alert("幹不要有空格");
                } else if ($("#keyword").val().length == 0) {
                    $("#listView").empty();
                } else {
                    $.ajax({
                        type: "POST",
                        url: "api/google-api.php",
                        data: {
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
            });

            // $("#listView").listview("refresh", true);

        })

        function show(data) {
            $("#listView").empty();
            //-------------------------------------------------------------
            // console.log(data.results[0].name);
            // console.log(data.results[0].opening_hours.open_now);
            // console.log(data.results[0].photos[0].photo_reference);
            // console.log(data.results[0].geometry.location);
            // console.log(data.results[0].geometry.location.lng);
            // console.log("legnth of data results: " + data.results.length);
            //-------------------------------------------------------------

            if (!data.results[0]) {
                strHtml =
                    '<li><a href="#">' + data.status + '<span class="ui-li-aside"></span></a><a href="" data-icon="location"></a></li>';
                $("#listView").append(strHtml);
            } else {
                for (i = 0, cnt = data.results.length; i < cnt; ++i) {

                    if (data.results[i].opening_hours) {
                        if (data.results[i].photos) {
                            if (i % 2 == 0) {
                                strHtml =
                                    '<li class="ul-grid-rwd"><a href="#"><img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=' + data.results[i].photos[0].photo_reference + '&key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI" ><div><h1>' + data.results[i].name + '</h1><p><span>營業中：' + data.results[i].opening_hours.open_now + '</span></p></div></a><a href="" data-icon="location" data-loc-lat="' + data.results[i].geometry.location.lat + '" data-loc-lng="' + data.results[i].geometry.location.lng + '" id="' + i + '"></a></li>';

                                $("#listView").append(strHtml);
                            } else {
                                strHtml =
                                    '<li class="ul-grid-rwd"><a href="#"><img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=' + data.results[i].photos[0].photo_reference + '&key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI" ><div><h1>' + data.results[i].name + '</h1><p><span>營業中：' + data.results[i].opening_hours.open_now + '</span></p></div></a><a href="" data-icon="location" data-loc-lat="' + data.results[i].geometry.location.lat + '" data-loc-lng="' + data.results[i].geometry.location.lng + '" id="' + i + '"></a></li>';

                                $("#listView").append(strHtml);
                            }
                        } else {
                            if (i % 2 == 0) {
                                strHtml =
                                    '<li class="ul-grid-rwd"><a href="#"><img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=&key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI" ><div><h1>' + data.results[i].name + '</h1><p><span>營業中：' + data.results[i].opening_hours.open_now + '</span></p></div></a><a href="" data-icon="location" data-loc-lat="' + data.results[i].geometry.location.lat + '" data-loc-lng="' + data.results[i].geometry.location.lng + '" id="' + i + '"></a></li>';

                                $("#listView").append(strHtml);
                            } else {
                                strHtml =
                                    '<li class="ul-grid-rwd"><a href="#"><img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=&key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI" ><div><h1>' + data.results[i].name + '</h1><p><span>營業中：' + data.results[i].opening_hours.open_now + '</span></p></div></a><a href="" data-icon="location" data-loc-lat="' + data.results[i].geometry.location.lat + '" data-loc-lng="' + data.results[i].geometry.location.lng + '" id="' + i + '"></a></li>';

                                $("#listView").append(strHtml);
                            }
                        }
                    } else {
                        if (data.results[i].photos) {
                            if (i % 2 == 0) {
                                strHtml =
                                    '<li class="ul-grid-rwd"><a href="#"><img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=' + data.results[i].photos[0].photo_reference + '&key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI" ><div><h1>' + data.results[i].name + '</h1><p><span>營業中：</span></p></div></a><a href="" data-icon="location" data-loc-lat="' + data.results[i].geometry.location.lat + '" data-loc-lng="' + data.results[i].geometry.location.lng + '" id="' + i + '"></a></li>';

                                $("#listView").append(strHtml);
                            } else {
                                strHtml =
                                    '<li class="ul-grid-rwd"><a href="#"><img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=' + data.results[i].photos[0].photo_reference + '&key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI" ><div><h1>' + data.results[i].name + '</h1><p><span>營業中：</span></p></div></a><a href="" data-icon="location" data-loc-lat="' + data.results[i].geometry.location.lat + '" data-loc-lng="' + data.results[i].geometry.location.lng + '" id="' + i + '"></a></li>';

                                $("#listView").append(strHtml);
                            }
                        } else {
                            if (i % 2 == 0) {
                                strHtml =
                                    '<li class="ul-grid-rwd"><a href="#"><img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=&key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI" ><div><h1>' + data.results[i].name + '</h1><p><span>營業中：</span></p></div></a><a href="" data-icon="location" data-loc-lat="' + data.results[i].geometry.location.lat + '" data-loc-lng="' + data.results[i].geometry.location.lng + '" id="' + i + '"></a></li>';

                                $("#listView").append(strHtml);
                            } else {
                                strHtml =
                                    '<li class="ul-grid-rwd"><a href="#"><img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=&key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI" ><div><h1>' + data.results[i].name + '</h1><p><span>營業中：</span></p></div></a><a href="" data-icon="location" data-loc-lat="' + data.results[i].geometry.location.lat + '" data-loc-lng="' + data.results[i].geometry.location.lng + '" id="' + i + '"></a></li>';

                                $("#listView").append(strHtml);
                            }
                        }
                    }

                    $("#" + i).bind("click", function(e) {
                        // console.log("111");
                        search($(this).attr("data-loc-lat"), $(this).attr("data-loc-lng"));
                        // console.log(this);
                    });

                }
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
    </script>
</head>

<body>
    <div data-role="page" id="home" data-position="fixed">
        <div data-role="header" data-theme="b">
            <h1>頁首</h1>
        </div>
        <div role="main" class="ui-content">

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

            <div class="imgcenter">
                <img src="img/near.jfif" alt="" width="100%">
            </div>
        </div>
        <div data-role="footer" data-theme="b" data-position="fixed">
            <h1>頁尾</h1>
        </div>
    </div>
</body>

</html>