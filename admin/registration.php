
<?php

require_once './dbcon.php';
session_start();

  if (isset($_POST['registration'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    $photo = explode('.', $_FILES['photo']['name']);
    $photo = end($photo);

    $photo_name = $username.'.'.$photo;

    $input_error = array();

    if (empty($name)) {
      $input_error['name'] = "The Name field is Required.";
    }

    if (empty($email)) {
      $input_error['email'] = "The Email field is Required.";
    }

    if (empty($username)) {
      $input_error['username'] = "The User Name field is Required.";
    }

    if (empty($password)) {
      $input_error['password'] = "The Password field is Required.";
    }

    if (empty($c_password)) {
      $input_error['c_password'] = "The Confirm Password field is Required.";
    }

    if (count($input_error) == 0) {
      $email_check = mysqli_query($link, "SELECT * FROM `users` WHERE `email` = '$email';");

      if (mysqli_num_rows($email_check) == 0) {
        $username_check = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$username';");
        if (mysqli_num_rows($username_check) == 0) {
          if (strlen($username) <= 7) {
            if (strlen($password) > 7) {
              if ($password == $c_password) {
                $password = md5($password);
                # Database e data insert kora...
                $query = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','inactive')";
                $result = mysqli_query($link, $query);

                  if ($result) {
                    $_SESSION['data_insert_success']  = "Successfully Data Inserted.";

                    move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
                    header('location: registration.php');

                  } else{
                    $_SESSION['data_insert_error']  = "Failed Data Insertion.";
                  }

              } else{
                $password_not_match = "Your Password not match.";
              }
            } else{
              $password_lenght = "Password must be (>) than 7 character.";
            }
          } else{
            $username_length = "UserName not more than 7 character.";
          }
        } else{
          $username_error = "This UserName is ALREADY exist.";
        }
      } else{
        $email_error = "This Email Address is ALREADY exist.";
      }
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

    <link rel="stylesheet" href="../css/style.css">

    <title>Student Management System</title>
  </head>
  <body>

  	<div class="container">
  		<br />
  		<h1 class="text-center font-weight-lighter">Student Management System Registration</h1>
  		<br />
  		<div class="row animate__animated animate__shakeX">
  			<div class="col-md-12">
  				<h2 class="text-center font-weight-lighter">User Registration</h2>
          <?php 
            if (isset($_SESSION['data_insert_success'])) {
              echo '<div class="alert alert-success col-sm-4 offset-sm-4">
            <strong>'.$_SESSION['data_insert_success'].'</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            }
            unset($_SESSION['data_insert_success']);
           ?>

           <?php 
            if (isset($_SESSION['data_insert_error'])) {
              echo '<div class="alert alert-danger col-sm-4 offset-sm-4">
            <strong>'.$_SESSION['data_insert_error'].'</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            }
            unset($_SESSION['data_insert_error']);
           ?>
          
          <br />
  				<form class="form offset-sm-4" action="registration.php" method="POST" enctype="multipart/form-data">
  					<div class="form-group row">
              <label for="name" class="col-sm-3 col-form-label">Name</label>
              <div class="col-sm-4">
                <input type="text" placeholder="Enter your Name" name="name" id="name" class="form-control" value="<?php if(isset($name)){echo $name;}?>">
              </div>
              <lable class="error animate__animated animate__fadeInDown">
                <?php
                  if (isset($input_error['name'])) {
                    echo $input_error['name'];
                  }
                ?>
              </lable>
  					</div>

            <div class="form-group row">
              <label for="email" class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-4">
                <input type="email" placeholder="Enter your Email" name="email" id="email" class="form-control" value="<?php if(isset($email)){echo $email;}?>">
              </div>
              <lable class="error animate__animated animate__fadeInDown">
                <?php
                  if (isset($input_error['email'])) {
                    echo $input_error['email'];
                  }
                ?>
              </lable>

              <lable class="email_error animate__animated animate__fadeInDown">
                <?php
                  if (isset($email_error)) {
                    echo $email_error;
                  }
                ?>
              </lable>
            </div>

            <div class="form-group row">
              <label for="username" class="col-sm-3 col-form-label">User Name</label>
              <div class="col-sm-4">
                <input type="text" placeholder="Enter your User Name" name="username" id="username" class="form-control" value="<?php if(isset($username)){echo $username;}?>">
              </div>
              <lable class="error animate__animated animate__fadeInDown">
                <?php
                  if (isset($input_error['username'])) {
                    echo $input_error['username'];
                  }
                ?>
              </lable>

              <lable class="email_error animate__animated animate__fadeInDown">
                <?php
                  if (isset($username_error)) {
                    echo $username_error;
                  }
                ?>
              </lable>

              <lable class="username_length animate__animated animate__fadeInDown">
                <?php
                  if (isset($username_length)) {
                    echo $username_length;
                  }
                ?>
              </lable>
            </div>

            <div class="form-group row">
              <label for="password" class="col-sm-3 col-form-label">Password</label>
              <div class="col-sm-4">
                <input type="password" placeholder="Enter Password" name="password" id="password" class="form-control" value="<?php if(isset($password)){echo $password;}?>">
              </div>
              <lable class="error animate__animated animate__fadeInDown">
                <?php
                  if (isset($input_error['password'])) {
                    echo $input_error['password'];
                  }
                ?>
              </lable>
              <lable class="username_length animate__animated animate__fadeInDown">
                <?php
                  if (isset($password_lenght)) {
                    echo $password_lenght;
                  }
                ?>
              </lable>
            </div>

            <div class="form-group row">
              <label for="c_password" class="col-sm-3 col-form-label">Confirm Password</label>
              <div class="col-sm-4">
                <input type="password" placeholder="Enter Confirm Password" name="c_password" id="c_password" class="form-control" value="<?php if(isset($c_password)){echo $c_password;}?>">
              </div>
              <lable class="error animate__animated animate__fadeInDown">
                <?php
                  if (isset($input_error['c_password'])) {
                    echo $input_error['c_password'];
                  }
                ?>
              </lable>

              <lable class="error animate__animated animate__fadeInDown">
                <?php
                  if (isset($password_not_match)) {
                    echo $password_not_match;
                  }
                ?>
              </lable>
            </div>

            <div class="form-group row">
              <label for="photo" class="col-sm-3 col-form-label">Photo</label>
              <div class="col-sm-4">
                <input type="file" name="photo" id="photo">
              </div>
            </div>

            <div class="col-sm-4 offset-sm-2">
                <input type="submit" value="Registration" name="registration" class="btn btn-primary">
            </div>

  				</form>
  			</div>
  		</div>
      <br />
      <p class="text-center">If you already have an account! Then please <a href="login.php">Login</a></p>
      <br />
      <hr />

      <footer>
        <p class="text-center">Copyright &copy; 2018 - <?= date('Y') ?> All right reserved.</p>
      </footer>

  	</div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>