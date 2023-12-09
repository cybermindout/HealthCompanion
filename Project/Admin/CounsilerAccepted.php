<body>
<?php
include("header.php");
?>
<?php
include("../Assets/Connection/Connection.php");
if(isset($_GET["aid"]))
{
	$accept="update tbl_counsiler set counsiler_status=1 where counsiler_id='".$_GET["aid"]."'";
	if($Conn->query($accept))
	{
		header("Location:CounsilerVerification.php");
	}
}


?>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10">
    <tr>
      <td>ID</td>
      <td>Name</td>
      <td>Contact</td>
      <td>Email</td>
      <td>Address</td>
      <td>Qualification</td>
      <td>Photo</td>
      <td>Proof</td>
      <td>DOB</td>
      <td>District</td>
      <td>Place</td>
      <td>Status</td>
    </tr>
    <?php
	$i=0;
	$selD="select * from tbl_counsiler d inner join tbl_place p on p.place_id=d.place_id inner join tbl_district ds on ds.district_id=p.district_id where counsiler_status=1";
	$rowD=$Conn->query($selD);
	while($dataD=$rowD->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $dataD["counsiler_name"]?></td>
      <td><?php echo $dataD["counsiler_contact"]?></td>
      <td><?php echo $dataD["counsiler_email"]?></td>
      <td><?php echo $dataD["counsiler_address"]?></td>
      <td><?php echo $dataD["counsiler_qualification"]?></td>
      <td><?php echo $dataD["counsiler_photo"]?></td>
      <td><?php echo $dataD["counsiler_proof"]?></td>
      <td><?php echo $dataD["counsiler_dob"]?></td>
      <td><?php echo $dataD["district_name"]?></td>
      <td><?php echo $dataD["place_name"]?></td>
      <td><a href="CounsilerVerification.php?rid=<?php echo $dataD["counsiler_id"]?>">Reject</a></td>
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