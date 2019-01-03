<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $_SESSION['uid'] ?>_个人中心</title>
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
            <a href="../chara/index.php">All</a>
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
            $query = $db->query('select * from categories');
            while ($post = $query->fetchObject()) {
                ?>
                <a href="../chara/index.php?categories_id=<?php echo $post->id; ?>"><?php echo $post->name; ?></a>
            <?php }?>
        </div>
    </div>
    <a href="/video/index.php">视频首页</a>
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
<table align="center" border=1 width="900px" style="font-size:25px;">
    <thead>
    <tr>
        <th>ID</th>
        <th>昵名</th>
        <th>性别</th>
        <th>注册时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <h1 style="text-align: center">个人中心</h1>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';
    $query = $db->prepare('select * from users where id = :id');
    $query->bindValue(':id',$_SESSION['id'],PDO::PARAM_STR);
    $query->execute();
    $post = $query->fetchObject();
    ?>
    <tr>
        <td>
            <a><?php echo $post->id; ?></a>
        </td>
        <td>
            <a><?php echo $post->nickname; ?></a>
        </td>
        <td>
            <a><?php echo $post->sex; ?></a>
        </td>
        <td>
            <a><?php echo $post->date; ?></a>
        </td>
        <td>
            <a href="edit.php">编辑个人信息</a>
        </td>
    </tr>
    </tbody>
</table>
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
        <h1 style="text-align: center">我的收藏</h1>
        <?php
    }
    ?>
    <thead>
    <tr>
        <th>序号</th>
        <th>人物</th>
        <th>创建时间</th>
        <th>素材</th>
        <th>收藏于</th>
    </tr>
    </thead>
    <tbody>
    <?php $a=1; ?>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
    $query = $db->prepare('select * from collections INNER JOIN chara ON chara_id = id where uid = :uid order by collected_at');
    $query->bindValue(':uid',$_SESSION['id'],PDO::PARAM_STR);
    $query->execute();
    while ($post = $query->fetchObject()) {
        ?>

        <tr>
            <td><?php echo $a++ ?></td>
            <td>
                <p style="font-size: 40px;"><a href="../chara/show.php?id=<?php print $post->id; ?>"><?php echo $post->title; ?></a></p>
                <a href="../chara/show.php?id=<?php echo $post->id ?>"><img src="../upload/<?php echo $post->pic; ?>" alt="Error" height="100" width="100" /></a>
            </td>
            <td><?php echo $post->fix_at; ?></td>
            <td><a href="../video/show.php?id=<?php echo $post->id;?>">点我观看</a></td>
            <td><a><?php echo $post->collected_at ?></a></td>
        </tr>

    <?php  } ?>

    </tbody>
</table>
</body>
</html>