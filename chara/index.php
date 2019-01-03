<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>人物首页 - 鬼畜站</title>
    <link href="../upload/鬼.png" rel="shortcut icon"/>
    <link rel="stylesheet" href="/css/container.css" type="text/css" />
    <script src="/js/time.js"></script>
    <script src="/js/container.js"></script>
</head>

<body onload="startTime()">
<div class="container">
    <a href="../index.php">主页</a>
    <div class="dropdown">
        <button class="dropbtn" onmouseenter="myFunction()" onclick="top.location='/chara/index.php','_top'">人物首页</button>
        <div class="dropdown-content" id="myDropdown" onmouseleave="myFunction1()">
            <a href="./">All</a>
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
            $query = $db->query('select * from categories');
            while ($post = $query->fetchObject()) {
                ?>
                <a href="?categories_id=<?php echo $post->id; ?>"><?php echo $post->name; ?></a>
            <?php }?>
        </div>
    </div>
    <a href="../video/index.php">视频首页</a>
    <a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a>
    <?php
    if (isset($_SESSION['uid'])){
        ?>
        <a href="../users/"><?php echo $_SESSION['uid']; ?>の个人中心</a>
        <a href="/sessions/destroy.php">登出</a>
        <?php
    }
    else{
        ?>
        <a></a><a></a><a></a>
        <a href="../sessions/new.php">登录</a>
        <a href="../users/new.php">注册</a>
        <?php
    }
    ?>
</div>
<div id="now_time"></div>
<form  action="/search/indexuser.php" method="post">
    <label for="search_text">搜索:</label>
    <input type="text" name="search_text" value="" />
    <input type="submit" value="搜索" />
</form>

<table align="center" border="1" width="900px" style="font-size:25px;">
    <?php
    if(isset($_GET{'categories_id'})){
        $query = $db->prepare('select * from categories where id = :categories_id');
        $query->bindValue(':categories_id',$_GET['categories_id'],PDO::PARAM_INT);
        $query->execute();
        $post = $query->fetchObject();?>
    <h1 style="text-align: center"><?php echo $post->name;?></h1>
    <?php
    }
    else{?>
    <h1 style="text-align: center">人物首页</h1>
    <?php
    }
    ?>
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
                <a href="show.php?id=<?php echo $post->id ?>"><img src="../upload/<?php echo $post->pic; ?>" alt="Error" height="100" width="100" /></a>
            </td>
            <td><?php echo $post->fix_at; ?></td>
            <td><a href="../video/show.php?id=<?php echo $post->id;?>">点我观看</a></td>
        </tr>

    <?php  } ?>

    </tbody>
</table>
<p align="right"><a href="admin/">管理员入口</a></p>
</body>
</html>