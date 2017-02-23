<?php
include "../public/db.php";
include "../public/session.php";
include "../public/functions.php";
$cid=$_GET["id"];
$pid=$_POST["pid"];
$cname=$_POST["cname"];
$sql="update category set cname='$cname',pid='$pid' where cid=".$cid;
$db->query($sql);
if($db->affected_rows>0){
    $message="修改成功！";
    $url="insertc.php";
    include "message.php";
    exit;
}
?>