<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>搜索结果 - 鬼畜站</title>
</head>
<body>
<form action="/search/index.php" method="post">
    <label for="search_text">搜索:</label>
    <?php if(isset($_POST{'search_text'})) {
        $x = $_POST{'search_text'};
    }
    else{
        $x = '';
    }?>

    <input type="text" name="search_text"  value="<?php echo $x ; ?>" />
    <input type="submit" value="搜索" />
</form>

<table align="center" border=1 width="900px" style="font-size:25px;">
    <caption align="center"><h1>搜索结果</h1></caption>
    <thead>
    <tr>
        <th>序号</th>
        <th>人物</th>
        <th>创建时间</th>
        <th>素材</th>
    </tr>
    </thead>
    <tbody>
    <?php $a=1; ?>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
    $search = $_POST['search_text'];
    $query = $db->prepare("select * from chara where title like '%$search%' or id like '{$search}' or body like '%$search%'");
    //$query->bindValue(':search_text',$_POST['search_text'],PDO::PARAM_STR);
    $query->execute();
    while ($post = $query->fetchObject()) {
        ?>

        <tr>
            <td><?php echo $a++ ?></td>
            <td>
                <p style="font-size: 40px;"><a href="../chara/admin/show.php?id=<?php print $post->id; ?>"><?php echo $post->title; ?></a></p>
                <a href="../chara/admin/show.php?id=<?php echo $post->id ?>"><img src="../upload/<?php echo $post->pic; ?>" alt="Error" height="100" width="100" /></a>
            </td>
            <td><br><?php echo $post->fix_at; ?></td>
            <td><a href="../video/index.php?id=<?php echo $post->id;?>">点我观看</a></td>
        </tr>

    <?php  } ?>

    </tbody>
</table>
</body>
<p style="text-align: center; font-size: 30px"><a href="../chara/">返回首页</a></p>
</html>