<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/check.php';

if(empty($_POST["name"])){
    echo "名称不能为空！";
    exit();
};

$sql = "insert into categories(name) values(:name);" ;
$query = $db->prepare($sql);
$query->bindParam(':name',$_POST['name'],PDO::PARAM_STR);

if (!$query->execute()) {
    print_r($query->errorInfo());
}else{
    redirect_to("./");
};
?>
