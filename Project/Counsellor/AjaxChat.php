<?php
include("../Assets/Connection/Connection.php");
session_start();

    $insQry="insert into tbl_cchat (cchat_fromcid,cchat_touid,cchat_content,cchat_datetime) values('".$_SESSION["cid"]."','".$_GET["id"]."','".$_GET["chat"]."',DATE_FORMAT(sysdate(), '%M %d %Y, %h:%i %p'))";
    if($Conn->query($insQry))
    {
        echo "sended";
    }
    else
    {
        echo "failed";
    }
    
?>