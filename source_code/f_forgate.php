<?php 

$dbhost = 'localhost';
$dbname = 'cse411_project';
$dbuser = 'root';
$dbpass = '';

try {
    $db = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e) {
    echo "Connection error: ".$e->getMessage();
}


if(isset($_POST['submit'])){

    try{
        $team=$_POST['team'];

        $statement = $db->prepare("select * from faculty where team=?");
        $statement->execute(array($team)); 
        $result = $statement->fetch();     

        $num = $statement->rowCount();

        if($num>0) 
        {
            $password = $result[5];
        }
        else
        {
            throw new Exception('Invalid Username and/or password');
        }
    }
    catch(Exception $e) {
        $error_message = $e->getMessage();
    }

}

?>

<!DOCTYPE html>
<html>
<head>
 <title>EWU</title>
	<title>test</title>
	<link rel="stylesheet" type="text/css" href="styleweb.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>
	
	
	
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		 <a class="navbar-brand" href="home.php">EWU</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		 </button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
			<a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="#">Link</a>
			</li>
			<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  About
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="#">Our Team</a>
			  <a class="dropdown-item" href="#">Campus Sites</a>
			  <a class="dropdown-item" href="#">mission</a>
			  <a class="dropdown-item" href="#">Reasources</a>
			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="#"></a>
			</div>
		  </li>
		  
		  <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  User
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="f_index.php">Faculty</a>
			  <a class="dropdown-item" href="s_login.php">Student</a>
			  <a class="dropdown-item" href="admin_index.php">Admin</a>
			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="#"></a>
			</div>
		  </li>
		  
		  
		  
		  <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Departments
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="#">CSE</a>
			  <a class="dropdown-item" href="#">EEE</a>
			  <a class="dropdown-item" href="#">ECE</a>
			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="#"></a>
			</div>
		  </li>
		  
		<form class="form-inline my-2 my-lg-0">
		  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
	  </div>
	</nav>
		
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
    <section>
        <div class="container">
            <div class="login-form">
                <?php
                    if(isset($password)){
                        echo "<h3>Your Password is ".$password." </h3>";
                    }
                ?>
                <form action="" method="POST">
                    <input type="text" name="team" placeholder="Your favourite team">
                        <br>
                    <input type="submit" name="submit" value="Submit">
                    <br>
                </form>
            </div>
        </div>
    </section>
	
</body>


</html> 