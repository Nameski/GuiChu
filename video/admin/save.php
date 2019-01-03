<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';;

if(empty($_POST["title"])){
    echo "标题不能为空！";
    exit();
};

$sql = "insert into chara(title, categories_id, body, video, extra) values(:title, :categories_id, :body, :video, :extra);" ;
$query = $db->prepare($sql);
$query->bindParam(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindParam(':categories_id',$_POST['categories_id'],PDO::PARAM_INT);
$query->bindParam(':body',$_POST['body'],PDO::PARAM_STR);
$query->bindParam(':video',$_POST['video'],PDO::PARAM_STR);
$query->bindParam(':extra',$_POST['extra'],PDO::PARAM_STR);

if (!$query->execute()) {
    print_r($query->errorInfo());
}else{
     redirect_to("./");
};
?>
