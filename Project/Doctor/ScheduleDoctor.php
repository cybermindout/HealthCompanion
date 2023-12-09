<?php
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$scheduledate=$_POST["txt_date"];
	$starttime=$_POST["txt_starttime"];
	$endtime=$_POST["txt_endtime"];
	
	$insQry="insert into tbl_schedule(schedule_date,schedule_starttime,schedule_entime,doctor_id)values('".$scheduledate.".','".$starttime."','".$endtime."','".$_SESSION["Did"]."')";
	if($Conn->query($insQry))
	{
		?>
        <script>
		alert("Data Inserted");
		window.location="schedule.php";
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("Data Insertion Failed");
		window.location="schedule.php";
        </script>
		<?php
	}
}
if(isset($_GET["did"]))
{
	$delQry="delete from tbl_schedule where schedule_id='".$_GET["did"]."'";
	if($Conn->query($delQry))
	{
		header("Location:schedule.php");
	}
	else
	{
		?>
        <script>
		alert("Data Deletion Failed");
		window.location="schedule.php";
        </script>
		<?php
	}
}
?>











<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10">
    <tr>
      <td>Schedule Date</td>
      <td><label for="txt_date"></label>
      <input type="date" name="txt_date" id="txt_date" /></td>
    </tr>
    <tr>
      <td>Start Time</td>
      <td><label for="txt_time"></label>
      <input type="time" name="txt_starttime" id="txt_starttime" /></td>
    </tr>
    <tr>
      <td>End Time</td>
      <td><label for="txt_endtime"></label>
      <input type="time" name="txt_endtime" id="txt_endtime" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="cancel" /></td>
    </tr>
  </table>
  .
</form>
</body>
</html>