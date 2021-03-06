<?php
require 'connection.php';
session_start();
if($_SESSION["user"]==true)
{
   $value=$_SESSION["user"];
}


?>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
 <link rel="stylesheet" type="text/css" href="style_4.css">
<div class="wrapper">
    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="f_profile.php"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="f_course_detail.php"><i class="fas fa-project-diagram"></i>View Courses</a></li>
            <li><a href="choose_course_for_update.php"><i class="fas fa-project-diagram"></i>Update Course Result</a></li>
            <li><a href="assign_weight.php"><i class="fas fa-project-diagram"></i>Assign Course Weight</a></li>
            <li><a href="assign_actual_mark.php"><i class="fas fa-project-diagram"></i>Assign Actual mark of events</a></li>
            <li><a href="calculate_grade.php"><i class="fas fa-project-diagram"></i>Calculate Grade Sheet</a></li>
            <li><a href="f_view_grade.php"><i class="fas fa-project-diagram"></i>View Grade Sheet</a></li>
            <li><a href="log_out.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">Welcome To East West University official Faculty Pannel</div>  
        <div class="info">
          <div><html>
<head>
<title>Assign actua marks</title>
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
if(isset($_REQUEST["submit_1"]))
{
	$L_1=$_GET["List1"];
	$L_2=$_GET["List2"];

$sql = "SELECT f_initial FROM actual_marks where  course_code='$L_1' and course_section='$L_2'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$x=$row['f_initial'];
  if($value==$x)
  {

?>


<br></br>
<br></br>
<table  border="1" >
<tr>
<th>Course Code</th>
<th>Section</th>
<th>Quiz 1</th>
<th>Quiz 2</th>
<th>Quiz 3</th>
<th>Mid 1</th>
<th>Mid 2</th>
<th>Final</th>
<th>Assigment</th>
<th>Project</th>
<th>Lab</th>
</tr>

<?php
$sql_1 = "select * from actual_marks where course_code='$L_1' and course_section='$L_2' ";
$result_1 = mysqli_query($connection,$sql_1);
$resultCheck_1 = mysqli_num_rows($result_1);

if($resultCheck_1>0)
{
	$row= mysqli_fetch_assoc($result_1);


?>
<form action="" method="post">
<tr>
<td><input type="text"  name="course_code" value= <?php echo $row['course_code'] ?> ></td>
<td><input type="text"  name="section" value= <?php echo $row['course_section'] ?> ></td>
<td><input type="text"  name="quiz_1" value= <?php echo $row['quiz_1'] ?> ></td>
<td><input type="text"  name="quiz_2" value= <?php echo $row['quiz_2'] ?> ></td>
<td><input type="text"  name="quiz_3" value= <?php echo $row['quiz_3'] ?> ></td>
<td><input type="text"  name="mid_1" value= <?php echo $row['mid_1'] ?> ></td>
<td><input type="text"  name="mid_2" value= <?php echo $row['mid_2'] ?> ></td>
<td><input type="text"  name="final" value= <?php echo $row['final'] ?>   ></td>
<td><input type="text"  name="assignment" value= <?php echo $row['assignment'] ?> ></td>
<td><input type="text"  name="project" value= <?php echo $row['project'] ?> ></td>
<td><input type="text"  name="lab" value= <?php echo $row['lab'] ?> ></td>

<td><input type=submit  name="submit_2" value="submit"></td>
</tr>
<?php

}

if(isset($_REQUEST["submit_2"]))
{

$id=$_POST["course_code"];
$sec=$_POST["section"];
$quiz_1=$_POST["quiz_1"];
$quiz_2=$_POST["quiz_2"];
$quiz_3=$_POST["quiz_3"];
$mid_1=$_POST["mid_1"];
$mid_2=$_POST["mid_2"];
$final=$_POST["final"];
$assignment=$_POST["assignment"];
$project=$_POST["project"];
$lab=$_POST["lab"];


$sql_2= "update actual_marks set quiz_1=$quiz_1, quiz_2=$quiz_2, quiz_3=$quiz_3,  mid_1=$mid_1, mid_2=$mid_2, final=$final, assignment=$assignment, project=$project, lab=$lab where course_code='$id' and course_section='$sec'";
$result_1 = mysqli_query($connection, $sql_2);

echo "Marks Updated";
}

}



else
  {
    echo "You are not Permitted to update this course";

    ?>


    <br></br><a href="f_panel.php" title="Forgot Password">Go Back to Panel</a>

    <?php
  }

}

?>
</form>
</table>

</body>
</html></div>
      </div>
    </div>
</div>



