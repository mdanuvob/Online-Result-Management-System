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
			<div><html>
				<head>
					<title>Assign Faculty's Course</title>
				</head>

				<body>

					<table align="center" top:50% >
						<tr>
							<form Name="From1" method="post">
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


									<select Name="List3" size="1">
										<option value="mmsu">mmsu</option>
										<option value="tj">tj</option>
										<option value="dawr">dawr</option>
										<option value="dshr">dshr</option>
										<option value="mie">mie</option>
									</select>
								</td>

								<td>
									<input type="submit" name="submit" value="Assign Course">
								</td>

							</form>
						</tr>
					</table>
				</body>

				<?php
				require 'connection.php';
				if(isset($_REQUEST["submit"]))
				{
					$L_1=$_POST["List1"];
					$L_2=$_POST["List2"];
					$L_3=$_POST["List3"];

					$sql="select * from section where course_code='$L_1' and course_section='$L_2'";
					$result= mysqli_query($connection, $sql);
					$resultCheck = mysqli_num_rows($result);
					if($resultCheck)
					{
						$sql_1 = "select * from teaches where course_code='$L_1' and course_section='$L_2'";
						$result_1= mysqli_query($connection, $sql_1);
						$resultCheck_1 = mysqli_num_rows($result_1);

						if($resultCheck_1>0)
						{

							?>

							<script>

								alert("This course has already assigned!");
							</script>

							<?php

						}

						else
						{
							$sql_2 = "insert into teaches values('$L_1','$L_2','$L_3')";
							$result_2= mysqli_query($connection, $sql_2);

							$sql_3 = "insert into weight(course_code,course_section,f_initial) values('$L_1','$L_2','$L_3')";
							$result_3= mysqli_query($connection, $sql_3);

							$sql_4 = "insert into actual_marks(course_code,course_section,f_initial) values('$L_1','$L_2','$L_3')";
							$result_4= mysqli_query($connection, $sql_4);


							?>

							<script>

								alert("Course has been assigned!");
							</script>

							<?php
						}

					}

					else
					{
						?>

						<script>

							alert("Invalid course section!");
						</script>

						<?php		
					}
				}

				?>
			</div>
		</div>
	</div>
</div>


