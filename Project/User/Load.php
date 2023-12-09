
<?php
include("../Assets/Connection/Connection.php");
session_start();




 $selQry = "select * from tbl_dchat dc inner join tbl_user u on (u.user_id=dc.dchat_touid) or (u.user_id=dc.dchat_fromuid) where u.user_id='".$_SESSION["uid"]."' order by dchat_datetime";
    $rowdis=$Conn->query($selQry);
     while($datadis=$rowdis->fetch_assoc())
  
    {
        if ($datadis["dchat_fromdid"]==$_GET["id"]) {

            $selQry1= "select * from tbl_doctor where doctor_id='".$_GET["id"]."'";
    $rowdis1=$Conn->query($selQry1);
     if($datadis1=$rowdis1->fetch_assoc())
  
{
            
?>

<div class="chat-message is-received">
    <img src="../Assets/FILES/doctorPhoto/<?php echo $datadis1["doctor_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $datadis1["doctor_name"] ?></span>
        <div class="message-text"><?php echo $datadis["dchat_content"] ?></div>
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
        <div class="message-text"><?php echo $datadis["dchat_content"] ?></div>
    </div>
</div>
        <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>
<?php
    }

        }
    


?>