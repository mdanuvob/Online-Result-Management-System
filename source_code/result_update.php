<?php

require 'connection.php';

session_start();
if($_SESSION["user"]==true)
{
   $value=$_SESSION["user"];
}

$course_code=$_GET['List1'];
$course_section=$_GET['List2'];


$sql = "SELECT f_initial FROM teaches where  course_code='$course_code' and course_section='$course_section'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$x=$row['f_initial'];
  if($value==$x)
  {


?>


<html lang="en">
<head>
  <title>Update Result</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>


    <body>
    	<div class="container">
    		<h2>Update Result</h2>
        
    		<table class="table">

    			<thead>
    				
    				<tr>
							<th>Student ID</th>
              <th>Course Code</th>
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
    			</thead>
    			
    			<tbody>

<?php

    			$table= mysqli_query($connection, "select * from result where course_code='$course_code' and course_section='$course_section' ");
    			while($row=mysqli_fetch_array($table))
    			{
    				?>

    				<tr id="<?php echo $row['id']; ?>">
    					<td data-target="id"><?php echo $row['id']; ?></td>
              <td data-target="course_code"><?php echo $row['course_code']; ?></td>
    					<td data-target="quiz_1"><?php echo $row['quiz_1']; ?></td>
    					<td data-target="quiz_2"><?php echo $row['quiz_2']; ?></td>
    					<td data-target="quiz_3"><?php echo $row['quiz_3']; ?></td>
    					<td data-target="mid_1"><?php echo $row['mid_1']; ?></td>
    					<td data-target="mid_2"><?php echo $row['mid_2']; ?></td>
    					<td data-target="final"><?php echo $row['final']; ?></td>
    					<td data-target="assignment"><?php echo $row['assignment']; ?></td>
    					<td data-target="project"><?php echo $row['project']; ?></td>
    					<td data-target="lab"><?php echo $row['lab']; ?></td>


    					<td><a href="#" data-role="update" data-id="<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>

    				</tr>


    				<?php

    			}

    			?>


    			</tbody>

    		</table>

        <a href="f_panel.php" title="Forgot Password">Go back to panel</a>
    		

    	</div>


    	<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Result Form</h4>
      </div>
      <div class="modal-body">

      	<div class="form-group">
      		<label>Student's ID</label>
      		<input type="text" id="id" class="form-control">
      	</div>

        <div class="form-group">
        <label>Course Code</label>
          <input type="text" id="course_code" class="form-control">
        </div>

      	<div class="form-group">
      		<label>Quiz 1</label>
      		<input type="text" id="quiz_1" class="form-control">
      	</div>

      	<div class="form-group">
      		<label>Quiz 2</label>
      		<input type="text" id="quiz_2" class="form-control">
      	</div>

      	<div class="form-group">
      		<label>Quiz 3</label>
      		<input type="text" id="quiz_3" class="form-control">
      	</div>

      	<div class="form-group">
      		<label>Mid 1</label>
      		<input type="text" id="mid_1" class="form-control">
      	</div>

      	<div class="form-group">
      		<label>Mid 2</label>
      		<input type="text" id="mid_2" class="form-control">
      	</div>

      	<div class="form-group">
      		<label>Final</label>
      		<input type="text" id="final" class="form-control">
      	</div>

      	<div class="form-group">
      		<label>Assignment</label>
      		<input type="text" id="assignment" class="form-control">
      	</div>

      	<div class="form-group">
      		<label>Project</label>
      		<input type="text" id="project" class="form-control">
      	</div>

      	<div class="form-group">
      		<label>Lab</label>
      		<input type="text" id="lab" class="form-control">
      	</div>

      	<input type="hidden" id="userId" class="form-control">

      </div>
      <div class="modal-footer">

      	<a href="#" id="save" class="btn btn-primary pull-right">update</a>
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

    </body>

    <script>
    	$(document).ready(function(){


// append values

    		$(document).on('click','a[data-role=update]',function(){
    			var id = $(this).data('id');
          var course_code =$('#'+id).children('td[data-target=course_code]').text();
    			var quiz_1 =$('#'+id).children('td[data-target=quiz_1]').text();
    			var quiz_2 =$('#'+id).children('td[data-target=quiz_2]').text();
    			var quiz_3 =$('#'+id).children('td[data-target=quiz_3]').text();
    			var mid_1 =$('#'+id).children('td[data-target=mid_1]').text();
    			var mid_2 =$('#'+id).children('td[data-target=mid_2]').text();
    			var final =$('#'+id).children('td[data-target=final]').text();
    			var assignment =$('#'+id).children('td[data-target=assignment]').text();
    			var project =$('#'+id).children('td[data-target=project]').text();
    			var lab =$('#'+id).children('td[data-target=lab]').text();

          $('#id').val(id);
          $('#course_code').val(course_code);
          $('#quiz_1').val(quiz_1);
          $('#quiz_2').val(quiz_2);
          $('#quiz_3').val(quiz_3);
          $('#mid_1').val(mid_1);
          $('#mid_2').val(mid_2);
          $('#final').val(final);
          $('#assignment').val(assignment);
          $('#project').val(project);
          $('#lab').val(lab);
          $('#userId').val(id);
          $('#myModal').modal('toggle');



    		});
//now create event to get data

$('#save').click(function(){

              var id = $('#userId').val();
              var course_code = $('#course_code').val();
              var quiz_1 = $('#quiz_1').val();
              var quiz_2 = $('#quiz_2').val();
              var quiz_3 = $('#quiz_3').val();
              var mid_1 = $('#mid_1').val();
              var mid_2 = $('#mid_2').val();
              var final = $('#final').val();
              var assignment = $('#assignment').val();
              var project = $('#project').val();
              var lab = $('#lab').val();



          $.ajax({
            url    : 'update.php',
            method : 'post',
            data   : {course_code : course_code , quiz_1 : quiz_1 , quiz_2 : quiz_2 , quiz_3 : quiz_3 , mid_1 : mid_1 , mid_2 : mid_2 , final : final , assignment : assignment , project : project , lab : lab , id : id},

            success : function(response){

              $('#'+id).children('td[data-target=id]').text(id);
              $('#'+id).children('td[data-target=course_code]').text(course_code);
              $('#'+id).children('td[data-target=quiz_1]').text(quiz_1);
              $('#'+id).children('td[data-target=quiz_2]').text(quiz_2);
              $('#'+id).children('td[data-target=quiz_3]').text(quiz_3);
              $('#'+id).children('td[data-target=mid_1]').text(mid_1);
              $('#'+id).children('td[data-target=mid_2]').text(mid_2);
              $('#'+id).children('td[data-target=final]').text(final);
              $('#'+id).children('td[data-target=assignment]').text(assignment);
              $('#'+id).children('td[data-target=project]').text(project);
              $('#'+id).children('td[data-target=lab]').text(lab);


              $('#myModal').modal('toggle');

            }


          });

      });


});

    </script>

    </html>


    <?php 

  }


  else
  {
    echo "You are not Permitted to update this course";

    ?>


    <br></br><a href="f_panel.php" title="Forgot Password">Go Back to Panel</a>

    <?php
  }

  ?>