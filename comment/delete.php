<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>delete | 评论</title>
    <link href="../upload/鬼.png" rel="shortcut icon"/>
</head>
<body>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/check.php';
?>
<?php $comment_id = $_GET['comment_id']; ?>
<?php $chara_id = $_GET['chara_id']; ?>
<form action="destroy.php" method="post">
    <input type="hidden" name="comment_id" value = "<?php echo $comment_id; ?>"/>
    <input type="hidden" name="chara_id" value = "<?php echo $chara_id; ?>"/>
    是否删除此评论?
    <input type="submit" value="确定">
</form>
</body>
</html>