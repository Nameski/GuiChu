<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';

$query = $db->prepare('select * from users where id = :id');
$query->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
$query->execute();
$post = $query->fetchObject();
$hash = $post->password;
if(password_verify($_POST['password'], $hash)){
    echo '密码正确，登录成功';
    $_SESSION['id'] = $post->id;
    $_SESSION['uid'] = $post->nickname;
    $_SESSION['power'] = $post->power;
    redirect_to("../index.php");
}else{
    echo '密码错误，请重新输入';
    $_SESSION['err'] = '密码错误！';
    redirect_to("new.php");
};
?>
