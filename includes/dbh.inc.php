<?php

 $conn=mysqli_connect("localhost","root","","project_library");
if(!$conn)
{
	die("connection_failed : ".mysqli_connect_error());
}
?>