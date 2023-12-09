<?php
	include("../Connection/Connection.php");
session_start();

   echo  $insQry="insert into tbl_dchat (dchat_todid,dchat_fromuid,dchat_datetime,dchat_content) 
    values('".$_GET["id"]."','".$_SESSION["uid"]."',curtime(),'".$_GET["chat"]."')";
    if($Conn->query($insQry))
    {
        echo "sended";
    }
    else
    {
        echo "failed";
        echo $insQry;
    }
    
?>