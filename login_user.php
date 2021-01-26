<?php 
 include "includes/header.php";
?>

<div class="container-fluid">
	<br><br>
<div id="login">
	<?php echo "<form action='".login($conn)."' method='POST' >";  ?>
		<h2  style="text-align:center;">Login</h2><br>
<!-- ERROR HANDLERS -->
<?php
	if(isset($_GET['login']))
	{

		$signupCheck=$_GET['login'];
		if ($signupCheck=='credentials')
			{
			echo "<div class='alert alert-danger'>wrong credentials!!</div>";
			}
		elseif ($signupCheck=='success')
			{
			echo "<div class='alert alert-success'>login success!</div>";
			}
	}
	if(isset($_GET['signup']))
	{
	$signupCheck=$_GET['signup'];
	if ($signupCheck=='success')
		{
		echo "<div class='alert alert-success'>Signup success!</div>";
		}
	}
?>	


		<input class='form-control' type="text" name="username" placeholder="username" required><br>
		<input class='form-control' type="password" name="password" placeholder="password" required><br>
		<button class="btn btn-primary" name="submit"><i class="fas fa-sign-in-alt"></i>&nbsp Login</button><br>

	Not Registered?<a href='register.php'>signup</a>&nbsp&nbsp&nbsp&nbsp&nbsp
		<a href='resetpass.php'>Forgot Password</a>
	
	</form>
 </div><!-- closin the  login div-->   
</div><!--  closing bthe container fluid-->


<?php
 include "includes/footer.php";
?>