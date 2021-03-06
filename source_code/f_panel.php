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
          <div><?php echo "
          <br><td>Faculty's Name:</td<td>".$row['f_name']."</td></br>
          <br><td>Faculty's Initial:</td><td>".$row['f_initial']."</td></br>
          ";
?></div>
      </div>
    </div>
</div>