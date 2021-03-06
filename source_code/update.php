<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cse411_project";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['id'])){
$course_code=$_POST['course_code'];
$id=$_POST['id'];
$quiz_1=$_POST['quiz_1'];
$quiz_2=$_POST['quiz_2'];
$quiz_3=$_POST['quiz_3'];
$mid_1=$_POST['mid_1'];
$mid_2=$_POST['mid_2'];
$final=$_POST['final'];
$assignment=$_POST['assignment'];
$project=$_POST['project'];
$lab=$_POST['lab'];



$result= mysqli_query($connection, "update result set quiz_1='$quiz_1',quiz_2='$quiz_2',quiz_3='$quiz_3',mid_1='$mid_1', mid_2='$mid_2', final='$final', assignment='$assignment', project='$project', lab='$lab' where course_code='$course_code' and id='$id' ");

	if($result)
	{
		echo 'data updated';
	}

}



?>