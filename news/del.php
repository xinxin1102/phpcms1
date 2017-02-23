<?php
include "../public/session.php";
include "../public/db.php";
include "../public/functions.php";
$cid=$_GET["id"];
$delete=new abc();
$delete->delete($cid,$db,"category");
?>