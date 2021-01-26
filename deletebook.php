<?php
include "includes/dbh.inc.php";

if(isset($_GET['d'])) 
{
		$type=$_GET['d'];
   if(isset($_GET['id'])) 
	{
		$id=$_GET['id'];

	$query="SELECT * from books where id='$id' ";
	$res=mysqli_query($conn,$query);
	$row=mysqli_fetch_array($res);

		unlink("pdf_uploads/$row[pdf_file]");

		$sql="DELETE FROM books where id='$id' ";
		mysqli_query($conn,$sql);
 
        
 		

		header("Location: displaybook.php?d=".$type."&delete=success");
		exit(); 
   
	}

}
?>


