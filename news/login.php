<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form{
            width: 400px;
            margin:100px  auto;
            border: 1px solid cornflowerblue;
            border-collapse: collapse;
            text-align: center;

        }
        input{
            height: 30px;
            margin-bottom: 10px;
            line-height: 30px;
            border-bottom: 1px solid #000000;
            margin-left: 10px;
        }
        .tijiao{
            width: 30%;
            text-align: center;
            margin-left: 70px;
        }
        .deng{
            color: greenyellow;
            background: blueviolet;
            font-size: 20px;
            height: 50px;
            width: 100%;
            text-align: center;
            line-height: 50px;
        }
    </style>
</head>
<body>
<form action="loginf.php">
    <div class="deng">登录页面</div><br>
    账号：<input type="text" name="username" autocomplete="off"><br>
    密码：<input type="text" name="password" autocomplete="off"><br>
    <input type="submit" value="登录" name="tijiao" class="tijiao"><br>
    还没有用户名,请<a href="reg.php">点击注册</a>
</form>
</body>
</html>