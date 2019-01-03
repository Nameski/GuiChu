<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>show | 人物</title>
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
        <a></a><a></a>
        <a href="../sessions/new.php">登录</a>
        <a href="../users/new.php">注册</a>
        <?php
    }
    ?>
</div>
<div id="now_time"></div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';

$query = $db->prepare('select * from chara where id = :id');
$query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
$query->execute();
$post = $query->fetchObject();
?>
<h1 style="font-size: 40px"><?php echo $post->title ?></h1>

<?php
$sql = $db->prepare("select count(*) from collections where chara_id = {$_GET['id']}");
$sql->execute();
$num = $sql->fetch();
$count = $num[0];
?>

<?php
if(isset($_SESSION['id'])){
$uid = $_SESSION['id'];
}
else{
    $uid='';
}
$check = $db->prepare("select * from collections where chara_id = {$_GET['id']} and uid = '$uid'");
$check->execute();
$is_collected = $check->fetchObject();
?>

<a style="color: red; font-size: 25px; text-align: right">已有<?php echo $count ?>收藏</a>

<?php
if(isset($is_collected->uid)){?>
<a href="../collections/destroy.php?id=<?php echo $_GET['id']?>"><img src="../upload/已收藏.png" height="100" width="95" ></a>
<?php
}
else{?>
    <a href="../collections/save.php?id=<?php echo $_GET['id']?>"><img src="../upload/未收藏.png" height="95" width="100" ></a>
<?php
}
?>

<p style="font-size: 25px"><?php echo htmlentities($post->body) ?></p>

<h2>素材链接</h2>
<a href="<?php echo $post->video ?>"><?php echo $post->video ?></a>
<br><br>
<a href="<?php echo $post->extra ?>"><?php echo $post->extra ?></a>
<br><br>
<a href="../video/show.php?id=<?php echo $_GET['id']; ?>">前往素材页</a>
<br><br>
<?php
$a = 1;
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
$query = $db->prepare('select * from comments where chara_id = :id');
$query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
$query->execute();
while ($post = $query->fetchObject()) {
    ?>
    <a><?php echo $a++.'--'; ?> </a>
    <a><?php echo $post->created_at; ?> </a>
    <a><?php echo $post->nickname; ?></a>
    <p><?php echo $post->body; ?></p>
    <br><br>
<?php  } ?>
<form action="/comment/save.php" method="post">
    <input type="hidden" name="chara_id" value = "<?php echo $id = $_GET['id']; ?>"/>
    <?php if(isset($_SESSION['uid'])){?>
        <input type="hidden" name="nickname" value="<?php echo $_SESSION['uid']; ?>" />
        <?php
    }
    ?>
    <?php if(!isset($_SESSION['uid'])){?>
        <input type="hidden" name="nickname" value="游客" />
        <?php
    }
    ?>
    <label for="body">发表评论:</label>
    <textarea name="body"></textarea>
    <br/>
    <input type="submit" value="提交" />
</form>
</body>
</html>