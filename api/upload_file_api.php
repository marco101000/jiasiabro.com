<?php
session_start();
header("Content-Type:text/html; charset=utf-8");

$newname = "id_" . $_SESSION['id'];
//  $newname ="idgfdgfdg";

//存入的文件夾的名字
//$target_dir = "upload/";
$target_dir = "upload/";

//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//basename是返回路徑中的文件名的部分(.png之類的)
//$_FILES["fileToUpload"]["name"]是檔案的原名稱
$target_file = basename($_FILES["fileToUpload"]["name"]);

$file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

//圖片存的完整路徑(類似upload/ 13245435 . jpg)
//$file_name = $target_dir . $newname .'.'.$file_type;
$mktime = mktime(date("H"), date("i"), date("s"), date("n"), date("j"), date("Y"));
$file_name = $target_dir . $mktime . $newname . '.jpg';
$uploadOk = 1;
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

if ($check != false) {
  $uploadOk = 1;
} else {
  echo json_encode("上傳失敗！(不是圖片)");
  $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
  // echo "Sorry, your file is too large.";
  echo json_encode("上傳失敗！(太大了)");
  $uploadOk = 0;
}

if (
  $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
  && $file_type != "gif"
) {
  echo json_encode("上傳失敗！(格式不對)");
  $uploadOk = 0;
}

if ($uploadOk == 1) {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file_name)) {
    echo json_encode($file_name);
  } else {
    echo json_encode("上傳失敗！");
  }
}
