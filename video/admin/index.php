<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>人物首页 - 鬼畜站</title>
</head>

<body>
<p align="right"><a href="../">用户入口</a></p>
<ul>
    <li><a style="font-size: 25px;" href="./">All</a></li>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
$query = $db->query('select * from categories');
while ($post = $query->fetchObject()) {
?>
    <li><a style="font-size: 25px;" href="?categories_id=<?php echo $post->id; ?>"><?php echo $post->name; ?></a></li>
<?php }?>
    <li><a style="font-size: 30px;" href="../../categories">查看具体分类</a></li>
</ul>

<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';
if(isset($_POST['submit'])){
    exit('非法访问!');
}?>

<table align="center" border=1 width="900px" style="font-size:25px;">
    <caption align="center"><h1>人物首页</h1></caption>
    <?php
                if(isset($_GET{'categories_id'})){
                    $query = $db->prepare('select * from categories where id = :categories_id');
                    $query->bindValue(':categories_id',$_GET['categories_id'],PDO::PARAM_INT);
                    $query->execute();
                    $post = $query->fetchObject();
                    echo "当前分类为：", $post->name;
                }
                else{
                    echo "当前分类为：All";
                }
                ?>
    <thead>
    <tr>
        <th>序号</th>
        <th>人物</th>
        <th>修改时间</th>
        <th>操作</th>
        <th>素材</th>
    </tr>
    </thead>
    <tbody>
    <?php $a=1; ?>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
    if(!isset($_GET{'categories_id'})){
    $query = $db->query('select * from chara order by id');
    }
    else{
    $query = $db->prepare('select * from chara where categories_id = :categories_id order by id');
    $query->bindValue(':categories_id',$_GET['categories_id'],PDO::PARAM_INT);
    }
    $query->execute();
    while ($post = $query->fetchObject()) {
        ?>

        <tr>
            <td><?php echo $a++ ?></td>
            <td>
                <p style="font-size: 40px;"><a href="show.php?id=<?php print $post->id; ?>"><?php echo $post->title; ?></a></p>
                <a href="show.php?id=<?php echo $post->id ?>"><img src="../p/<?php echo $post->title; ?>.png" alt="Error" height="100" width="100" /></a>
            </td>
            <td><br><?php echo $post->fix_at; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $post->id; ?>">改</a>
                <a href="delete.php?id=<?php echo $post->id; ?>">删</a>
            </td>
            <td><a href="../../video/index.php?id=<?php echo $post->id;?>">点我观看</a></td>
        </tr>

    <?php  } ?>

    </tbody>
</table>
<p style="text-align: center; font-size: 30px"><a href="new.php">新增</p>
</body>
</html>