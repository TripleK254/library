<?php
include 'includes/dbh.inc.php';

if (isset($_POST['submit_issue'])) 
{
	$name=$_POST['name'];
	$id_number=$_POST['id_number'];
	$bookname=$_POST['bookname'];
	$status=$_POST['status'];
	$issuedate=$_POST['issuedate'];
	$returndate=$_POST['returndate'];
	

	$daysdiff=round(strtotime($returndate )- strtotime($issuedate)) /(60 * 60 * 24);
	// echo $daysdiff."<br>";
	// echo "<br><br>";

    if ($daysdiff<0) 
    {
    	header("Location: index.php? issued=d");
    	exit();
    }
	else
	{
		$sql="SELECT quantity FROM BOOKS WHERE name='$bookname' ";
		$res=mysqli_query($conn, $sql);
		$rowQ=mysqli_fetch_assoc($res);
       
       	
   	   if ($rowQ['quantity']<1) 
		{
			echo $rowQ;
			header("Location: index.php? issued=unavailable");
             exit();
		}
     else
		{
	   $sql="INSERT INTO `issue_book` (`name`, `id_number`, `bid`, `status`, `issue_date`, `return_date`) VALUES ('$name', '$id_number', '$bookname', '$status', '$issuedate', '$returndate') ";
	   mysqli_query($conn,$sql);
	   header("Location: index.php? issued=success");
	   exit();
		}
	}
	
}


