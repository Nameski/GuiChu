<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>编辑分类 | 鬼畜站 </title>
    <link href="../upload/鬼.png" rel="shortcut icon"/>
</head>
<body>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/check.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
$id = $_GET['id'];
$query = $db->prepare('select * from categories where id = :id');
$query->bindValue(':id', $id,PDO::PARAM_INT);
$query->execute();
$post = $query->fetchObject();
?>
<h1>编辑分类信息:</h1>

<form action="update.php" method="post">
    <input type="hidden" name="id" value = "<?php echo $id; ?>"/>
    <label for="name">名称</label>
    <input type="text" name="name" value="<?php echo $post->name; ?>" />
    <br/>
    <br/>
    <input type="submit" value="提交" />
</form>
<p style="text-align: center; font-size: 30px"><a href="index.php">返回</a></p>
</body>
</html>