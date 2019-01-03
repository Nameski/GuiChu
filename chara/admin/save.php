<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/check.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';

$temp = explode(".", $_FILES["pic"]["name"]);
$extension = end($temp);
    if ($_FILES["pic"]["error"] > 0)
    {
        echo "错误：: " . $_FILES["pic"]["error"] . "<br>";
    }
    else {
        echo "上传文件名: " . $_FILES["pic"]["name"] . "<br>";
        echo "文件类型: " . $_FILES["pic"]["type"] . "<br>";
        echo "文件大小: " . ($_FILES["pic"]["size"] / 1024) . " kB<br>";
        echo "文件临时存储的位置: " . $_FILES["pic"]["tmp_name"] . "<br>";
        $filename = md5(time() . rand(0, 100)) .'.'.$extension;
        move_uploaded_file($_FILES["pic"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . '/upload/' . $filename);
    }
if ($_FILES["pic"]["error"] > 0)
{
    echo "错误：" . $_FILES["pic"]["error"] . "<br>";
}
else
{
    echo "上传文件名: " . $_FILES["pic"]["name"] . "<br>";
    echo "文件类型: " . $_FILES["pic"]["type"] . "<br>";
    echo "文件大小: " . ($_FILES["pic"]["size"] / 1024) . " kB<br>";
    echo "文件临时存储的位置: " . $_FILES["pic"]["tmp_name"];
}

if(empty($_POST["title"])){
    echo "标题不能为空！";
    exit();
};

$sql = "insert into chara(title, pic, categories_id, body, video, extra) values(:title, :pic, :categories_id, :body, :video, :extra);" ;
$query = $db->prepare($sql);
$query->bindParam(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindParam(':pic',$filename,PDO::PARAM_STR);
$query->bindParam(':categories_id',$_POST['categories_id'],PDO::PARAM_INT);
$query->bindParam(':body',$_POST['body'],PDO::PARAM_STR);
$query->bindParam(':video',$_POST['video'],PDO::PARAM_STR);
$query->bindParam(':extra',$_POST['extra'],PDO::PARAM_STR);

if (!$query->execute()) {
    print_r($query->errorInfo());
}else{
    redirect_to("./");
}
?>
