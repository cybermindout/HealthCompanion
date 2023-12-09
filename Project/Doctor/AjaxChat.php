<?php
include("../Assets/Connection/Connection.php");
session_start();

    $insQry="insert into tbl_dchat (dchat_fromdid,dchat_touid,dchat_content,dchat_datetime) values('".$_SESSION["Did"]."','".$_GET["id"]."','".$_GET["chat"]."',DATE_FORMAT(sysdate(), '%M %d %Y, %h:%i %p'))";
    if($Conn->query($insQry))
    {
        echo "sended";
    }
    else
    {
        echo "failed";
    }
    
?>