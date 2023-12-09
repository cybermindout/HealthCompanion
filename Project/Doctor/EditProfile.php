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
	$up="update tbl_doctor set doctor_name='".$_POST["txt_name"]."',doctor_contact='".$_POST["txt_contact"]."',doctor_address='".$_POST["txt_address"]."' where doctor_id='".$_SESSION["Did"]."'";
	$Conn->query($up);
	header("Location:MyProfile.php");
}
$sel="select * from tbl_doctor where doctor_id='".$_SESSION["Did"]."'";
$row=$Conn->query($sel);
$data=$row->fetch_assoc();
?>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10" align="center">
    <tr>
      <td>Name</td>
      <td><input type="text" name="txt_name" id="txt_name" value="<?php echo $data["doctor_name"]?>" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><input type="text" name="txt_contact" id="txt_contact" value="<?php echo $data["doctor_contact"]?>" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><textarea name="txt_address" id="txt_address" cols="45" rows="5"><?php echo $data["doctor_address"]?></textarea></td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" name="btn_save" id="btn_save" value="Save" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>