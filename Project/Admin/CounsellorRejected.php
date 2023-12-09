<body>
<?php
include("head.php");
?>
<?php
include("../Assets/Connection/Connection.php");
if(isset($_GET["rid"]))
{
	$reject="update tbl_counsellor set counsellor_status=2 where counsellor_id='".$_GET["rid"]."'";
	if($Conn->query($reject))
	{
		header("Location:counsellorVerification.php");
	}
}


?>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10" style="border-collapse:collapse">
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
	$selD="select * from tbl_counsellor d inner join tbl_place p on p.place_id=d.place_id inner join tbl_district ds on ds.district_id=p.district_id where counsellor_status=2";
	$rowD=$Conn->query($selD);
	while($dataD=$rowD->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $dataD["counsellor_name"]?></td>
      <td><?php echo $dataD["counsellor_contact"]?></td>
      <td><?php echo $dataD["counsellor_email"]?></td>
      <td><?php echo $dataD["counsellor_address"]?></td>
      <td><?php echo $dataD["counsellor_qualification"]?></td>
      <td><a href="../Assets/FILES/counsellorPhoto/<?php echo $dataD["counsellor_photo"]?>" target="_blank">
	  <img src="../Assets/FILES/counsellorPhoto/<?php echo $dataD["counsellor_photo"]?>" height="150" width="150"/></a>
  </td>
  <td><a href="../Assets/FILES/counsellorProof/<?php echo $dataD["counsellor_proof"]?>" target="_blank">
      <img src="../Assets/FILES/counsellorProof/<?php echo $dataD["counsellor_proof"]?>" height="120" width="120"/></a>
  </td>
      <td><?php echo $dataD["counsellor_dob"]?></td>
      <td><?php echo $dataD["district_name"]?></td>
      <td><?php echo $dataD["place_name"]?></td>
      <td><a href="CounsellorVerification.php?aid=<?php echo $dataD["counsellor_id"]?>">Accept</a></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
<?php
include("foot.php");
?>

</body>