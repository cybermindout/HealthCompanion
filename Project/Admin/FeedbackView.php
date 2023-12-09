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
include("head.php");

?>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
   <tr>
      <td colspan="3">feedback view</td>
    </tr>
    <tr>
      <td>Sl.No</td>
      <td>Content</td>
      <td>Date</td>
    </tr>
       <?php
	$selqry="select * from tbl_feedback" ;
	$result=$Conn->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
		{
			$i++;
		?>
   
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["feedback_content"]?></td>
      <td><?php echo $data["feedback_date"]?></td>
      
      <?php
		}
		?>
   
    </tr>
  </table>
</form>
<?php
include("Foot.php");
?>
</body>

</html>