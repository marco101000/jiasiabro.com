<?php
session_start();

if (!isset($_SESSION["account"])) {
    echo
        '<script>
            alert("尚未登入");
            location.href = "mem_login.php";
        </script>';
}

if ($_SESSION["active"] == 0 || $_SESSION["control"] == 0 || $_SESSION["control"] == 1) {
    echo
        '<script>
            history.go(-1)
        </script>';
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width ,initial-scale=1">
    <title>會員列表</title>
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
    <script src="js/jquery-2.1.0.min.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>
    <script>
        $(function() {
            $.ajax({
                type: "GET",
                url: "api/mem_list_api.php",
                dataType: "json",
                async: false, //設定同步問題  設定不同步讓ajax的先跑完 再執行以下動作
                success: show,
                error: function() {
                    alert("api/mem_list_api.php接收錯誤!");
                }
            });
        });


        function show(data) {
            $("#mem_tbody").empty();
            // console.log(data);
            for (i = 0; i < data.length; i++) {
                strHTML =
                    '<tr><td>' + data[i].ID +
                    '</td><td>' + data[i].Account +
                    '</td><td>' + data[i].Tel +
                    '</td><td>' + data[i].Email +
                    '</td><td>' + data[i].Gender +
                    '</td><td>' + data[i].Region +
                    '</td><td>' + data[i].Birth +
                    '</td><td>' + data[i].Work +
                    '</td><td>' + data[i].Created_at +
                    '</td><td><div data-role="fieldcontain"><label for="active" class="select"></label><select name="active" id="active' + data[i].ID +
                    '" data-id="' + data[i].ID + '"><option value="1">啟用</option><option value="0">停用</option></select></div></td><td><div data-role="fieldcontain"><label for="control" class="select"></label><select name="control" id="control' + data[i].ID +
                    '" data-id="' + data[i].ID + '"><option value="0">遊客</option><option value="1">一般會員</option><option value="2">管理者</option></select></div></td></tr>';

                $("#mem_tbody").append(strHTML);

                $("#active" + data[i].ID).val(data[i].Active);
                $("#control" + data[i].ID).val(data[i].Control);
                // console.log(data[i].ID);

                // console.log(data[i].ID);
                // console.log(data[i].Active);
                // console.log(data[i].Control);

                // $("#active" + data[i].ID).selectmenu("refresh", true);       不知道為甚麼，不用refresh
                // $("#control" + data[i].ID).selectmenu("refresh", true);      不知道為甚麼，不用refresh

                //帳號啟用停用
                $("#active" + data[i].ID).change(function() {
                    // console.log($(this).data('id'));
                    // console.log(data[i].ID);
                    if (confirm("確定更改啟用狀態")) {
                        $.ajax({
                            type: "POST",
                            url: "api/mem_active_api.php",
                            data: {
                                id: $(this).data('id'),
                                active: $(this).val()
                            },
                            success: active_success,
                            error: function() {
                                alert("api/mem_active_api.php error");
                            }
                        });
                    } else {
                        window.history.go(0);
                        alert("取消更改");
                    }
                });


                //權限管理
                $("#control" + data[i].ID).change(function() {
                    // console.log($(this).data('id'));
                    // console.log(data[i].ID);
                    if (confirm("確定權限更改?????")) {
                        $.ajax({
                            type: "POST",
                            url: "api/mem_control_api.php",
                            data: {
                                id: $(this).data('id'),
                                control: $(this).val()
                            },
                            success: control_success,
                            error: function() {
                                alert("api/mem_control_api.php error");
                            }
                        });
                    } else {
                        location.href= "mem_list_2.php";
                        alert("取消更改");
                    }
                });
            }
        }

        function active_success(data) {
            // console.log(data.ID);
            alert("啟用狀態更改成功");
            // history.go(0);
        }

        function control_success(data) {
            // console.log(data.ID);
            alert("權限更改成功");
            // history.go(0);
        }
    </script>
</head>

<body>
    <div data-role="page" id="home">
        <div data-role="header" data-theme="b">
            <h1>會員列表</h1>
        </div>
        <div role="main" class="ui-content">
            <table data-role="table" class="ui-body-d ui-shadow table-stripe ui-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>帳號</th>
                        <th>電話</th>
                        <th>電子信箱</th>
                        <th>性別</th>
                        <th>地區</th>
                        <th>生日</th>
                        <th>職業</th>
                        <th>註冊時間</th>
                        <th>啟用狀態</th>
                        <th>權限管理</th>

                    </tr>
                </thead>
                <tbody id="mem_tbody">
                    <tr>
                        <td>001</td>
                        <td>aaaaaa</td>
                        <td>44444444</td>
                        <td>aaaa</td>
                        <td>aaaa</td>
                        <td>aaaa</td>
                        <td>aaaa</td>
                        <td>aaaa</td>
                        <td>aaaa</td>
                        <td>
                            <div data-role="fieldcontain">
                                <label for="active" class="select">啟用狀態</label>
                                <select name="active" id="active">
                                    <option value="1">啟用</option>
                                    <option value="0">停用</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div data-role="fieldcontain">
                                <label for="control" class="select">權限管理</label>
                                <select name="control" id="control">
                                    <option value="0">遊客</option>
                                    <option value="1">一般會員</option>
                                    <option value="2">管理者</option>
                                </select>
                            </div>
                        </td>
                        <!-- <td>
                            <button id="delete_btn">刪除</button>
                        </td> -->
                    </tr>
                </tbody>
            </table>
        </div>
        <div data-role="footer" data-theme="b" data-position="fixed">
            <h1>footer</h1>
        </div>
    </div>
</body>

</html>