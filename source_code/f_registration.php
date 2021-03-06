<?php
require 'connection.php';
?>
<html>
<head>
<title>Faculty Registration Form</title>
	<link rel="stylesheet" type="text/css" href="styleweb.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<body>
<br>
<br>
<br>
<br>
<br>
    <section>
        <div class="container">
            <div class="login-form">
			<form action="" method="post" enctype="multipart/form-data" align="center">

				<input type="text" placeholder="Faculty's name" name="user_name">
				<br>

				<input type="text" placeholder="Faculty's Initial" name="user_id">
					<br>
				<input type="Enter Address" placeholder="Faculty's address" name="user_address">

					<br>
				<input type="text" placeholder="Faculty's Email" name="user_email">
					<br>
				<input type="text" placeholder="give your football team name" name="edu_qua">
					<br>

				<input type="text" placeholder="Password" name="user_pass">
					<br>
				<input type="submit" name="submit" value="Submit"/>
				<br>
				<a href="home.php" title="home">home</a>

			</form>
		</div>
	</div>
	</section>		
		
		
</body>

</head>
</html>


<?php
if(isset($_REQUEST["submit"]))
{
$f_name=$_REQUEST["user_name"];
$f_id=$_REQUEST["user_id"];
$f_address=$_REQUEST["user_address"];
$f_email=$_REQUEST["user_email"];
$f_pass=$_REQUEST["user_pass"];
$f_qua=$_REQUEST["edu_qua"];
$query="insert into  faculty (f_name,f_initial,f_address,f_mail,f_pass,team) values('$f_name','$f_id','$f_address','$f_email','$f_pass','$f_qua')";
$data=mysqli_query($connection,$query);
echo"Regestration Successful";
	

}
?>