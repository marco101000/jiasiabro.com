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

    <script>
        $(function () {
            $.ajax({
                type: "POST",
                url: "api/restaurant_favorite_list_api.php",
                data: {
                    account: "<?php echo $_SESSION["account"]?>"
                },
                dataType: "json",
                success: show,
                error: function(){
                    alert("reg read api error");
                }
            });
        });

        function show(data) {
            console.log(data[0][1]);
            console.log(data[1][2]);

            $("#list_view").empty();

            for (var i = 0; i < data.length; i++){
                strHTML = 
                    '<li><a href="#"><img src="'+ data[i][2] +'"><h3>'+ data[i][1] +'</h3></a><a href="#" data-icon="location"></a></li>';

                $("#list_view").append(strHTML);
            }

            $("#list_view").list_view("refresh", true);
        }
    </script>
</head>

<body>
    <div data-role="page" id="home" data-position="fixed">
        <div data-role="header" data-theme="b">
            <h1>頁首</h1>
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
                <li>
                    <a href="#">
                        <img src="http://fakeimg.pl/350x350/00CED1/FFF/?text=img+placeholder">
                        <h3>Hotel-101</h3>
                        <p>死亡並不第一個距離夏，男孩較大發送職工值得大學主頁日記方法能力後面性感記，沒想。</p>
                        <span class="ui-li-count">授權精采</span>
                    </a>
                    <a href="https://goo.gl/maps/NyjzV58NnWBe3pMB6" data-icon="location"></a>
                </li>
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