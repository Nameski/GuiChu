<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>人物首页 - 鬼畜站</title>
</head>
<body>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/check.php';
if (isset($_SESSION['uid'])){
    echo '欢迎！';?>
    <a href="../users/" ><?php echo $_SESSION['uid']; ?></a>
    <a href="../sessions/destroy.php">登出</a>
    <?php
}
?>
<p align="left"><a href="../chara/admin/">返回</a></p>
<table align="center" border=1 width="350px" style="font-size:25px;">
    <thead>
    <tr>
        <th>序号</th>
        <th>名称</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
    $query = $db->query('select * from categories order by "id"');
    while ($post = $query->fetchObject()) {
        ?>
        <tr>
            <td><?php echo $post->id; ?></td>
            <td><?php echo $post->name; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $post->id; ?>">改</a>
                <a href="delete.php?id=<?php echo $post->id; ?>">删</a>
            </td>
        </tr>
    <?php }?>

    </tbody>
</table>
<p style="text-align: center; font-size: 30px"><a href="new.php">新增</a></p>
</body>
</html>