<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/check.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';
$sql = 	"delete from comments where comment_id = :comment_id" ;
$query = $db->prepare($sql);
$query->bindValue(':comment_id',$_POST['comment_id'],PDO::PARAM_INT);

if (!$query->execute()) {
    print_r($query->errorInfo());
}else{
    redirect_to("/chara/admin/show.php?id={$_POST['chara_id']}");
};
?>
