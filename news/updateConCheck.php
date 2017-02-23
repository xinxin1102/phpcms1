<?php
include "../public/session.php";
include "../public/db.php";
$sid=$_GET["id"];
$cid=$_POST["pid"];
$stitle=$_POST["stitle"];
$scon=$_POST["scon"];
$sql="update shows set stitle='$stitle',scon='$scon',cid='$cid' where sid=".$sid;
$db->query($sql);
if($db->affected_rows>0){
    $message="修改成功！";
    $url="editcon.php";
    include "message.php";
    exit;
}else{
    $message="修改失败！";
    $url="updateCon.php";
    include "editcon.php";
    exit;
}
?>