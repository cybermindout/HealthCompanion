<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("../Assets/Connection/Connection.php");""
?>
<form id="form1" name="form1" method="post" action="">
<div align="center">
<br /><br /><br /><br /><br /><br />
  <table border="1" cellpadding="10">
    <tr>
      	 	<td><select name="ddl_district" onchange="getPlace(this.value)" id="ddl_district">
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
      <td><select name="ddl_place" id="ddl_place" onchange="getDoctor()">
      <option value="">---select place---</option>
      
      </select></td>
  
      <td><select name="ddl_speacialization" id="ddl_speacialization" onchange="getDoctor()">
      <option value="">---select Speacialization---</option>
     <?php
	  $seldis="select * from tbl_speacialization";
	  $rowdis=$Conn->query($seldis);
	  while($datadis=$rowdis->fetch_assoc())
	  {
	?>
          <option value="<?php echo $datadis["speacialization_id"]?>"><?php echo $datadis["speacialization_name"]?></option>
     <?php
	  }
	  ?>
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
 $sel="select * from tbl_doctor  d inner join tbl_speacialization s on s.speacialization_id=d.specialization_id inner join tbl_place p on p.place_id=d.place_id inner join tbl_district dt on dt.district_id=p.district_id where d.doctor_status=1";
 //echo $sel;
 $row=$Conn->query($sel);
 while($data=$row->fetch_assoc())
 {
	 $i++;
	 ?>
     <td><p><img src="../Assets/FILES/doctorPhoto/<?php echo $data["doctor_photo"]?>" width="150" height="150" /><br />
     Name:<?php echo $data["doctor_name"]?><br />
     Contact:<?php echo $data["doctor_contact"]?><br />
     Email:<?php echo $data["doctor_email"]?><br />
     <a href="ViewSchedule.php?doc=<?php echo $data["doctor_id"]?>">View Schedule</a></p></td>
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
</body>
<script src="../Assets/JQuery/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?pid="+did,
		success: function(html){
			$("#ddl_place").html(html);
			getDoctor()
		}
	});
}
function getDoctor()
{
	var did=document.getElementById("ddl_district").value;
	var pid=document.getElementById("ddl_place").value;
	var sid=document.getElementById("ddl_speacialization").value;
	$.ajax({
		url:"../Assets/AjaxPages/AjaxDoctor.php?did="+did+"&pid="+pid+"&sid="+sid,
		success: function(html){
			$("#result").html(html);
		}
	});
}
</script>
</html>