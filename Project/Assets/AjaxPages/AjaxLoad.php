<?php
	include("../Connection/Connection.php");
session_start();
    $selQry = "select * from tbl_dchat c inner join tbl_user u on c.dchat_fromuid=u.user_id where  c.dchat_id='".$_GET["cid"]."' order by  dchat_datetime";
   $result=$Conn->query($selQry);
   while ($row=$result->fetch_assoc()) {

    if($row["user_id"]==$_SESSION["uid"]){

        
?>

<div class="chat-message is-sent">
    <img src="../Assets/Files/UserPhoto/<?php echo $row["user_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $row["user_name"] ?></span>
        <div class="message-text"><?php echo $row["chat_content"] ?></div>
        <span style="font-size:10px;"><?php echo $row["chat_time"] ?></span>
    </div>
    
</div>
    <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>

<?php
   }
   else{
    ?>

<div class="chat-message is-received">
    <img src="../Assets/Files/UserPhoto/<?php echo $row["user_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $row["user_name"] ?></span>
        <div class="message-text"><?php echo $row["chat_content"] ?></div>
        <span style="font-size:10px;"><?php echo $row["chat_time"] ?></span>
    </div>
</div>
    <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>

<?php
   }
   }
?>