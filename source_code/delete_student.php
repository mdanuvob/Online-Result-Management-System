
<?php
require 'connection.php';

?>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" type="text/css" href="style_4.css">
<div class="wrapper">
	<div class="sidebar">
		<h2>Menu</h2>
		<ul>
			<li><a href="#"><i class="fas fa-home"></i>Home</a></li>
			<li><a href="course_assign_faculty.php"><i class="fas fa-address-card"></i>Assign course to Faculty</a></li>
			<li><a href="course_assign_student.php"><i class="fas fa-project-diagram"></i>Assign course to Student</a></li>
			<li><a href="delete_student.php"><i class="fas fa-project-diagram"></i>Delete Student</a></li>

			<li><a href="home.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
		</ul> 
	</div>
	<div class="main_content">
		<div class="header">Welcome To East West University official Admin Pannel</div>  
		<div class="info">
			<div><?php
			if(isset($_REQUEST["submit_2"]))
			{
				$value=$_GET["List1"];
				$chk=$_REQUEST["chk"];
				foreach($chk as $id)
				{
					$sql_2 = "delete from takes where s_id='$id' and course_code='$value'";
					$result_2= mysqli_query($connection, $sql_2);

					$sql_3 = "delete from result where id='$id' and course_code='$value'";
					$result_3= mysqli_query($connection, $sql_3);

					$sql_3 = "delete from grade_result where s_id='$id' and course_code='$value'";
					$result_3= mysqli_query($connection, $sql_3);
				}


			}

			?>

			<html>
			<head>
				<title>Delete Student</title>
			</head>

			<body>

				<table align="center" top:50% >
					<tr>
						<form Name="From1" method="GET">
							<td>
								<select Name="List1" size="1">
									<option value="CSE411">CSE411</option>
									<option value="CSE477">CSE477</option>
									<option value="CSE475">CSE475</option>
									<option value="CSE442">CSE442</option>
									<option value="CSE301">CSE301</option>
									<option value="CSE110">CSE110</option>
									<option value="CSE405">CSE405</option>
								</select>
							</td>

							<td>
								<select Name="List2" size="1">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</td>

							<td>


								<td>
									<input type="submit" name="submit_1" value="Go">
								</td>

							</form>
						</tr>
					</table>
				</body>


				<?php
				require 'connection.php';
				if(isset($_REQUEST["submit_1"]))
				{

					$L_1=$_GET["List1"];
					$L_2=$_GET["List2"];
					$sql_1 = "select * from takes where course_code='$L_1' and course_section='$L_2'";
					$result_1= mysqli_query($connection, $sql_1);
					$resultCheck_1 = mysqli_num_rows($result_1);
					?>
					<form method="post">
						<table align="center" border="1">

							<tr>
								<td>Student's Id</td>
								<td><input type="submit" name="submit_2" value="Delete"></td>
							</tr>
							<?php
							for($i=1;$i<=$resultCheck_1;$i++)
							{
								$row_1 = mysqli_fetch_assoc($result_1);

								?>
								<tr>
									<td><?php echo $row_1['s_id'] ?></td>
									<td><input type="checkbox" name="chk[]" value="<?php echo $row_1['s_id'] ?>"></td>
								</tr>

								<?php

							}

						}
						?>
					</table>
				</form>

			</div>
		</div>
	</div>
</div>



