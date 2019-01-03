<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>new | 人物</title>
	<link href="../p/鬼.png" rel="shortcut icon"/>
</head>
<body>
<h1>新建人物</h1>

<form action="save.php" method="post">
	<label for="title">名称:</label>
	<input type="text" name="title" value="" />
	<br/>
	<label for="body">介绍:</label>
	<textarea name="body"></textarea>
	<br/>
	<br/>
	<label for="video">素材连接1:</label>
	<textarea name="video"></textarea>
	<label for="extra">素材连接2:</label>
	<textarea name="extra"></textarea>
	<br/>
    <br/>
	<label for="categories_id">分类:</label>
	<select name="categories_id">
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
</body>
</html>