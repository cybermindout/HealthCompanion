
   <?php
	include("../Connection/Connection.php");
	  ?>
	  <table align="center" cellpadding="60" id="result">
 <tr>
 <?php
 $i=0;
 $sel="select * from tbl_counsiler  d inner join tbl_place p on p.place_id=d.place_id inner join tbl_district dt on dt.district_id=p.district_id where d.counsiler_status=1";
 if($_GET["did"]!=null)
 {
	 $sel.=" and p.district_id='".$_GET["did"]."'";
 }
 if($_GET["pid"]!=null)
 {
	 $sel.=" and p.place_id='".$_GET["pid"]."'";
 }

 //echo $sel;
 $row=$Conn->query($sel);
 while($data=$row->fetch_assoc())
 {
	 $i++;
	 ?>
     <td><p><img src="../Assets/FILES/counsilerPhoto/<?php echo $data["counsiler_photo"]?>" width="150" height="150" /><br />
     Name:<?php echo $data["counsiler_name"]?><br />
     Contact:<?php echo $data["counsiler_contact"]?><br />
     Email:<?php echo $data["counsiler_email"]?><br />
      <a href="BookCounsilor.php?doc=<?php echo $data["counsiler_id"]?>">Make Appointment</a></p></td>
     <?php
	 if($i==4)
	 {
		 echo "</tr>";
		 echo "<tr>";
		 $i=0;
	 }
 }
 ?>
 </table>