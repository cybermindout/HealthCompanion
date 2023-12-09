<?php
 if(isset($_POST['submit']))
 {
    $name=$_POST['name'];
	$email=$_POST['email'];
	$query=$_POST['message'];

 $to="your-email@your-domain.com";
 $subject="Enquiry!";
 $headers  = 'MIME-Version: 1.0' . "\r\n";
 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 $headers .= 'Cc: anymail@your-domain.com' . "\r\n";
 $headers .= "From:" . $_POST["email"] . "\r\n";
 $message="	  
 	   
 		 Name:
		 $name 	   
         <br>
 		 Email-Id:
		 $email 	   
         <br>
 		 Message:
		 $query 	   
      
   ";
	if(mail($to,$subject,$message,$headers))
		header("Location:../contact.php?msg=Successful Submission! Thankyou for contacting us.");
	else
		header("Location:../contact.php?msg=Error To send Email !");
		//contact:-your-email@your-domain.com
 }
?>
