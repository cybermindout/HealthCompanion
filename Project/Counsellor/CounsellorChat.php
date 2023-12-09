<?php
ob_start();
include("Header.php");
session_start();
include("../Assets/Connection/Connection.php");
$selQry = "select * from tbl_counsellor where counsellor_id='".$_SESSION["cid"]."'";
$result = $Conn->query($selQry);
$data = $result->fetch_assoc();

if(isset($_GET["status"]))
{
 $upQry = "update tbl_counsellor set chat_status='".$_GET["status"]."' where  counsellor_id='".$_SESSION["cid"]."'";
	if($Conn->query($upQry))
	{
		header("Location:counsellorChat.php");
	}
}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chat</title>
</head>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<body>
<?php 
if($data["chat_status"]==1)
{
	?>
    	<a href="counsellorChat.php?status=0" style="color:white;background-color:#0F0;padding:10px;border-radius:5px;margin-left:20px">Active</a>
    <?php
}
if($data["chat_status"]==0)
{
	?>
    	<a href="counsellorChat.php?status=1" style="color:white;background-color:#F33;padding:10px;border-radius:5px;margin-left:20px">In-Active</a>
    <?php
}
?>
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

	$selQ="select distinct(cchat_fromuid) from tbl_cchat dc inner join tbl_counsellor u on (u.counsellor_id=dc.cchat_tocid) where u.counsellor_id='".$_SESSION["cid"]."'";
	$result1 = $Conn->query($selQ);
	while($data1 = $result1->fetch_assoc())
	{

	 $selQ2="select * from tbl_cchat  where cchat_tocid='".$_SESSION["cid"]."' and cchat_fromuid='".$data1["cchat_fromuid"]."' order by cchat_datetime desc";
	$result12 = $Conn->query($selQ2);
	$data12 = $result12->fetch_assoc();

		$selQ1="select * from tbl_user where user_id='".$data1["cchat_fromuid"]."'";
		$result11 = $Conn->query($selQ1);
		if($data11 = $result11->fetch_assoc())
		{
			$i++;
		?>
			<tr>

			<td><?php echo $i; ?></td>
			<td><?php echo $data11["user_name"]; ?></td>
			<td><?php echo $data12["cchat_datetime"]; ?></td>
            <td><a href="Chat.php?cid=<?php echo $data11["user_id"]?>&img=<?php echo $data11["user_photo"]?>&name=<?php echo $data11["user_name"]?>">Chat</a>
		</td>
			</tr>
	
		<?php
		}
	}
?>
</table>




</body>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</html>
<?php
ob_flush();
include("Footer.php");
?>