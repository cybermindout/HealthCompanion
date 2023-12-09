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
<center><h1>Welcome <?php echo $_SESSION["aname"]?></h1></center>


</body>

<?php
include("header.php");
?>
</html>


<img src="slider-images/Digital-Health.jpg" width="100%" height="100%">
<?php
include("footer.php");
?>