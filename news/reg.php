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
    <script src="../js/jquery.js"></script>
    <script src="../js/ajax.js"></script>
    <script>
        $(function () {
            var btn=$("input[type=submit]");
            //1.用户名
            var reg=/^\w{5,10}$/;
            $("input[name=username]").keyup(function () {
                var val=$(this).val();
                if(!reg.test(val)){
                    $(".message").eq(0).html("格式错误").css("color","red");
                }else{
                    $.ajax({
                        url:"1.php",
                        data:{username:val},
                        success:function (e) {
                            console.log(e);
                           if(e=="ok"){
                                $(".message").eq(0).html("格式正确").css("color","green");
                               $("input[name=username]").attr("ok","ok");
                               if($("input[name=password]").attr("ok")=="ok") {
                                   $(btn).removeAttr("disabled");
                               }
                               }else if(e=="error"){
                                $(".message").eq(0).html("用户名已存在").css("color","red");
                           }
                        }
                    })
                }
            })
            $("input[name=password]").keyup(function () {
                var val=$(this).val();
                if(!reg.test(val)){
                    $(".message").eq(1).html("格式错误").css("color","red");
                }else{
                    $(".message").eq(1).html("格式正确").css("color","green");
                    $("input[name=password]").attr("ok","ok");
                    if($("input[name=username]").attr("ok")=="ok") {
                        $(btn).removeAttr("disabled");
                    }
                }
            })
        })
    </script>
</head>
<body>
<form action="reginfo.php">
    <div class="deng">注册页面</div><br>
    账号：<input type="text" name="username"><br>
    <span class="message"></span><br>
    密码：<input type="text" name="password"><br>
    <span class="message"></span><br>
    <input type="submit" value="注册" name="tijiao" class="tijiao" disabled="disabled"><br>
    已有用户名,请<a href="login.php">点击登录</a>
</form>
</body>
</html>