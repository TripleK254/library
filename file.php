<?php 
 include "includes/header.php";
 include "includes/dbh.inc.php";
?>

<div class="container-fluid"><br>
	<h4 style='text-align:center;'></h4><br>

<?php 


if(isset($_POST['submit'])!=""){


  $name=$_FILES['file']['name'];
  $size=$_FILES['file']['size'];
  $type=$_FILES['file']['type'];
  $temp=$_FILES['file']['tmp_name'];
  $date = date('Y-m-d H:i:s');
  $caption1=$_POST['caption'];
  $link=$_POST['link'];

 $user_upload=$_SESSION['uname'];
  
  move_uploaded_file($temp,"file_uploads/".$name);

$query="INSERT INTO upload (name,date,uploadedby) VALUES ('$name','$date','$user_upload')";
mysqli_query($conn, $query);
if($query){
header("location:file.php?upload=successfull");
}
else{
die(mysql_error());
	}
}


// ERROR HANDLERS
if(isset($_GET['upload']))
{
	$uploadCheck=$_GET['upload'];
		if ($uploadCheck=='successfull')
		{
		echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
		Upload success!!
  		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    	<span aria-hidden='true'>&times;</span>
  		</button>
		</div>";
		}

}
if(isset($_GET['delete']))
{
	$deleteCheck=$_GET['delete'];
	if ($deleteCheck=='success')
		{
		echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
		Delete success!!
  		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    	<span aria-hidden='true'>&times;</span>
  		</button>
		</div>";
		}
	
}


?>

<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">

<tr>
<td>
<form method="post" action="file.php"  enctype="multipart/form-data">
    Select file to upload
</td>
<td>
    <input type="file" name="file" id="file" required="required">
</td>
<td>
    <button type="submit" name="submit" class="btn btn-info">Upload</button>
</form>
</td>
</tr>


<!----------------DISPLAYING FILES-------------------- -->
</table>
<div class="col-md-18">
<div class="table-responsive">


        <table cellpadding="0" cellspacing="0" border="0" class="table table-condensed" id="example">
                            
            <thead>
                <tr>      
                <th>ID</th>
                <th>FILE NAME</th>
                <th>Date</th>
                <th>Uploaded by</th>
				<th>Download</th>
				<?php
				if(isset($_SESSION['id']))
				{
				  if($_SESSION['id']<2)
				   {
				echo "<th>Delete</th>";
				   }
				}
				   ?>
                </tr>
            </thead>
            <tbody>
			<?php 
				$query = "SELECT * FROM upload";
				$res=mysqli_query($conn,$query);
				$count=mysqli_num_rows($res);

				$items_per_page=10;
				$items_per_page=10;
				$totalpages=ceil($count/$items_per_page);
				if (isset($_GET['page'])&& !empty($_GET['page'])) 
				{
					$page=$_GET['page'];
					if ($page>$totalpages) 
					{
						header("Location:file.php?page=1");
					}
				}
				else
				{ 
					$page=1;
				}
                    $offset=($page-1)* $items_per_page;
					$sql="SELECT id,name,date,uploadedby from upload ORDER BY id DESC  limit $items_per_page OFFSET $offset";
					$result=mysqli_query($conn,$sql);

					while($row=mysqli_fetch_array($result))
				         {
				         	// INITIALIZING TO BE USED WHEN GETTING FILE TO DOWNLOAD 
				         		$id=$row['id'];
								$name=$row['name'];
								$date=$row['date'];
				         ?>
							<tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td><?php echo $row['uploadedby'] ?></td>
								<td>
				<a href="file_download.php?filename=<?php echo $name;?>" title="click to download"><span  style="font-size:20px; color:blue"><i class="fas fa-download"></i></span></a>
				                </td>
				                <td>
				<?php
				if(isset($_SESSION['id']))
				{
				  if($_SESSION['id']<2)
				   {?>
				<form method="post" action="file_delete.php" >
				<a href="file_delete.php?del=<?php echo $row['id']; ?>" title='click to delete'><span style="font-size:20px; color:red"><i class="fas fa-trash-alt"></i></span></a>
			    </form>
			    
			    <?php } }?>
			                    </td>
                            </tr>
                         
						  <?php }   ?>
                </tbody>

        </table>

 </div><!-- closing the table responsive-->

      <!-- ---------pagination----------- -->
		   <ul class="pagination justify-content-center">		
            <?php
                	if ($page>1) 
					{ 
						echo "<li class='page-item'>
						<a class='page-link' href='file.php?page=".($page-1)." '>PREVIOUS</a>
                              </li>";
					
					}
				for ($i=1; $i <=$totalpages ; $i++) 
				{ 
					if ($i==$page) {
						echo "<li class='page-item active' ><a class='page-link' >".$i."</a></li>";
					}
					else
					{
						echo "<li class='page-item' ><a class='page-link' href='file.php?page=".$i." '> ".$i." </a></li>";
					}
				}
				if ($i>$page) 
				{
					echo "<li class='page-item'><a class='page-link' href='file.php?page=".($page+1)." '>NEXT</a></li>";
				}

			?>                    
         </ul>                   
          
</div><!--  closing bthe container fluid-->
 

 <?php
 include "includes/footer.php";
?>
