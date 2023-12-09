<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
ob_start();
include("Header.php");
include("../Assets/Connection/Connection.php");""
?>
<form id="form1" name="form1" method="post" action="">
<div align="center">
<br /><br /><br /><br /><br /><br />
  <table border="1" cellpadding="10" style="border-collapse:collapse">
    <tr>
      	 	<td><select name="ddl_district" onchange="getPlace(this.value)" id="ddl_district" required="">
      				<option value="">---select district---</option>
          			 <?php
						  $seldis="select * from tbl_district";
						  $rowdis=$Conn->query($seldis);
						  while($datadis=$rowdis->fetch_assoc())
	  						{
						?>
          						<option value="<?php echo $datadis["district_id"]?>"><?php echo $datadis["district_name"]?></option>
      					 <?php
	  					}
	  						?>
      			</select>
                </td>
      <td><select name="ddl_place" id="ddl_place" onchange="getcounsellor()" required="">
      <option value="">---select place---</option>
      
      </select></td>
  
     
     
    </tr>
  </table>
 <br />
 <hr />
 <br />
 <table align="center" cellpadding="60" id="result">
 <tr>
 <?php
 $i=0;
 $sel="select * from tbl_counsellor  d  inner join tbl_place p on p.place_id=d.place_id inner join tbl_district dt on dt.district_id=p.district_id where d.counsellor_status=1";
 //echo $sel;
 $row=$Conn->query($sel);
 while($data=$row->fetch_assoc())
 {
	 $i++;
	 ?>
     <td><p><img src="../Assets/FILES/counsellorPhoto/<?php echo $data["counsellor_photo"]?>" width="150" height="150" /><br />
     Name:<?php echo $data["counsellor_name"]?><br />
     Contact:<?php echo $data["counsellor_contact"]?><br />
     Email:<?php echo $data["counsellor_email"]?><br />
     <a href="BookCounsellor.php?doc=<?php echo $data["counsellor_id"]?>">Make Appointment</a>
	<br>
	
	 <?php
		if($data["chat_status"]==0)
		{
			?>
            In-Active
            <?php
		}
		else
		{
			?>
            <a href="CChat.php?did=<?php echo $data["counsellor_id"]?>&img=<?php echo $data["counsellor_photo"]?>&name=<?php echo $data["counsellor_name"]?>">Chat</a>
            <?php 
		}
		?>
	
	</p></td>
     <?php
	 if($i==4)
	 {
		 echo "</tr>";
		 echo "<tr>";
		 $i=0;
	 }
 }
 ?>
 </table>

</form>
<?php
ob_flush();
include("Footer.php");
?>
</body>
<script src="../Assets/JQuery/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?pid="+did,
		success: function(html){
			$("#ddl_place").html(html);
			getcounsellor()
		}
	});
}
function getcounsellor()
{
	var did=document.getElementById("ddl_district").value;
	var pid=document.getElementById("ddl_place").value;
	
	$.ajax({
		url:"../Assets/AjaxPages/Ajaxcounsellor.php?did="+did+"&pid="+pid,
		success: function(html){
			$("#result").html(html);
		}
	});
}
</script>
</html>