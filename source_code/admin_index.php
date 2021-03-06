<html>
<head>
	<meta charset="utf-8">
	<title>Admin Login Form</title>
	<link rel="stylesheet" href="style.css">
	<body>
		<div class="login-box">
			<h1>Login</h1>
			<form>
				<div class="textbox">
					<i class="fa fa-user" aria-hidden="true"></i>
					<input type="text" placeholder="USER ID" name="user" value="">
				</div>
				<div class="textbox">
					<i class="fa fa-lock" aria-hidden="true"></i>
					<input type="password" placeholder="Password" name="pass" value="">
				</div>
				<input class="btn" type="submit" name="submit_1" value="Sign In">
				<input class="btn" type="submit" name="submit_2" value="Home Page">
			</div>
		</form>
	</body>
</head>
</html>

<?php
require 'connection.php';
if(isset($_REQUEST["submit_1"]))
{
	$user=$_REQUEST["user"];
	$pass=$_REQUEST["pass"];
	$sql = "SELECT * FROM admin where id='$user' and pass='$pass'";
    $result = mysqli_query($connection, $sql);
    $resultCheck = mysqli_num_rows($result);
	if($resultCheck==true)
	{
		header('location:admin_panel.php');
	}
	
	else
		
	{

		?>

		<script>

			alert("Your ID or Password Must be wrong.Try again with correct ID Password!");
		</script>
		
		<?php
	}

	
}

if(isset($_REQUEST["submit_2"]))
	{
		header('location:home.php');
	}

	?>