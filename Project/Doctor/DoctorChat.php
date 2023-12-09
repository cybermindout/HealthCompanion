<?php
ob_start();
include("Header.php");
session_start();
include("../Assets/Connection/Connection.php");
$selQry = "select * from tbl_doctor where doctor_id='".$_SESSION["Did"]."'";
$result = $Conn->query($selQry);
$data = $result->fetch_assoc();

if(isset($_GET["status"]))
{
 $upQry = "update tbl_doctor set chat_status='".$_GET["status"]."' where  doctor_id='".$_SESSION["Did"]."'";
	if($Conn->query($upQry))
	{
		header("Location:DoctorChat.php");
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
<?php 
if($data["chat_status"]==1)
{
	?>
    	<a href="DoctorChat.php?status=0" style="color:white;background-color:#0F0;padding:10px;border-radius:5px;margin-left:20px">Active</a>
    <?php
}
if($data["chat_status"]==0)
{
	?>
    	<a href="DoctorChat.php?status=1" style="color:white;background-color:#F33;padding:10px;border-radius:5px;margin-left:20px">In-Active</a>
    <?php
}
?>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<table border="1" align="center">
	<tr>
		<td>
			SL.No
		</td>
		<td>
			User
		</td>
		<td>
			Date
		</td>
		<td>
			Action
		</td>
	</tr>
<?php
$i=0;

	$selQ="select distinct(dchat_fromuid) from tbl_dchat dc inner join tbl_doctor u on (u.doctor_id=dc.dchat_todid) where u.doctor_id='".$_SESSION["Did"]."'";
	$result1 = $Conn->query($selQ);
	while($data1 = $result1->fetch_assoc())
	{

	 $selQ2="select * from tbl_dchat  where dchat_todid='".$_SESSION["Did"]."' and dchat_fromuid='".$data1["dchat_fromuid"]."' order by dchat_datetime desc";
	$result12 = $Conn->query($selQ2);
	$data12 = $result12->fetch_assoc();

		$selQ1="select * from tbl_user where user_id='".$data1["dchat_fromuid"]."'";
		$result11 = $Conn->query($selQ1);
		if($data11 = $result11->fetch_assoc())
		{
			$i++;
		?>
			<tr>

			<td><?php echo $i; ?></td>
			<td><?php echo $data11["user_name"]; ?></td>
			<td><?php echo $data12["dchat_datetime"]; ?></td>
            <td><a href="Chat.php?did=<?php echo $data11["user_id"]?>&img=<?php echo $data11["user_photo"]?>&name=<?php echo $data11["user_name"]?>">Chat</a>
		</td>
			</tr>
	
		<?php
		}
	}
?>
</table>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />



</body>
</html>
<?php
ob_flush();
include("Footer.php");
?>