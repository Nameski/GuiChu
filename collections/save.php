<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';

if(!isset($_SESSION['id'])){
    $_SESSION['err'] = '请先登录！';
    redirect_to("../sessions/new.php");
}
$sql = "insert into collections(chara_id, uid) values(:chara_id, :uid);" ;
$query = $db->prepare($sql);
$query->bindValue(':chara_id',$_GET['id'],PDO::PARAM_INT);
$query->bindValue(':uid',$_SESSION['id'],PDO::PARAM_STR);
if (!$query->execute()) {
    print_r($query->errorInfo());
}else{
    redirect_to("../chara/show.php?id={$_GET['id']}");
}
?>