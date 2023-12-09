
<?php
include("../Assets/Connection/Connection.php");
session_start();




 $selQry = "select * from tbl_dchat dc inner join tbl_doctor u on (u.doctor_id=dc.dchat_todid) or (u.doctor_id=dc.dchat_fromdid) where u.doctor_id='".$_SESSION["Did"]."' order by dchat_datetime";
    $rowdis=$Conn->query($selQry);
     while($datadis=$rowdis->fetch_assoc())
  
    {
        if ($datadis["dchat_fromuid"]==$_GET["id"]) {

            $selQry1= "select * from tbl_user where user_id='".$_GET["id"]."'";
    $rowdis1=$Conn->query($selQry1);
     if($datadis1=$rowdis1->fetch_assoc())
  
{
            
?>

<div class="chat-message is-received">
    <img src="../Assets/FILES/UserPhoto/<?php echo $datadis1["user_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $datadis1["user_name"] ?></span>
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
    <img src="../Assets/FILES/doctorPhoto/<?php echo $datadis["doctor_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $datadis["doctor_name"] ?></span>
        <div class="message-text"><?php echo $datadis["dchat_content"] ?></div>
    </div>
</div>
        <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>
<?php
    }

        }
    


?>