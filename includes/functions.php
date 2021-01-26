<?php
include "dbh.inc.php";

function register($conn)
{
	if(isset($_POST['submit']))
{
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$gender=$_POST['gender'];
	$dor=$_POST['doRegistration'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$confirmpassword=$_POST['conf_pass'];


if (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)) 
{
	header("Location: register.php? signup=char&firstname=$firstname&lastname=$lastname&gender=$gender&email=$email&phone=$phone&username=$username");
	exit();
}
else
{
	$sql= "SELECT * FROM users WHERE email='$email' ";//AND password='$password' 
	$result=mysqli_query($conn,$sql);
	if (mysqli_num_rows($result)>0) 
	{
	  header("Location: register.php? signup=email&firstname=$firstname&lastname=$lastname&gender=$gender&email=$email&phone=$phone&username=$username");
	  exit();
	}
	else
	{
		if (strlen($password)<4) 
		{
			header("Location: register.php? signup=password&firstname=$firstname&lastname=$lastname&gender=$gender&email=$email&phone=$phone&username=$username");
			exit();
		}
		else
		{
			if ($password!=$confirmpassword) 
			{
				 header("Location: register.php? signup=!password&firstname=$firstname&lastname=$lastname&gender=$gender&email=$email&phone=$phone&username=$username");
				 exit();
			}
			else
			{
				$sql="INSERT INTO `users` (`first_name`, `last_name`, `gender`, `dor`, `email`, `phone`, `username`, `password`) VALUES ('$firstname', '$lastname', '$gender', '$dor', '$email', '$phone', '$username', '$password')";
				$query=mysqli_query($conn, $sql);
	     		header("Location: login_user.php? signup=success");
				exit();
			}	
		}
		
	}
	 
}

	
}//clossing $_POST
}//clossing a function


function login($conn)
{
	if (isset($_POST['submit'])) 
	{
		echo "logged in";
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);

	$sql= "SELECT * FROM users WHERE username='$username' AND password='$password' "; 
	$result=mysqli_query($conn,$sql);
	 
	if(mysqli_num_rows($result)<1)
		{
			header("Location: login_user.php?login=credentials");
			exit();
		}
	else
		{
	   if($row=mysqli_fetch_assoc($result))
			  {
			$_SESSION['id']=$row['user_id'];
			$_SESSION['firstname']=$row['first_name'];
			$_SESSION['lastname']=$row['last_name'];
	        $_SESSION['gender']=$row['gender'];
			$_SESSION['doRegistration']=$row['dor'];
			$_SESSION['uname']=$row['username'];
			$_SESSION['password']=$row['password'];			

			header("Location: index.php?login=success");
			exit();
			  }
		}
    }
}




function comments($conn)
{
if (isset($_POST['submitcomment'])) 
	{
	$id_number=mysqli_real_escape_string($conn,$_POST['id_number']);
	$firstname=mysqli_real_escape_string($conn,$_POST['firstname']);
	$lastname=mysqli_real_escape_string($conn,$_POST['lastname']);
	$date=mysqli_real_escape_string($conn,$_POST['date']);
	$comment=mysqli_real_escape_string($conn,$_POST['comment']);

	$sql="INSERT INTO comments(id_number, firstname, lastname,date, comment) values('$id_number','$firstname','$lastname','$date','$comment')";
	$result=mysqli_query($conn,$sql);
    exit();
    mysqli_close($conn);


	}
}


function logout($conn)
{
  if(isset($_POST['submit_logout']))
  {
    session_unset();
    session_destroy();

    header("Location: index.php?logout=success");
    exit();
  }
   
}
