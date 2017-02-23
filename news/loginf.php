<?php
session_start();//session_start的作用是开启$_SESION,需要在$_SESION使用之前调用。PHP $_SESION 变量用于存储关于用户会话（session）的信息
include "../public/db.php";
$username=$_GET["username"];
$password=md5($_GET["password"]);//加密
$result=$db->query("select * from user");
while($row=$result->fetch_assoc()){//每次取一行
    if($row["username"]==$username){
        if($row["password"]==$password){
            $_SESSION["is_login"]="yes";//可以跨界面 访问信息     如果查询到相关同的信息时再用用户输入的密码和数据库中的作比对，相同同在sesion中标记用户登录成功$_SESSION['is_login'] = "yes"，获得用户ID
            $_SESSION["username"]=$username;//把与用户相关的所有信息（ID识别）都从数据库里面读取出来然后分别写入SESSION,如  $_SESSION['username'] = "张三"。
            $message="登录成功";
            $url="main.php";
            include "message.php";
            exit;
        }
    }
}
$message="登录失败";
$url="login.php";
include "message.php";
?>