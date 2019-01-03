<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';
?>

<?php
$id = $_POST['id'];
$sql = "update chara set title = :title, categories_id = :categories_id, body = :body, video = :video, extra = :extra where id = :id;" ;
$query = $db->prepare($sql);
$query->bindValue(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindParam(':categories_id',$_POST['categories_id'],PDO::PARAM_INT);
$query->bindValue(':body',$_POST['body'],PDO::PARAM_STR);
$query->bindValue(':video',$_POST['video'],PDO::PARAM_STR);
$query->bindValue(':extra',$_POST['extra'],PDO::PARAM_STR);
echo $query->bindValue(':id',$id,PDO::PARAM_INT);

if (!$query->execute()) {
    print_r($query->errorInfo());
}else{
    redirect_to("show.php?id={$id}");
}
?>
