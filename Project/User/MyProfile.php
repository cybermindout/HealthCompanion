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
$sel="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
$row=$Conn->query($sel);
$data=$row->fetch_assoc();
?>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10" align="center">
    <tr>
      <td>Name</td>
      <td><?php echo $data["user_name"]?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["user_contact"]?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data["user_email"]?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data["user_address"]?></td>
    </tr>
  </table>
</form>
</body>
</html>