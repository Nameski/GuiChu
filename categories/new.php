<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>new | 分类</title>
	<link href="../upload/鬼.png" rel="shortcut icon"/>
</head>
<body>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/check.php';
if (isset($_SESSION['uid'])){
    echo '欢迎！';?>
    <a href="/users/" ><?php echo $_SESSION['uid']; ?></a>
    <a href="../sessions/destroy.php">登出</a>
    <?php
}
?>
<h1>新建分类</h1>

<form action="save.php" method="post">
	<label for="name">名称:</label>
	<textarea name="name"></textarea>
	<br/>
    <br/>
	<input type="submit" value="提交" />
</form>
<p style="text-align: center; font-size: 30px"><a href="index.php">返回</a></p>
</body>
</html>