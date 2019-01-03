<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>register | 注册</title>
    <link href="../upload/鬼.png" rel="shortcut icon"/>
</head>
<body>
<h1>注   册</h1>
<form action="save.php" method="post">
    <label for="id">账号:</label>
    <input type="text" name="id" value="" />
    <br><br>
    <label for="password">密码:</label>
    <input type="password" name="password" value="" />
    <br><br>
    <label for="nickname">昵名:</label>
    <input type="text" name="nickname" value="" />
    <br><br>
    <label for="sex">性别:</label>
    <input type="radio" style="vertical-align:middle; margin-top:0;" name="sex" value="男" checked="checked">男
    <input type="radio" style="vertical-align:middle; margin-top:0;" name="sex" value="女">女<br><br>
    <input type="submit" value="提交" />
</form>
<p style="text-align: center; font-size: 30px"><a href="index.php">返回</a></p>
</body>
</html>