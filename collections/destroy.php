<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/check.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';

$sql = 	"delete from collections where chara_id = :chara_id and uid = :uid" ;
$query = $db->prepare($sql);
$query->bindValue(':chara_id',$_GET['id'],PDO::PARAM_INT);
$query->bindValue(':uid',$_SESSION['id'],PDO::PARAM_STR);
if (!$query->execute()) {
    print_r($query->errorInfo());
}else{
    redirect_to("../chara/show.php?id={$_GET['id']}");
};
?>