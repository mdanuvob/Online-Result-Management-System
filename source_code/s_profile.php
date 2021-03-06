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
            <li><a href="s_view_result.php"><i class="fas fa-project-diagram"></i>View Course Result</a></li>
            <li><a href="log_out.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">Welcome To East West University official Student Pannel</div>  
        <div class="info">
          <div><?php echo "<br><td><img src='".$row['s_img']."' height='200' width='200'/></td></br>
          <br><td>Student's Name: </td<td>".$row['s_name']."</td></br>
          <br><td>Student's Id: </td><td>".$row['s_id']."</td></br>
          <br><td>Student's Address: </td><td>".$row['s_address']."</td></br>
          <br><td>Student's Email: </td><td>".$row['s_mail']."</td></br>
          <br><td>Student's CGPA: **.**</td></br>
          <br><td>Completed credit: ***</td></br>
          ";
?></div>
      </div>
    </div>
</div>