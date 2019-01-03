<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>video | 素材 </title>
    <link href="../upload/鬼.png" rel="shortcut icon"/>
</head>

<table align="center" border=30 width="800px"  style="font-size:30px;">
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

    $query = $db->prepare('select * from chara where id = :id');
    $query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
    $query->execute();
    $post = $query->fetchObject();
    ?>
    <tr>
        <td><?php echo $post->id; ?></td>
        <td>
            <a href="../chara/show.php?id=<?php echo $_GET['id']; ?>" ><?php echo $post->title ?></a>
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
</table>
</body>
</html>
