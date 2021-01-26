
<?php
// extract($_REQUEST);
 include "includes/dbh.inc.php";

if(isset($_GET['del'])) 
{

$del=$_GET['del'];

$query="SELECT * from upload where id='$del' ";
$res=mysqli_query($conn,$query);
$row=mysqli_fetch_array($res);

unlink("file_uploads/$row[name]");

$sql="DELETE from upload where id='$del' ";
mysqli_query($conn,$sql);
header("Location:file.php?delete=success");
}
?>