<?php
include "../public/db.php";
$username=$_GET["username"];
$password=md5($_GET["password"]);
$db->query("insert into user (username,password,role) values ('$username','$password','1')");
if($db->affected_rows>0){
    $message = "注册成功，请登录";
    $url="login.php";
    include "message.php";
};
?>