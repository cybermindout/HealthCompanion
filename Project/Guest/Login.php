<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
?>

<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_login"]))
{
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"];
	
	$selA="select * from tbl_admin where admin_email='".$email."' and admin_password='".$password."'";
	$rowA=$Conn->query($selA);
	
	if($dataA=$rowA->fetch_assoc())
	{
		$_SESSION["aid"]=$dataA["admin_id"];
		$_SESSION["aname"]=$dataA["admin_name"];
		header("Location:../Admin/HomePage.php");

	}
	
		$selU="select * from tbl_user where user_email='".$email."' and user_password='".$password."'";
	$rowU=$Conn->query($selU);
	
	if($dataU=$rowU->fetch_assoc())
	{
		$_SESSION["uid"]=$dataU["user_id"];
		$_SESSION["aname"]=$dataU["user_name"];
		header("Location:../User/HomePage.php");
		
	}
	$selD="select * from tbl_doctor where doctor_email='".$email."' and doctor_password='".$password."' and doctor_status=1";
	$rowD=$Conn->query($selD);
	
	if($dataD=$rowD->fetch_assoc())
	{
		$_SESSION["Did"]=$dataD["doctor_id"];
		$_SESSION["aname"]=$dataD["doctor_name"];
		header("Location:../Doctor/HomePage.php");
   }
   
   $selC="select * from tbl_counsiler where counsiler_email='".$email."' and counsiler_password='".$password."' and counsiler_status=1";
	$rowC=$Conn->query($selC);
	
	if($dataC=$rowC->fetch_assoc())
	{
		$_SESSION["cid"]=$dataC["counsiler_id"];
		$_SESSION["aname"]=$dataC["counsiler_name"];
		header("Location:../counsiller/HomePage.php");
	}
}
?>
<?php
include("header.php");
?>

<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10" align="center">
    <tr>
      <td>Email</td>
      <td><input type="text" name="txt_email" id="txt_email" autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="txt_password" id="txt_password" /></td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" name="btn_login" id="btn_login" value="LOGIN" /></td>
    </tr>
  </table>
</form>


</body>
</html>
<?php
include("footer.php");
?>