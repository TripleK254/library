<?php
include "includes/header.php";
include "includes/dbh.inc.php";


   if (isset($_POST['submit'])) 
   {

   $username=mysqli_real_escape_string($conn,$_POST['username']);
   $email=mysqli_real_escape_string($conn,$_POST['email']);
   $password=mysqli_real_escape_string($conn,$_POST['password']);
   $conf_password=mysqli_real_escape_string($conn,$_POST['confirm_password']);

	if (empty($username)||empty($email)||empty($password)||empty($conf_password)) 
	{
		header("Location: resetpass.php?reset=empty");
	}
	else if ($password!=$conf_password) 
	{
		header("Location: resetpass.php?reset=password");
	}
	else if (strlen($password)<4)
	{
		header("Location: resetpass.php?reset=short");
	}
	else  
	{
		$query="SELECT * FROM users WHERE  username='$username' AND email='$email' ";
		$result=mysqli_query($conn,$query);
		if (mysqli_num_rows($result)<1) 
		{
			header("Location: resetpass.php?reset=failed");
		    exit();
		}

        else
        {
		$sql="UPDATE users SET password='$password' WHERE  username='$username' AND email='$email' ";
		$query=mysqli_query($conn,$sql);
		header("Location: resetpass.php?reset=success");
		exit();
     	}
	}
   }


echo "<div class='container-fluid'>
	<br><br>
<div id='login'>

<form action='resetpass.php' method='POST' >
		<h2  style='text-align:center;'>Reset Password</h2><br>";
//<!-- ERROR HANDLERS -->

	if(isset($_GET['reset']))
	{

		$resetCheck=$_GET['reset'];
		if ($resetCheck=='empty')
			{
			echo "<div class='alert alert-danger'>Please fill the empty fields!!!!</div>";
			}
		elseif ($resetCheck=='password')
			{
			echo "<div class='alert alert-danger'>Password doesn't match!!</div>";
			}
		elseif ($resetCheck=='short')
			{
			echo "<div class='alert alert-danger'>Password too short!!</div>";
			}
		elseif ($resetCheck=='failed')
			{
			echo "<div class='alert alert-danger'>Email and username doesn't match!!</div>";
			}
		elseif ($resetCheck=='success')
			{
			echo "<div class='alert alert-success'>Password reset successfully!</div>";
			}
	}

?>	

    <input class='form-control' type="text" name="username" placeholder="username"><br>
	<input class='form-control' type="email" name="email" placeholder="email"><br>
	<input class='form-control' type="password" name="password" placeholder="password"><br>
	<input class='form-control' type="password" name="confirm_password" placeholder="confirm password"><br>		
	<button class="btn btn-primary" name="submit">&nbsp Submit</button><br>

	Not Registered?<a href='register.php'>signup</a>&nbsp&nbsp&nbsp&nbsp&nbsp
		<a href='login_user.php'>Login</a>
	
</form>

</div><!-- closin the  login div-->   
</div><!--  closing bthe container fluid-->



<?php
	include "includes/footer.php";
?>
