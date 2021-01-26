<?php
 include 'includes/header.php';
?>
<?php
//---file codes


if (isset($_POST['submitAdd'])) 
{
//---file codes

$target_dir = "pdf_uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

$file=$_FILES['file'];

$fileName=$_FILES['file']['name'];
$fileTmpName=$_FILES['file']['tmp_name'];
$fileSize=$_FILES['file']['size'];
$fileError=$_FILES['file']['error'];
$fileType=$_FILES['file']['type'];
//----	details of the book
	$book_name=mysqli_real_escape_string($conn,$_POST['name']);
	$authors=mysqli_real_escape_string($conn,$_POST['authors']);
	$edition=mysqli_real_escape_string($conn,$_POST['edition']);
	$status=mysqli_real_escape_string($conn,$_POST['status']);
	$quantity=mysqli_real_escape_string($conn,$_POST['quantity']);
	$type=mysqli_real_escape_string($conn,$_POST['type']);

//---file codes
	$fileExt=explode('.',$fileName);
$fileActualExt=strtolower(end($fileExt));

$allowed=array('dot','ppt','pptx','pdf','doc','docx','');
if (in_array($fileActualExt, $allowed)) 
{
   if ($fileError===0) 
   {
       if ($fileSize<20000000) 
       {
        
              if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) 
              {
              	$sql1="INSERT INTO books (name, authors, edition,status,quantity,type,pdf_file) VALUES ('$book_name', '$authors', '$edition','$status','$quantity','$type','$fileName') ";
				$result1=mysqli_query($conn,$sql1);

				header("Location: addbook.php?add=success");
				exit();
              } 
              else 
              {
              	header("Location: addbook.php?add=error");
				exit();
              }
         }

         else
         {
          header("Location: index.php?upload=failed");
          exit();
         }
   }

   else
   {
   	$sql1="INSERT INTO books (name, authors, edition,status,quantity,type,pdf_file) VALUES ('$book_name', '$authors', '$edition','$status','$quantity','$type','Not Available') ";
				$result1=mysqli_query($conn,$sql1);

	header("Location: addbook.php?add=success");
	exit();
   }
}
else
{ 
	header("Location: addbook.php?add=etype");
	exit();
}



}

///////////////////////////////
echo "<div class='container-fluid'>
<div id='login'><br>
		<form  action='addbook.php' method='POST' enctype='multipart/form-data'>
			<center><h4>Add Book</h4></center><br><br>";
					// =====ERROR HANDLES=====
				if(isset($_GET['add']))
				{
					$addCheck=$_GET['add'];
					if ($addCheck=='success')
						{
						echo "<div class='alert alert-success'>Book aded successfully!</div>";
						}
					elseif ($addCheck=='error')
						{
						echo "<div class='alert alert-danger'>There was an error uploading the file!</div>";
						}
					elseif($addCheck=='etype')
						{
						echo "<div class='alert alert-danger'>You cannot upload files of this type!</div>";
					    }
					else
						{
						echo "<div class='alert alert-danger'>Uploading failed!!</div>";
					    }
					
				}
?>




 
		    <input type='text' class='form-control' name='name' placeholder='Book name' required><br>
		 	<input type='text' class='form-control' name='authors' placeholder='Authors' required><br>
		 	<input type='text' class='form-control' name='edition' placeholder='Edition' required><br>
		 	<input type='text' class='form-control' name='status' placeholder='status' required><br>
		 	<input type='text' class='form-control' name='quantity' placeholder='Quantity' required><br>
		 	<select class='form-control' name='type' placeholder='Book type' placeholder='' required>
		 	<option value="" disabled selected>Select the Book type</option>
			<option>Evaluation publication</option>
			<option>Gvt press gazette</option>
			<option>Poverty studies</option>
			<option>Policy documents</option>
			<optgroup label='Protection'>
		        <option>Child protection</option>
		        <option>Social protection</option>       
	    	</optgroup>

			<option>Health</option>
			<option>Labour and employer</option>
			<option>Documentaries</option>
			<option></option>
			<optgroup label='Country studies'>
		        <option>Kenya</option>
		        <option>Ethiopia</option> 
		         <option>South Africa</option>      
	    	</optgroup>
            <optgroup label='Studies'>
		        <option>Sitam</option>    
	    	</optgroup>
			</select><br>
			<LABEL style='color: red;'>Optional</LABEL> 
			<input type='file' class='form-control' name='file' placeholder='pdf_file' ></option><br>
		 	
		 	<button class='btn btn-primary' type='submit' name='submitAdd'>&nbsp Submit</button><br>
		</form>
       </div><!--clossing login-->
 </div> <!-- //  closing bthe container fluid-->
	 		  
<?php
 include 'includes/footer.php'
?>






