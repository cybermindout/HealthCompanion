<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<?php
session_start();
?>
<center><h1>Welcome <?php echo $_SESSION["aname"]?></h1></center>
<a href="MyProfile.php">My Profile</a>
<a href="EditProfile.php">Edit Profile</a>
<a href="ChangePassword.php">Change Password</a>
<a href="SearchDoctor.php">Search DOctor</a>
<a href="SearchCounsilor.php">Search Counsilor</a>
</body>
</html>