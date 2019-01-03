<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>edit | 鬼畜站 </title>
    <link href="../../upload/鬼.png" rel="shortcut icon"/>
</head>
<body>.
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/check.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
$id = $_GET['id'];
$query = $db->prepare('select * from chara where id = :id');
$query->bindValue(':id', $id,PDO::PARAM_INT);
$query->execute();
$post = $query->fetchObject();
?>
<h1>编辑人物信息:</h1>

<form action="update.php" method="post">
    <input type="hidden" name="id" value = "<?php echo $id; ?>"/>
    <label for="title">名称</label>
    <input type="text" name="title" value="<?php echo $post->title; ?>" />
    <br/>
    <br/>
    <label for="body">介绍</label>
    <textarea name="body">
			<?php echo $post->body; ?>
		</textarea>
    <br/>
    <br/>
    <label for="video">素材</label>
    <textarea name="video">
			<?php echo $post->video; ?>
		</textarea>
    <textarea name="extra">
			<?php echo $post->extra; ?>
		</textarea>
    <br/>
    <br/>
    <label>分类</label>
    <select autofocus name="categories">
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
        $query = $db->query('select * from categories');
        while ($post = $query->fetchObject()) {
            ?>
            <option value="<?php echo $post->id; ?>"><?php echo $post->name; ?></option>
        <?php }?>
    </select>
    <br/>
    <br/>
    <input type="submit" value="提交" />
</form>
<p style="text-align: center; font-size: 30px"><a href="index.php">返回</a></p>
</body>
</html>