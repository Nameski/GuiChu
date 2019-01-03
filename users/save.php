<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';

$hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
$sql = "insert into users(id, password, nickname, sex) values(:id, :password, :nickname, :sex);";
$query = $db->prepare($sql);
$query->bindParam(':id',$_POST['id'],PDO::PARAM_STR);
$query->bindParam(':password',$hash,PDO::PARAM_STR);
$query->bindParam(':nickname',$_POST['nickname'],PDO::PARAM_STR);
$query->bindParam(':sex',$_POST['sex'],PDO::PARAM_STR);

if (!$query->execute()) {
    print_r($query->errorInfo());
}else{
    redirect_to("../session/new.php");
};
?>
