<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>delete | 人物</title>
    <link href="../p/鬼.png" rel="shortcut icon"/>
</head>
<body>
<?php $id = $_GET['id']; ?>
<form action="destroy.php" method="post">
    <input type="hidden" name="id" value = "<?php echo $id; ?>"/>
    是否删除ID为<?php echo $id; ?>的人物?
    <input type="submit" value="确定">
</form>
</body>
</html>