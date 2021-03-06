<?php
require 'connection.php';
session_start();
if($_SESSION["user"]==true)
{
   $value=$_SESSION["user"];
}

$sql = "SELECT * FROM faculty where f_initial='$value'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

?>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" type="text/css" href="style_4.css">
<link rel="stylesheet" type="text/css" href="styleweb.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<div class="wrapper">
    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="#"><i class="fas fa-user"></i>Profile</a></li>
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
        <div class="header">Welcome To East West University official Student Pannel</div>  
        <div margin: auto>
          <div>
				<?php echo "<br><td>Faculty's Name:</td<td>".$row['f_name']."</td></br>";?><br></br>

				<table class="table">
					  <thead>
						<tr>
						  <th scope="col">Course code</th>
						  <th scope="col">Course title</th>
						  <th scope="col">Section</th>
						  <th scope="col">Credit</th>
						</tr>
					  </thead>
				<?php 
				$sql_1 = "SELECT * FROM teaches where f_initial='$value'";
				$result_1 = mysqli_query($connection, $sql_1);
				//$row_1= mysqli_fetch_assoc($result_1); 
				$resultCheck_1 = mysqli_num_rows($result_1);
				for($i=1;$i<=$resultCheck_1;$i++)
				{
					$row_1 = mysqli_fetch_assoc($result_1);

				$code=$row_1['course_code'];
				$sql_2 = "SELECT * FROM course where course_code='$code'";
				$result_2 = mysqli_query($connection, $sql_2);
				$row_2 = mysqli_fetch_assoc($result_2);

				?>
					<tr>
					  <td><?php echo $row_1['course_code']?></td>
					  <td><?php echo $row_2['course_title']?></td>
					  <td><?php echo $row_1['course_section']?></td>
					  <td><?php echo $row_2['credit']?></td>
					</tr>

				<?php 
				}
				?>
				
				 </tbody>
			</table>
						

			</div>
		</div>
    </div>
</div>