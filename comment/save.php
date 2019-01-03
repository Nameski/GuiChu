<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';

$sql = "insert into comments(nickname, body, chara_id) values(:nickname, :body, :chara_id);" ;
$query = $db->prepare($sql);
$query->bindParam(':body',$_POST['body'],PDO::PARAM_STR);
$query->bindParam(':chara_id',$_POST['chara_id'],PDO::PARAM_INT);
$query->bindParam(':nickname',$_POST['nickname'],PDO::PARAM_STR);
$chara_id = $_POST{'chara_id'};
$nickname = $_POST{'nickname'};

if (!$query->execute()) {
    print_r($query->errorInfo());
}else{
    if($nickname == '管理员_'.$_SESSION['uid'])
        redirect_to("/chara/admin/show.php?id={$chara_id}");
    else
        redirect_to("/chara/show.php?id={$chara_id}");
};
?>