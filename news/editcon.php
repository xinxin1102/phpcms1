<?php
include "../public/db.php";
include "../public/session.php";
include  "../public/functions.php";
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
    table{
        width:1000px;
        margin: auto;
        border: 1px solid #000000;
        border-collapse: collapse;
    }
    td,th{
        width: 25%;
        height: 30px;
        text-align: center;
        line-height: 30px;
        border: 1px solid #000000;
        border-top:0;
    }
</style>
<body>
<table>
    <tr>
        <th>id号</th>
        <th>标题</th>
        <th>内容</th>
        <th>父id</th>
        <th>时间</th>
        <th>内容</th>
        <th>操作</th>
    </tr>
    <?php
    $result=$db->query("select * from shows");
    while($row=$result->fetch_assoc()){
    ?>
        <tr>
            <td><?php echo $row["sid"] ?></td>
            <td><?php echo $row["stitle"] ?></td>
            <td><?php echo $row["scon"] ?></td>
            <td><?php echo $row["cid"] ?></td>
            <td><?php echo $row["stime"] ?></td>
            <td><?php echo $row["username"] ?></td>
            <td><a href="delcon.php?id=<?php echo $row["sid"] ?>">删除</a><a href="updateCon.php?id=<?php echo $row["sid"] ?>&cid=<?php echo $row["cid"] ?>">编辑</a></td>
        </tr>
    <?php
    }
    ?>
</table>
</body>
</html>
