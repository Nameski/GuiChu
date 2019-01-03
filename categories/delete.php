<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>delete | 分类</title>
    <link href="../upload/鬼.png" rel="shortcut icon"/>
</head>
<body>
<?php
if (isset($_SESSION['uid'])){
    echo '欢迎！';?>
    <a href="../users/" ><?php echo $_SESSION['uid']; ?></a>
    <a href="../sessions/destroy.php">登出</a>
    <?php
}
?>
<?php $id = $_GET['id']; ?>
<form action="destroy.php" method="post">
    <input type="hidden" name="id" value = "<?php echo $id; ?>"/>
    是否删除ID为<?php echo $id; ?>的分类?
    <input type="submit" value="确定">
</form>
<p style="text-align: center; font-size: 30px"><a href="index.php">返回</a></p>
</body>
</html>