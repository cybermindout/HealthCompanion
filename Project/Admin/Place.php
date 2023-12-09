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
	$place=$_POST["txt_place"];
	$district=$_POST["ddl_district"];
	
	$insQry="insert into tbl_place(place_name,district_id)values('".$place."','".$district."')";
	if($Conn->query($insQry))
	{
		?>
        <script>
		alert("Data Inserted");
		window.location="Place.php";
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("Data Insertion Failed");
		window.location="Place.php";
        </script>
		<?php
	}
}
if(isset($_GET["did"]))
{
	$delQry="delete from tbl_place where place_id='".$_GET["did"]."'";
	if($Conn->query($delQry))
	{
		header("Location:Place.php");
	}
	else
	{
		?>
        <script>
		alert("Data Deletion Failed");
		window.location="Place.php";
        </script>
		<?php
	}
}
?>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10" align="center">
    <tr>
      <td>District</td>
      <td><select name="ddl_district" id="ddl_district">
      <option value="">---select---</option>
      <?php
	  $seldis="select * from tbl_district";
	  $rowdis=$Conn->query($seldis);
	  while($datadis=$rowdis->fetch_assoc())
	  {
		  ?>
          <option value="<?php echo $datadis["district_id"]?>"><?php echo $datadis["district_name"]?></option>
          <?php
	  }
	  ?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><input type="text" name="txt_place" id="txt_place" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_save" id="btn_save" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  <br />
  <br />
  <table border="1" cellpadding="10" align="center">
    <tr>
      <td>SI.NO</td>
      <td>District</td>
      <td>Place</td>
      <td>Action</td>
    </tr>
   <?php
	$i=0;
	$selQry="select * from tbl_place p inner join tbl_district d on d.district_id=p.district_id";
	$row=$Conn->query($selQry);
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["district_name"]?></td>
      <td><?php echo $data["place_name"]?></td>
      <td><a href="Place.php?did=<?php echo $data["place_id"]?>">Delete</a></td>
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