<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>video | 素材 </title>
    <link href="../upload/鬼.png" rel="shortcut icon"/>
    <link rel="stylesheet" href="/css/container.css" type="text/css" />
    <script src="../js/time.js"></script>
    <script src="../js/container.js"></script>
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
<table align="center" border=30 width="750px"  style="font-size:30px;">
    <h1 align="center">人物素材</h1>
    <thead>
    <tr>
        <th>序号</th>
        <th>人物</th>
        <th>链接</th>
    </tr>
    </thead>

    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/db.php';

    $query = $db->prepare('select * from chara ORDER by id');
    $query->execute();
    while($post = $query->fetchObject()){?>
        <tr>
            <td><?php echo $post->id; ?></td>
            <td>
                <a href="../chara/show.php?id=<?php echo $post->id; ?>" ><?php echo $post->title ?></a><br>
                <a href="../chara/show.php?id=<?php echo $post->id ?>"><img src="../upload/<?php echo $post->pic; ?>" alt="Error" height="100" width="100" /></a>
            </td>
            <td>
                <a href="<?php echo $post->video ?>" target="_blank">1.<img src="../upload/素材链接.png" alt="Error" height="80" width="150" /></a>
                <?php  $extra = $post->extra;?>
                <?php

                if(empty($extra) == false){
                    ?>

                    <a href="<?php echo $post->extra ?>" target="_blank">2.<img src="../upload/素材链接.png" alt="Error" height="80" width="150" /></a>

                <?php }?>
            </td>
        </tr>
        <?php
    }?>
</table>
</body>
</html>
