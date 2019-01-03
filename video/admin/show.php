<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>show | 人物</title>
    <link href="../p/鬼.png" rel="shortcut icon"/>
</head>
<body>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';

$query = $db->prepare('select * from chara where id = :id');
$query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
$query->execute();
$post = $query->fetchObject();
?>
<form action="update.php" method="post">
<h1><?php echo $post->title ?></h1>
<p><?php echo htmlentities($post->body) ?></p>
<h2>素材链接</h2>
    <a href="<?php echo $post->video ?>"><?php echo $post->video ?></a>
    <br>
    <a href="<?php echo $post->extra ?>"><?php echo $post->extra ?></a>
    <br>
    <br>
    <a href="./">返回首页</a><br>
    <a href="../../video/index.php?id=<?php echo $_GET['id']; ?>">前往素材页</a><br><br>
</form>
<h2>评论</h2>
    <?php
    $a = 1;
    require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
    $query = $db->prepare('select * from comments where chara_id = :id');
    $query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
    $query->execute();
    while ($post = $query->fetchObject()) {
        ?>
        <a>#<?php echo $a++; ?></a>
        <a><?php echo $post->created_at; ?></a>
        <a><?php echo $post->nickname; ?> </a><a href="/comment/delete.php?comment_id=<?php echo $post->comment_id; ?>&chara_id=<?php echo $post->chara_id ;?>"> 删除</a>
        <p><?php echo $post->body; ?></p>
        <br><br>
    <?php  } ?>
    <form action="/comment/save.php" method="post">
        <input type="hidden" name="chara_id" value = "<?php echo $comment_id = $_GET['id']; ?>"/>
        <input type="hidden" name="nickname" value = "<?php echo '管理员'; ?>"/>
        <label for="body">发表评论:</label>
        <textarea name="body"></textarea>
        <br/>
        <input type="submit" value="提交" />
    </form>
</body>
</html>