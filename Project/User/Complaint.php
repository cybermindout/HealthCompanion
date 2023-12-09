<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint</title>
</head>

<body>
<?php
session_start();
ob_start();
include("Header.php");
include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_submit"]))
{
	$content=$_POST["txt_complaint"];
	
	$insQry="insert into tbl_complaint(complaint_content,user_id,complaint_date)values('".$content."','".$_SESSION['uid']."',curdate())";
	
	if($Conn->query($insQry))
		{ 
			header("Location:Complaint.php");
		}
		
	}
	

	
?>
<div id="tab" align="center">

<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td align="center">COMPLAINT </td>
    </tr>
    <tr>
      <td><label for="txt_complaint"></label>
      <textarea name="txt_complaint" id="txt_complaint" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <table width="200" border="1">
    <tr>
      <td>Sl.No</td>
      <td>Complaint </td>
      <td>Date</td>
      <td>Reply</td>
    </tr>
    
    <?php
	$selqry="select * from tbl_complaint where user_id=$_SESSION[uid]";
	$result=$Conn->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
		{
			$i++;
		?>
        
    
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["complaint_content"]?></td>
      <td><?php echo $data["complaint_date"]?></td>
      <td><?php echo $data["complaint_reply"]?></td>
    </tr>
    
    	<?php
		}
  
		?>
   
    
  </table>
</form>
</div>
</body>
</html>
<?php
include("Footer.php");
ob_flush();
?>