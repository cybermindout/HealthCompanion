<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
session_start();
ob_start();
include("Header.php");
include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_submit"]))
{
	$feedback=$_POST["txt_feedback"];
	
	$insQry="insert into tbl_feedback(feedback_content)values('".$feedback."')";
	
	if($Conn->query($insQry))
		{ 
			header("Location:Feedback.php");
		}
		
	}
	

	
?>


<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td align="center">Feedback</td>
    </tr>
    <tr>
      <td><label for="txt_feedback"></label>
      <textarea name="txt_feedback" id="txt_feedback" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</div>
</body>
</html>
<?php
include("Footer.php");
ob_flush();
?>