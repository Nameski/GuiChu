<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>搜索结果 - 鬼畜站</title>
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
        <th>操作</th>
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
            <td>
                <a href="../chara/admin/edit.php?id=<?php echo $post->id; ?>">改</a>
                <a href="../chara/admin/delete.php?id=<?php echo $post->id; ?>">删</a>
            </td>
            <td><a href="../video/index.php?id=<?php echo $post->id;?>">点我观看</a></td>
        </tr>

    <?php  } ?>

    </tbody>
</table>
</body>
<p style="text-align: center; font-size: 30px"><a href="../chara/admin/">返回首页</a></p>
</html>