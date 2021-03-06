<?php
require 'connection.php';
session_start();
if($_SESSION["user"]==true)
{
   $value=$_SESSION["user"];
}

$sql = "SELECT * FROM student where s_id='$value'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

?>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
 <link rel="stylesheet" type="text/css" href="style_4.css">
<div class="wrapper">
    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="s_panel.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="s_profile.php"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="s_course_detail.php"><i class="fas fa-address-card"></i>View Course Details</a></li>
            <li><a href="#"><i class="fas fa-project-diagram"></i>View Course Result</a></li>
            <li><a href="log_out.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">Welcome To East West University official Student Pannel</div>  
        <div class="info">
          <div>
            <?php echo "<br><td><img src='".$row['s_img']."' height='200' width='200'/></td></br>
          <br><td>Student's Name:</td<td>".$row['s_name']."</td></br>
          <br><td>Student's Id:</td><td>".$row['s_id']."</td></br>
          ";?><br></br><table border="1">
<br></br>
<br></br>
<table  border="1" >
<tr>
<th>Course Code</th>
<th>Quiz</th>
<th>Mid 1</th>
<th>Mid 2</th>
<th>Final</th>
<th>Assigment</th>
<th>Project</th>
<th>Lab</th>
<th>Total</th>
<th>Grdae</th>
</tr>

<?php
$sql_3 = "SELECT * FROM grade_result where  s_id='$value'";
  $result_3 = mysqli_query($connection, $sql_3);

  while($row=mysqli_fetch_array($result_3))
  {
    ?>

<tr>
<td><?php echo $row['course_code']?></td>
<td><?php echo $row['quiz']?></td>
<td><?php echo $row['mid_1']?></td>
<td><?php echo $row['mid_2']?></td>
<td><?php echo $row['final']?></td>
<td><?php echo $row['assignment']?></td>
<td><?php echo $row['project']?></td>
<td><?php echo $row['lab']?></td>
<td><?php echo $row['total']?></td>
<td><?php echo $row['grade']?></td>
<tr/>

<?php

  }

  ?>

</div>
      </div>
    </div>
</div>