<?php 

session_start();
require_once './dbcon.php';
if (!isset($_SESSION['user_login'])) {
	header('location: login.php');
}

 ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fc1f8d03d0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/style.css">

    

    <title>SMS Dashboard</title>
  </head>
  <body>

  	<?php 

  		$session_user = $_SESSION['user_login'];

		$user_data = mysqli_query($link,"SELECT * FROM `users` WHERE `username`='$session_user'");

		$user_row = mysqli_fetch_assoc($user_data);

  	 ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
		  <a class="navbar-brand" href="index.php">SMS Dashboard</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="nav navbar-nav ml-auto">
		      
		      <li class="nav-item"><a class="nav-link" href="">Welcome: <span style="color: #56f4fc;"><?php echo ucwords($user_row['name']); ?></span></a></li>
		      <li class="nav-item"><a class="nav-link" href="index.php?page=add-user"><i class="fas fa-user-plus"></i> Add User</a></li>
		      <li class="nav-item"><a class="nav-link" href="index.php?page=user-profile"><i class="fas fa-user"></i> Profile</a></li>
		      <li class="nav-item"><a class="nav-link btn btn-warning" href="logout.php"><i class="fas fa-power-off"></i> Logout</a></li>
		      
		      
		    </ul>
		    
		  </div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2">
				<div class="list-group">
					<a href="index.php?page=dashboard" class="list-group-item list-group-item-action active">
						<i class="fas fa-tachometer-alt"></i> Dashboard
					</a>
					<a href="index.php?page=add-student" class="list-group-item list-group-item-action"><i class="fas fa-user-plus"></i> Add Student</a>
					<a href="index.php?page=all-students" class="list-group-item list-group-item-action"><i class="fas fa-users"></i> All Students</a>
					<a href="index.php?page=all-users" class="list-group-item list-group-item-action"><i class="fas fa-users"></i> All Users</a>
					
				</div>
			</div>
			<div class="col-sm-10">
				<div class="content mb-3">
					<!-- Alada alada page content show korano hoyeche jate barbar index page er code copy korte na hoy -->
					<?php 

						if (isset($_GET['page'])) {
							$page = $_GET['page'].'.php';
						} else{
							$page = 'dashboard.php';
						}
						
						if (file_exists($page)) {
							require_once $page;
						} else{
							require_once '404.php';
						}
						

					 ?>

				</div>
			</div>
		</div>
	</div>

	<footer class="footer-area">
		<p>Copyright &copy; 2018- <?= date('Y') ?> Students Management System. All Rights Are Reserved.</p>
	</footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> -->
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/main.js"></script>
  </body>
</html>