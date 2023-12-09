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
if(isset($_POST["btn_save"]))
{
	$sel="select * from tbl_doctor where doctor_id='".$_SESSION["cid"]."' and doctor_password='".$_POST["txt_cupass"]."'";
	$rowp=$Conn->query($sel);
	if($data=$rowp->fetch_assoc())
	{
		if($_POST["txt_npass"]==$_POST["txt_Conpass"])
		{
			$up="update tbl_doctor set doctor_password='".$_POST["txt_npass"]."' where doctor_id='".$_SESSION["cid"]."'";
			if($Conn->query($up))
			{
				?>
                <script>
				alert("Password Changed");
				window.location="HomePage.php";
                </script>
                <?php
			}
			
		}
		else
		{
			?>
                <script>
				alert("Password MisMatch");
				window.location="HomePage.php";
                </script>
                <?php
		}
	}
	else
	{
		?>
                <script>
				alert("Current Password Wrong");
				window.location="HomePage.php";
                </script>
                <?php
	}
}
?>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10" align="center">
    <tr>
      <td>Current Password</td>
      <td><input type="password" name="txt_cupass" id="txt_cupass" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><input type="password" name="txt_npass" id="txt_npass" /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><input type="password" name="txt_Conpass" id="txt_Conpass" /></td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" name="btn_save" id="btn_save" value="Save" />
      <input type="submit" name="txt_cancel" id="txt_cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>