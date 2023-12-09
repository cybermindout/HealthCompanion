<?php
$servername="localhost";
$username="root";
$password="";
$database="db_healthcompanion";

$Conn=mysqli_connect($servername,$username,$password,$database);
if(!$Conn)
{
	echo "Connection Error";
}
?>