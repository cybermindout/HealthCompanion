<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Counsellor</title>
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
	$photo=$_FILES["file_photo"]["name"];
	$temp=$_FILES["file_photo"]["tmp_name"];
	move_uploaded_file($temp,"../Assets/FILES/counsellorPhoto/".$photo);
	
	
	$proof=$_FILES["file_proof"]["name"];
	$temp=$_FILES["file_proof"]["tmp_name"];
	move_uploaded_file($temp,"../Assets/FILES/counsellorProof/".$proof);
	
	$dob=$_POST["txt_dob"];
	$place=$_POST["ddl_place"];
	$password=$_POST["txt_password"];
	
	$insQry="insert into tbl_counsellor(counsellor_name,counsellor_contact,counsellor_email,counsellor_address,counsellor_photo,counsellor_proof,counsellor_dob,place_id,counsellor_password,counsellor_qualification)values('".$name."','".$contact."','".$email."','".$address."','".$photo."','".$proof."','".$dob."','".$place."','".$password."','".$qua."')";
	$Conn->query($insQry);
}
?>
<?php
ob_start();
include("Header.php");
?>
<div id="tab">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="1" cellpadding="10" align="center" style="border-collapse:collapse">
    <tr>
      <td>Name</td>
      <td><input type="text" name="txt_name" id="txt_name" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" required="" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><input type="text" name="txt_contact" id="txt_contact" required="" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="txt_email" id="txt_email" required="" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><textarea name="txt_address" id="txt_address" cols="45" rows="5" required="" autocomplete="off"></textarea></td>
    </tr>
    <tr>
      <td>Qualification</td>
      <td><input type="text" name="txt_qualification" id="txt_qualification" required="" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><input type="file" name="file_photo" id="file_photo" required="" /></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><input type="file" name="file_proof" id="file_proof" required="" /></td>
    </tr>
    <tr>
      <td>Dob</td>
      <td><input type="date" name="txt_dob" id="txt_dob" required="" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>District</td>
      <td><select name="ddl_district" id="ddl_district" onchange="getPlace(this.value)" required="" >
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
      <td><select name="ddl_place" id="ddl_place" required="" >
      <option value="">---select---</option>
           
      </select></td>
    </tr>
    
    <tr>
      <td>Password</td>
      <td><input type="password" name="txt_password" id="txt_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_pass" required="" autocomplete="off" /></td>
    </tr>
    <tr>
      <td>CONFIRM PASSWORD</td>
      <td><label for="txt_cpassword"></label>
      <input type="password" name="txt_cpassword" id="txt_cpassword"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_save" id="btn_save" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
  </div>
<?php
ob_flush();
include("Footer.php");
?>
</body>
</html>
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