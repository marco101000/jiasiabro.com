<?php
session_start();

if (!isset($_SESSION["account"])) {
    echo
        '<script>
            alert("尚未登入");
            location.href = "mem_login.php";
        </script>';
}

if ($_SESSION["active"] == 0 || $_SESSION["control"] == 0) {
    echo
        '<script>
            alert("帳號已停用");
            location.href = "mem_login.php";
        </script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Favorite Restarant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
    <script src="js/jquery-2.1.0.min.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>

    <style>
        .ul-grid-rwd {
            display: grid;
            grid-template-columns: auto auto;
        }
    </style>

    <script>
        $(function() {
            $("#list_view").empty();
            $.ajax({
                type: "POST",
                url: "api/restaurant_favorite_list_api.php",
                data: {
                    account: "<?php echo $_SESSION["account"] ?>"
                },
                dataType: "json",
                success: show,
                error: function() {
                    alert("reg read api error");
                }
            });
        });

        function show(data) {
            // console.log(data[0][1]);
            // console.log(data[1][2]);
            // console.log(data[0].Pic);
            console.log(data);

            $("#list_view").empty();

            if(data.state=='false'){
                strHTML = '<li><a href="#"><img src=""><h3>zero_result</h3><p>zero_result</p></a></li>';

                $("#list_view").append(strHTML);           
            }else{
                for (i = 0; i < data.length; i++) {
                    if (data[i].Pic === null) {
                        strHTML = '<li><a href="https://www.google.com.tw/maps/place/' + data[i].Lat + ',' + data[i].Lng + '"><img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=&key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI"><h3>' + data[i].Name + '</h3><p>' + data[i].Address + '</p><p>點我開地圖</p><span class="ui-li-count">取消收藏</span></a><a href="#" data-icon="delete" data-id="'+ data[i].id +'">取消收藏</a></li>';

                        $("#list_view").append(strHTML);
                    } else {
                        strHTML = '<li><a href="https://www.google.com.tw/maps/place/' + data[i].Lat + ',' + data[i].Lng + '"><img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=' +data[i].Pic + '&key=AIzaSyBKySwIabJXiaMicPKsg7SOuKFJdmht4PI"><h3>' + data[i].Name + '</h3><p>' + data[i].Address + '</p><p>點我開地圖</p><span class="ui-li-count">取消收藏</span></a><a href="#" data-icon="delete" data-id="'+ data[i].id +'">取消收藏</a></li>';

                        $("#list_view").append(strHTML);
                    }
                }

                $("a", $("#list_view")).bind("click", function(){
                    $.ajax({
                        type: "POST",
                        url: "api/restaurant_favorite_cancel_api.php",
                        data: {
                            account: "<?php echo $_SESSION["account"] ?>",
                            res_id: $(this).data("id"),
                        },
                        dataType: "json",
                        success: del_success,
                        error: function() {
                            alert("cancel api error");
                        }
                    });
                });

                $("#list_view").listview("refresh", true);
            }
        }

        function del_success(data){
            alert("取消收藏成功");
            window.location.assign("fav_res.php");
        }
    </script>
</head>

<body>
    <div data-role="page" id="home" data-position="fixed">
        <div data-role="header" data-theme="b">
            <h1>頁首 </h1>
            <a href="#" data-rel="back" data-icon="back" data-iconpos="notext">back</a>
        </div>
        <div role="main" class="ui-content">
            <ul data-role="listview" data-inset="true" id="list_view">
                <li>
                    <a href="#">
                        <img src="http://fakeimg.pl/350x350/00CED1/FFF/?text=img+placeholder">
                        <h3>Hotel-101</h3>
                        <p>死亡並不第一個距離夏，男孩較大發送職工值得大學主頁日記方法能力後面性感記，沒想。</p>
                        <span class="ui-li-count">授權精采</span>
                    </a>
                    <a href="https://goo.gl/maps/NyjzV58NnWBe3pMB6" data-icon="location"></a>
                </li>
            </ul>
        </div>
        <div data-role="footer" data-theme="b" data-position="fixed">
            <h1>頁尾</h1>
        </div>
    </div>
</body>

</html>