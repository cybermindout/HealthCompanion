<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("header.php");
?>

<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_save"]))
{
	$speacialization=$_POST["txt_speacialization"];
	
	$insQry="insert into tbl_speacialization(speacialization_name)values('".$speacialization."')";
	if($Conn->query($insQry))
	{
		?>
        <script>
		alert("Data Inserted");
		window.location="Speacialization.php";
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("Data Insertion Failed");
		window.location="Speacialization.php";
        </script>
		<?php
	}
}
if(isset($_GET["did"]))
{
	$delQry="delete from tbl_speacialization where speacialization_id='".$_GET["did"]."'";
	if($Conn->query($delQry))
	{
		header("Location:Speacialization.php");
	}
	else
	{
		?>
        <script>
		alert("Data Deletion Failed");
		window.location="Speacialization.php";
        </script>
		<?php
	}
}
?>
	
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10" align="center">
    <tr>
      <td>Speacialization</td>
      <td><input type="text" name="txt_speacialization" id="txt_speacialization" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_save" id="btn_save" value="Submit" />
      <input type="reset" name="txt_cancel" id="txt_cancel" value="Cancel" /></td>
    </tr>
  </table>
  <br />
  <br />
  <table border="1" cellpadding="10" align="center">
    <tr>
      <td>SI.NO</td>
      <td>Speacialization</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
	$selQry="select * from tbl_speacialization";
	$row=$Conn->query($selQry);
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["speacialization_name"] ?></td>
      <td><a href="Speacialization.php?did=<?php echo $data["speacialization_id"]?>">Delete</a></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
<?php
include("footer.php");
?>

</body>
</html>