<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .box{
            width:300px;height:200px;
            border:1px solid #ccc;
            position: fixed;
            left:0;top:0;right:0;
            bottom: 0;
            margin:auto;
        }
        .title{
            width:100%;height:30px;
            text-align: center;
            line-height: 30px;background: #ccc;
        }
        .con{
            width:100%;height:170px;
            line-height: 30px;text-align: center;
        }
        span{
            color:red;
        }
    </style>
    <script>
        window.onload=function () {
            var span=document.querySelector("span");
            var url=document.querySelector("a").href;

            var num=3;

            var t= setInterval(function(){
                num--;
                if(num==0){
                    clearInterval(t);
                    location.href=url;
                }else {
                    span.innerHTML = num;
                }
            },1000)
        }
    </script>
</head>
<body>
<div class="box">
    <div class="title">
        <?php echo $message?>
    </div>
    <div class="con">
        请登录<br>
        <span>3</span>秒后返回首页<br>
        没有跳转，请 <a href="<?php echo $url?>">点击</a>
    </div>
</div>
</body>
</html>