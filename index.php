<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>首页 - 鬼畜站</title>
    <link href="upload/鬼.png" rel="shortcut icon"/>
    <link rel="stylesheet" href="/css/container.css" type="text/css" />
    <script src="/js/time.js"></script>
    <script src="/js/container.js"></script>
</head>

<body onload="startTime()">
<div class="container">
    <a href="/index.php">主页</a>
    <div class="dropdown">
        <button class="dropbtn" onmouseenter="myFunction()" onclick="top.location='/chara/index.php','_top'">人物首页</button>
        <div class="dropdown-content" id="myDropdown" onmouseleave="myFunction1()">
            <a href="/chara/">All</a>
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
            $query = $db->query('select * from categories');
            while ($post = $query->fetchObject()) {
                ?>
                <a href="/chara/index.php?categories_id=<?php echo $post->id; ?>"><?php echo $post->name; ?></a>
            <?php }?>
        </div>
    </div>
    <a href="/video/index.php">视频首页</a>
    <a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a><a></a>
    <?php
    if (isset($_SESSION['uid'])){
        ?>
        <a href="/users/"><?php echo $_SESSION['uid']; ?>の个人中心</a>
        <a href="/sessions/destroy.php">登出</a>
        <?php
    }
    else{
        ?>
        <a></a><a></a>
        <a href="/sessions/new.php">登录</a>
        <a href="/users/new.php">注册</a>
        <?php
    }
    ?>
</div>
<div id="now_time"></div>
<h1>鬼畜站</h1>
<img src="upload/bg1.jpg"><img style="" width="40%" height="49.25%" src="upload/bg2.jpg"><br>
<h1 style="color: crimson ;font-size:40px " >欢迎来到鬼畜的世界，这里有你想了解的一切！</h1>
</body>
</html>