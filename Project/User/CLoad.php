
<?php
include("../Assets/Connection/Connection.php");
session_start();




 $selQry = "select * from tbl_cchat dc inner join tbl_user u on (u.user_id=dc.cchat_touid) or (u.user_id=dc.cchat_fromuid) where u.user_id='".$_SESSION["uid"]."' order by cchat_datetime";
    $rowdis=$Conn->query($selQry);
     while($datadis=$rowdis->fetch_assoc())
  
    {
        if ($datadis["cchat_fromcid"]==$_GET["id"]) {

            $selQry1= "select * from tbl_counsellor where counsellor_id='".$_GET["id"]."'";
    $rowdis1=$Conn->query($selQry1);
     if($datadis1=$rowdis1->fetch_assoc())
  
{
            
?>

<div class="chat-message is-received">
    <img src="../Assets/FILES/counsellorPhoto/<?php echo $datadis1["counsellor_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $datadis1["counsellor_name"] ?></span>
        <div class="message-text"><?php echo $datadis["cchat_content"] ?></div>
    </div>
</div>
    <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>

<?php
        }

} else {
    
?>
<div class="chat-message is-sent">
    <img src="../Assets/FILES/UserPhoto/<?php echo $datadis["user_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $datadis["user_name"] ?></span>
        <div class="message-text"><?php echo $datadis["cchat_content"] ?></div>
    </div>
</div>
        <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>
<?php
    }

        }
    


?>