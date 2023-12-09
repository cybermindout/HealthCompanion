<body>
<?php
include("../Assets/Connection/Connection.php");
if(isset($_GET["aid"]))
{
	$accept="update tbl_doctor set doctor_status=1 where doctor_id='".$_GET["aid"]."'";
	if($Conn->query($accept))
	{
		header("Location:DoctorRejectedList.php");
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
      <td>Speacialization</td>
      <td>Status</td>
    </tr>
    <?php
	$i=0;
	$selD="select * from tbl_doctor d inner join tbl_place p on p.place_id=d.place_id inner join tbl_district ds on ds.district_id=p.district_id inner join tbl_speacialization s on s.speacialization_id=d.specialization_id where doctor_status=2";
	$rowD=$Conn->query($selD);
	while($dataD=$rowD->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $dataD["doctor_name"]?></td>
      <td><?php echo $dataD["doctor_contact"]?></td>
      <td><?php echo $dataD["doctor_email"]?></td>
      <td><?php echo $dataD["doctor_address"]?></td>
      <td><?php echo $dataD["doctor_qualification"]?></td>
      <td><?php echo $dataD["doctor_photo"]?></td>
      <td><?php echo $dataD["doctor_proof"]?></td>
      <td><?php echo $dataD["doctor_dob"]?></td>
      <td><?php echo $dataD["district_name"]?></td>
      <td><?php echo $dataD["place_name"]?></td>
      <td><?php echo $dataD["speacialization_name"]?></td>
      <td><a href="DoctorVerification.php?aid=<?php echo $dataD["doctor_id"]?>">Accept</a></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>