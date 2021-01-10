<?php

	require_once './dbcon.php';
	session_start();

	if (isset($_SESSION['user_login'])) {
	header('location: index.php');
	}

	if (isset($_POST['login'])) {
		$username = $_POST['username'];
    	$password = $_POST['password'];

    	$username_check = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$username'");

    	if (mysqli_num_rows($username_check) > 0) {
    		$row = mysqli_fetch_assoc($username_check);

    		if ($row['password'] == md5($password)) {
    			if ($row['status'] == 'active') {
    				$_SESSION['user_login'] = $username;
    				header('location: index.php');
    			} else{
    				$status_inactive = "Please W8 for being Active your A/C by an ADMIN";
    			}
    		} else{
    			$wrong_password = "Wrong Password";
    		}
    	} else{
    		$username_not_found = "This UserName is not found";
    	}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <title>Student Management System</title>
  </head>
  <body>

  	<div class="container">
  		<br />
  		<h1 class="text-center font-weight-lighter">Student Management System Login</h1>
  		<br />
  		<div class="row animate__animated animate__shakeX">
  			<div class="col-sm-4 offset-sm-4">
  				<h2 class="text-center font-weight-lighter">Admin Login</h2>
  				<form class="form" action="login.php" method="POST">
  					<div>
  						<input type="text" placeholder="Username" name="username" required="" class="form-control" value="<?php if(isset($username)){echo $username;}?>">
  						<br />
  						<input type="password" placeholder="Password" name="password" required="" class="form-control" value="<?php if(isset($password)){echo $password;}?>">
  						<br />
  						<input type="submit" value="Login" name="login" class="btn btn-primary float-right">
  					</div>
  				</form>
  			</div>
  		</div>
  		<br />
  		<?php if (isset($username_not_found)) {
  			echo '<div class="alert alert-danger col-sm-4 offset-sm-4 animate__animated animate__backInUp">'.$username_not_found.'</div>';
  		} ?>

  		<?php if (isset($wrong_password)) {
  			echo '<div class="alert alert-danger col-sm-4 offset-sm-4 animate__animated animate__backInUp">'.$wrong_password.'</div>';
  		} ?>

  		<?php if (isset($status_inactive)) {
  			echo '<div class="alert alert-success col-sm-4 offset-sm-4 animate__animated animate__backInUp">'.$status_inactive.'</div>';
  		} ?>
  		
  			
  		
  	</div>
    <br />
      <p class="text-center">Don't have an account! Then please <a href="registration.php">Sign Up</a></p>
      <br />
      <hr />

      <footer>
        <p class="text-center">Copyright &copy; 2018 - <?= date('Y') ?> All right reserved.</p>
      </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>