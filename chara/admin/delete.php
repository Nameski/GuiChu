<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>delete | 人物</title>
    <link href="../../upload/鬼.png" rel="shortcut icon"/>
</head>
<body>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/check.php';
if (isset($_SESSION['uid'])){
    echo '欢迎！';?>
    <a href="/users/" ><?php echo $_SESSION['uid']; ?></a>
    <a href="../../sessions/destroy.php">登出</a>
    <?php
}
?>
<?php $id = $_GET['id']; ?>
<form action="destroy.php" method="post">
    <input type="hidden" name="id" value = "<?php echo $id; ?>"/>
    是否删除ID为<?php echo $id; ?>的人物?
    <input type="submit" value="确定">
</form>
</body>
<p style="text-align: center; font-size: 30px"><a href="index.php">返回</a></p>
</html>