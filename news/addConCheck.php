<?php
include "../public/session.php";
include "../public/db.php";
$cid=$_GET["pid"];
$stitle=$_GET["stitle"];
$scon=$_GET["scon"];
$username=$_SESSION["username"];
$sql="insert into shows (stitle,scon,cid,username) values ('$stitle','$scon','$cid','$username')";
$db->query($sql);
if($db->affected_rows>0){
    $message="添加成功！";
    $url="addCon.php";
    include "message.php";
    exit;
}
?>