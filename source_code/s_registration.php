<?php
require 'connection.php';
?>
<html>
<head>
<title>Student Registration Form</title>
<link rel="stylesheet" href="style.css">
<body>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

		<form action="" method="post" enctype="multipart/form-data" align="center">
		<table border="1" align="center">
		<tr>
		<td>Enter Name</td>
		<td><input type="text" placeholder="Studnet's name" name="user_name"></td>
		</tr>
		<tr>
		<td>Enter Id</td>
		<td><input type="text" placeholder="Studnet's ID" name="user_id"></td>
		</tr>
		<tr>
		<td>Enter Adress</td>
		<td><input type="Enter Address" placeholder="Studnet's address" name="user_address"></td>
		</tr>
		<tr>
		<td>football team</td>
		<td><input type="text" placeholder="football" name="football team"></td>
		</tr>
		<tr>
		<td>User Photo</td>
		<td><input type="file" name="uploadfile" value=""/></td>
		</tr>
		<tr>
		<td>Password</td>
		<td><input type="text" placeholder="Password" name="user_pass"></td>
		</tr>
		<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"/></td>
		</tr>
		</tr>
		<td><br><input type="submit" name="submit_2" value="Go back to home"/></br></td>
		</tr>
		</table>
		</form>
</body>
</head>
</html>


<?php
if(isset($_REQUEST["submit"]))
{
$s_name=$_REQUEST["user_name"];
$s_id=$_REQUEST["user_id"];
$s_address=$_REQUEST["user_address"];
$s_email=$_REQUEST["user_email"];
$s_pass=$_REQUEST["user_pass"];
$name=$_FILES["uploadfile"]["name"];
$tempname=$_FILES["uploadfile"]["tmp_name"];
$folder="student/".$name;
move_uploaded_file($tempname,$folder);
$query="insert into  student (s_name,s_id,s_address,team,s_pass,s_img) values('$s_name','$s_id','$s_address','$s_email','$s_pass','$folder')";
$data=mysqli_query($connection,$query);
echo"Regestration Successful";
	
}

if(isset($_REQUEST["submit_2"]))
{

	header('location:home.php');
}