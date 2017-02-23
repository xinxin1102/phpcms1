<?php
class abc{
    function  _construct(){
        $this->str="";
    }
    function tree($pid,$flag,$db,$table,$currentId=null){
        if($currentId){
            $result=$db->query("select * from $table where cid=".$currentId);
            $row=$result->fetch_assoc();
            $p=$row["pid"];
        }
        $flag=$flag+1;
        $sql="select * from $table where pid=".$pid;
        $row=$result=$db->query($sql);
        while($row=$result->fetch_assoc()){
            $cid=$row["cid"];
            $str=str_repeat("-",$flag);
            if($currentId&&$p==$row["cid"]){
                $this->str.="<option value='$p' selected='selected'>{$str}{$row["cname"]}</option>";
            }else{
                $this->str.="<option value='$cid'>{$str}{$row["cname"]}</option>";
                $this->tree($row["cid"],$flag,$db,$table,$currentId);
            }
        }
    }
    function table($pid,$flag,$db,$table){
        $flag=$flag+1;
        $result=$db->query("select * from $table where pid=".$pid);
        while($row=$result->fetch_assoc()){
            $cid=$row["cid"];
            $cname=$row["cname"];
            $pid=$row["pid"];
            $str=str_repeat("--",$flag);
            $this->str.="<tr><td>$cid</td><td>$cname</td><td>$pid</td>
				<td>
				<a href='del.php?id=$cid' target='right'>删除</a>
				<a href='update.php?id=$cid' target='right'>编辑</a>
				</td>
					</tr>";
            $this->table($row["cid"],$flag,$db,$table);
        }
    }


    function delete($cid,$db,$table){
        $sql="select * from $table where pid=".$cid;//看看 父亲下面有没有孩子
        $result=$db->query($sql);
        $row=$result->fetch_assoc();
        if(!$row){
            $sql="delete from $table where cid=".$cid;
            $db->query($sql);
            if($db->affected_rows>0){
                $message="删除成功！";
                $url="insertc.php";
                include "message.php";
                exit;
            }
        }else{
            $message="有子类，请先删除子类！";
            $url="insertc.php";
            include "message.php";
            exit;
        }
    }
    function treeCon($pid,$flag,$db,$table,$currentId=null){
        $flag=$flag+1;
        $sql="select * from $table where pid=".$pid;
        $row=$result=$db->query($sql);
        while($row=$result->fetch_assoc()){
            $cid=$row["cid"];
            $str=str_repeat("-",$flag);
            if($currentId==$row["cid"]){
                $this->str.="<option value='$cid' selected='selected'>{$str}{$row["cname"]}</option>";
            }else{
                $this->str.="<option value='$cid'>{$str}{$row["cname"]}</option>";
                $this->treeCon($row["cid"],$flag,$db,$table,$currentId);
            }


        }


    }

}
?>