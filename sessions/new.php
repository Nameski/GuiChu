<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>login | 登录</title>
    <link href="../upload/鬼.png" rel="shortcut icon"/>
</head>
<body>
<h1>登   录</h1>
<form name="users" method="post" action="save.php" onSubmit="return InputCheck(this)">
    <p>
        <label for="id" class="label">用户名:</label>
        <input name="id" type="text" class="input" value="" />
    </p>
    <p>
        <label for="password" class="label">密 码:</label>
        <input name="password" type="password" class="input" />
    </p>
    <p><input type="submit" name="submit" value="  确 定  " class="left" /></p>
</form>
<?php
if(isset($_SESSION['err']))
{?>
    <a style="color: red"><?php echo $_SESSION['err']; ?></a>
    <?php
    $_SESSION['err'] = '';
}
?>
</body>
</html>