<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_save"]))
{
	$name=$_POST["txt_name"];
	$contact=$_POST["txt_contact"];
	$email=$_POST["txt_email"];
	$address=$_POST["txt_address"];
	$qua=$_POST["txt_qualification"];
	$spe=$_POST["ddl_speacialization"];
	$photo=$_FILES["file_photo"]["name"];
	$temp=$_FILES["file_photo"]["tmp_name"];
	move_uploaded_file($temp,"../Assets/FILES/doctorPhoto/".$photo);
	
	
	$proof=$_FILES["file_proof"]["name"];
	$temp=$_FILES["file_proof"]["tmp_name"];
	move_uploaded_file($temp,"../Assets/FILES/doctorProof/".$proof);
	
	$dob=$_POST["txt_dob"];
	
	$place=$_POST["ddl_place"];
	$password=$_POST["txt_password"];

	
	$insQry="insert into tbl_doctor(doctor_name,doctor_contact,doctor_email,doctor_address,doctor_photo,doctor_proof,doctor_dob,place_id,doctor_password,specialization_id,doctor_qualification)values('".$name."','".$contact."','".$email."','".$address."','".$photo."','".$proof."','".$dob."','".$place."','".$password."','".$spe."','".$qua."')";
	$Conn->query($insQry);
}
?>
<?php
include("header.php");
?>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="1" cellpadding="10">
    <tr>
      <td>Name</td>
      <td><input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><input type="text" name="txt_contact" id="txt_contact" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><textarea name="txt_address" id="txt_address" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Qualification</td>
      <td><input type="text" name="txt_qualification" id="txt_qualification" /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><input type="file" name="file_photo" id="file_photo" /></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><input type="file" name="file_proof" id="file_proof" /></td>
    </tr>
    <tr>
      <td>Dob</td>
      <td><input type="date" name="txt_dob" id="txt_dob" /></td>
    </tr>
    <tr>
      <td>District</td>
      <td><select name="ddl_district" onchange="getPlace(this.value)" id="ddl_district">
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
      <td><select name="ddl_place" id="ddl_place">
      <option value="">---select---</option>
      
      </select></td>
    </tr>
    <tr>
      <td>Speacialization</td>
      <td><select name="ddl_speacialization" id="ddl_speacialization">
      <option value="">---select---</option>
           <?php
	  $seldis="select * from tbl_speacialization";
	  $rowdis=$Conn->query($seldis);
	  while($datadis=$rowdis->fetch_assoc())
	  {
		  ?>
          <option value="<?php echo $datadis["speacialization_id"]?>"><?php echo $datadis["speacialization_name"]?></optSion>
          <?php
	  }
	  ?>
      </select></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="txt_password" id="txt_password" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_save" id="btn_save" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
<script src="../Assets/JQuery/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?pid="+did,
		success: function(html){
			$("#ddl_place").html(html);
		}
	});
}
</script>
</html>
<?php
include("footer.php");
?>