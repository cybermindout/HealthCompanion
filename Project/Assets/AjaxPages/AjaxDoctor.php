
   <?php
	include("../Connection/Connection.php");
	  ?>
	  <table align="center" cellpadding="60" id="result">
 <tr>
 <?php
 $i=0;
 $sel="select * from tbl_doctor  d inner join tbl_speacialization s on s.speacialization_id=d.specialization_id inner join tbl_place p on p.place_id=d.place_id inner join tbl_district dt on dt.district_id=p.district_id where d.doctor_status=1";
 if($_GET["did"]!=null)
 {
	 $sel.=" and p.district_id='".$_GET["did"]."'";
 }
 if($_GET["pid"]!=null)
 {
	 $sel.=" and p.place_id='".$_GET["pid"]."'";
 }
 if($_GET["sid"]!=null)
 {
	 $sel.=" and speacialization_id='".$_GET["sid"]."'";
 }
 //echo $sel;
 $row=$Conn->query($sel);
 while($data=$row->fetch_assoc())
 {
	 $i++;
	 ?>
     <td><p><img src="../Assets/FILES/doctorPhoto/<?php echo $data["doctor_photo"]?>" width="150" height="150" /><br />
     Name:<?php echo $data["doctor_name"]?><br />
     Contact:<?php echo $data["doctor_contact"]?><br />
     Email:<?php echo $data["doctor_email"]?><br />
      <a href="ViewSchedule.php?doc=<?php echo $data["doctor_id"]?>">View Schedule</a></p></td>
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