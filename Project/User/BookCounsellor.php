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
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$sel="select * from tbl_cappointment where cappointment_date='".$_POST["txt_date"]."' and cappointment_time='".$_POST["txt_time"]."' and cappointment_status=1";
	$row=$Conn->query($sel);
	if($data=$row->fetch_assoc())
	{
		?>
        <script>
		alert("Already Booked");
        </script>
        <?php
	}
	else
	{
		$ins="insert into tbl_cappointment(cappointment_date,cappointment_time,user_id,counsiler_id)values('".$_POST["txt_date"]."','".$_POST["txt_time"]."','".$_SESSION["uid"]."','".$_GET["doc"]."')";
		$Conn->query($ins);
	}
}
?>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10">
    <tr>
      <td>Date</td>
      <td><label for="txt_date"></label>
      <input type="date" name="txt_date" id="txt_date" /></td>
    </tr>
    <tr>
      <td>Time</td>
      <td><label for="txt_time"></label>
      <input type="time" name="txt_time" id="txt_time" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
</form>
<?php
ob_flush();
include("Footer.php");
?>
</body>
</html>
