<?php
    include "../public/session.php";
    include "../public/db.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    *{
        box-sizing: border-box;
    }
    html,body{
        width: 100%;
        height:100%;
        margin: 0;
        padding: 0;
    }
    a{
        text-decoration: none;
        color: black;
    }
    .header{
        width:100%;
        height:18%;
        border-bottom: 2px solid #000;
        text-align: center;
    }
    .main{
        width:100%;height:80%;
    }
    .left{
        float:left;
        width:20%;
        height:100%;
        border-right:2px solid #000;
    }
    .right{
        float:left;
        width:80%;
        height:100%;
    }
    iframe{
        width:100%;height:100%;
    }
    .opt{
        cursor: pointer;
    }
</style>
<script src="../js/jquery.js"></script>
<script>
    $(function(){
        $(".opt").click(function(){
            $(this).find(".son").toggle(100);
        })
            $("a").click(function (event) {
                event.stopPropagation();
            })

    })
</script>
<body>
<div class="header">
    <h1>
        <?php echo $_SESSION["username"]?>欢迎来到属于你的天地
    </h1>
    <h2><a href="loginout.php">退出</a></h2>
</div>
<div class="main">
    <div class="left">
        <ul class="menu">
            <li class="opt">
                用户管理
                <ul class="son">
                    <li><a href="" target="right">添加用户</a></li>
                    <li><a href="" target="right">管理用户</a></li>
                </ul>
            </li>

            <li class="opt">
                分类管理
                <ul class="son">
                    <li><a href="addcontory.php" target="right">添加分类</a></li>
                    <li><a href="insertc.php" target="right">管理分类</a></li>
                </ul>
            </li>

            <li class="opt">
                内容管理
                <ul class="son">
                    <li><a href="addCon.php" target="right">添加内容</a></li>
                    <li><a href="editcon.php" target="right">管理内容</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <div class="right">
        <iframe src="" frameborder="0" name="right">
        </iframe>
    </div>
</div>
</body>
</html>