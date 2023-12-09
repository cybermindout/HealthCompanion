<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
include("../Assets/Connection/Connection.php");
	require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';

if(isset($_GET["aid"]))
{
	$up="update tbl_appointment set appointment_status=1 where appointment_id='".$_GET["aid"]."'";
	$Conn->query($up);

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'helphealthcompanion@gmail.com'; // Your gmail
    $mail->Password = 'fwhqprenhqxxeglh'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('helphealthcompanion@gmail.com'); // Your gmail
  
    $mail->addAddress($_GET["email"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Update About Appointment";
    $mail->Body = "Hello"." ".$_GET["name"]." "."Your Appointment is Accepted ";
  $mail->send();
  
 

}
if(isset($_GET["rid"]))
{
	$up="update tbl_appointment set appointment_status=2 where appointment_id='".$_GET["rid"]."'";
	$Conn->query($up);
	 $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'helphealthcompanion@gmail.com'; // Your gmail
    $mail->Password = 'fwhqprenhqxxeglh'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('helphealthcompanion@gmail.com'); // Your gmail
  
    $mail->addAddress($_GET["email"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Update About Appointment";
    $mail->Body = "Hello"." ".$_GET["name"]." "."Your Appointment is Rejected ";
  $mail->send();
  
}
?>
<form id="form1" name="form1" method="post" action="">
<center><h1>New Appointments</h1></center>
  <table border="1" cellpadding="10" align="center">
    <tr>
      <td>Sl.No</td>
      <td>Name Of User</td>
      <td>Contact Info</td>
      <td>Appointment Date</td>
      <td>Time</td>
      <td>Action</td>
    </tr>
    <?php
	$sels="select * from tbl_appointment a inner join tbl_user u on u.user_id=a.user_id where a.doctor_id='".$_SESSION["Did"]."' and a.appointment_status=0";
	$row=$Conn->query($sels);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["user_name"]?></td>
      <td><?php echo $data["user_contact"]?></td>
      <td><?php echo $data["appointment_date"]?></td>
      <td><?php echo $data["appointment_time"]?></td>
      <td><a href="ViewAppointments.php?aid=<?php echo $data["appointment_id"]?>&email=<?php echo $data["user_email"]?>&name=<?php echo $data["user_name"]?>">Accept</a> | <a href="ViewAppointments.php?rid=<?php echo $data["appointment_id"]?>&email=<?php echo $data["user_email"]?>&name=<?php echo $data["user_name"]?>">Reject</a></td>
    </tr>
    <?php
	}
	?>
  </table>
  <br />
  <hr />
  <br />
  <center><h1>Accepted Appointments</h1></center>
  <table border="1" cellpadding="10" align="center">
    <tr>
      <td>Sl.No</td>
      <td>Name Of User</td>
      <td>Contact Info</td>
      <td>Appointment Date</td>
      <td>Time</td>
      <td>Action</td>
    </tr>
    <?php
	$sels="select * from tbl_appointment a inner join tbl_user u on u.user_id=a.user_id where a.doctor_id='".$_SESSION["Did"]."' and a.appointment_status=1";
	$row=$Conn->query($sels);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["user_name"]?></td>
      <td><?php echo $data["user_contact"]?></td>
      <td><?php echo $data["appointment_date"]?></td>
      <td><?php echo $data["appointment_time"]?></td>
      <td> <a href="ViewAppointments.php?rid=<?php echo $data["appointment_id"]?>&email=<?php echo $data["user_email"]?>&name=<?php echo $data["user_name"]?>">Reject</a> </td>
    </tr>
    <?php
	}
	?>
  </table>
  <br />
  <hr />
  <br />
  <center><h1>Rejected Appointments</h1></center>
  <table border="1" cellpadding="10" align="center">
    <tr>
      <td>Sl.No</td>
      <td>Name Of User</td>
      <td>Contact Info</td>
      <td>Appointment Date</td>
      <td>Time</td>
      <td>Action</td>
    </tr>
    <?php
	$sels="select * from tbl_appointment a inner join tbl_user u on u.user_id=a.user_id where a.doctor_id='".$_SESSION["Did"]."' and a.appointment_status=2";
	$row=$Conn->query($sels);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["user_name"]?></td>
      <td><?php echo $data["user_contact"]?></td>
      <td><?php echo $data["appointment_date"]?></td>
      <td><?php echo $data["appointment_time"]?></td>
      <td><a href="ViewAppointments.php?aid=<?php echo $data["appointment_id"]?>&email=<?php echo $data["user_email"]?>&name=<?php echo $data["user_name"]?>">Accept</a></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
</html>