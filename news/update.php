<?php
include "../public/session.php";
include "../public/db.php";
include "../public/functions.php";
$currentId=$_GET["id"];//获取当前id
$tree=new abc();
$tree->tree(0,1,$db,"category",$currentId);
$sql="select * from category where cid=".$currentId;
$result=$db->query($sql);
$row=$result->fetch_assoc();
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
    form{
        width: 400px;
        margin:100px  auto;
        border: 1px solid cornflowerblue;
        border-collapse: collapse;
        text-align: left;
        padding-left:50px ;
        padding-top:20px ;
        padding-bottom: 20px;
        background: greenyellow;
    }
</style>
<body>
<form action="updateinfo.php?id=<?php echo $row['cid'] ?>" METHOD="POST">
    修改上级标题：
    <select name="pid">
        <option value="0">一级标题</option>
        <?php echo $tree->str ?>;
    </select><br><br>
    分类标题：<input type="text" name="cname" value="<?php echo $row["cname"] ?>"><br><br>
    <input type="submit" value="提交">
</form>
</body>
</html>
