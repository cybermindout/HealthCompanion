<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_GET["doc"]))
{
	$_SESSION["doc"]=$_GET["doc"];
}
?>
<form id="form1" name="form1" method="post" action="">
<table align="center" cellpadding="60" id="result">
 <tr>
 <?php
 $i=0;
 $sel="select * from tbl_schedule where doctor_id='".$_GET["doc"]."'";
 //echo $sel;
 $row=$Conn->query($sel);
 while($data=$row->fetch_assoc())
 {
	 $i++;
	 ?>
     <td><p>
     Date:<?php echo $data["schedule_date"]?><br />
     Start Time:<?php echo $data["schedule_starttime"]?><br />
     End Time:<?php echo $data["schedule_entime"]?><br />
     <a href="BookSchedule.php?doc=<?php echo $data["schedule_id"]?>">View Book Schedules</a></p></td>
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
</html>