<?php 
 include "includes/header.php";

?>

<div class="container-fluid">
<div id='login'><br>
	<h4 style='text-align:center;'>User Registration Form</h4><br>

<?php
if(isset($_GET['signup']))
{
	$signupCheck=$_GET['signup'];
	if ($signupCheck=='empty')
		{
		echo "<div class='alert alert-danger'>signup empty</div>";
		}
	elseif ($signupCheck=='char')
		{
		echo "<div class='alert alert-danger'>Invalid characters!</div>";
		}
	elseif ($signupCheck=='email')
		{
		echo "<div class='alert alert-danger'>Invalid email!!</div>";
		}
	elseif ($signupCheck=='password')
		{
		echo "<div class='alert alert-danger'>Short password!</div>";
		}
	elseif ($signupCheck=='!password')
		{
		echo "<div class='alert alert-danger'>password doesn't match!!</div>";
		}
}


 echo "<form action='".register($conn)."' method='POST'>"; //--opening form  

if (isset($_GET['firstname'])) {
		$firstname=$_GET['firstname'];
		echo "<input class='form-control' type='text' name='firstname' placeholder='first name' value='".$firstname."' required><br>";
	}
	else{
	 echo "<input class='form-control' type='text' name='firstname' placeholder='first name' required><br>";
	}

if (isset($_GET['lastname'])) 
	{
		$lastname=$_GET['lastname'];
		echo "<input class='form-control' type='text' name='lastname' placeholder='first name' value='".$lastname."' required><br>";
	}
	else
	{
	 echo "<input class='form-control' type='text' name='lastname' placeholder='lastname' required><br>";
	}
?>
<input class='form-control' type='email' name='email' placeholder='email' required><br>
<select class='form-control' name='gender'>
		<option>MALE</option>
		<option>FEMALE</option>
	</select>
<?php echo"<input type='hidden' name='doRegistration' value='".date('d-m-Y')."' ><br>"; 

if (isset($_GET['phone'])) 
	{
		$phone=$_GET['phone'];
		echo "<input class='form-control' type='phone' name='phone' placeholder='phone' value='".$phone."' required><br>";
	}
	else
	{
	 echo "	<input class='form-control' type='text' name='phone' value='+254'  required><br>";
	}
if (isset($_GET['username'])) 
	{
		$username=$_GET['username'];
		echo "<input class='form-control' type='text' name='username' placeholder='username' value='".$username."' required><br>";
	}
	else
	{
	 echo "<input class='form-control' type='text' name='username' placeholder='username' required><br>";
	}
?>
	<input class='form-control' type='text' name='password' placeholder='password' required><br>
	<input class='form-control' type='text' name='conf_pass' placeholder='confirm password' required><br>
	<button class='btn btn-primary' name='submit'>Register</button><br>
<br>


	<a href='resetpass.php'>Forgot Password?</a>
</div><!--clossing login-->
</div><!--  closing bthe container fluid-->
 

 <?php
 include "includes/footer.php";
?>

