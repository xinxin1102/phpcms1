<?php
include "../public/session.php";
include "../public/db.php";
include "../public/functions.php";
$sid=$_GET["id"];
$currentId=$_GET["cid"];
$tree=new abc();
$tree->treeCon(0,1,$db,"category",$currentId);
$sql="select * from shows where sid=".$sid;
$result=$db->query($sql);
$row=$result->fetch_assoc();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
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
    .tijiao{
        width: 60px;
        height: 35px;
        margin-left: 120px;
    }
</style>
<body>
<form action="updateConCheck.php?id=<?php echo $sid ?>" method="post">
    上级分类&nbsp;<select name="pid">
        <option value="0">一级分类</option>
        <?php
        echo $tree->str;
        ?>
    </select><br/><br/>
    标&nbsp;题&nbsp;&nbsp;<input type="text" name="stitle" value="<?php echo $row["stitle"] ?>" /><br/><br>
    内容&nbsp;&nbsp;&nbsp;<textarea name="scon" rows="10" cols="45"><?php echo $row["scon"] ?></textarea><br/><br/>
    <input type="submit" name="" id="" value="提交" class="tijiao" />
</form>
</body>
</html>