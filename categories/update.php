<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/check.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';
?>
<?php
$id = $_POST['id'];
$sql = "update categories set name = :name where id = :id;" ;
$query = $db->prepare($sql);
$query->bindValue(':name',$_POST['name'],PDO::PARAM_STR);
echo $query->bindValue(':id',$id,PDO::PARAM_INT);

if (!$query->execute()) {
    print_r($query->errorInfo());
}else{
    redirect_to("./");
}
?>
