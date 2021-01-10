<h1 class="text-primary"><i class="fas fa-user"></i> User Profile <small style="color: #6c757d;">My Profile</small> </h1>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
	<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Profile</li>
</ol>

<?php 

	$session_user = $_SESSION['user_login'];

	$user_data = mysqli_query($link,"SELECT * FROM `users` WHERE `username`='$session_user'");

	$user_row = mysqli_fetch_assoc($user_data);

 ?>

<div class="row">
	<div class="col-sm-6">
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td>User ID</td>
					<td><?php echo $user_row['id'] ?></td>
					
				</tr>
				<tr>
					<td>Name</td>
					<td><?php echo ucwords($user_row['name']); ?></td>
					
				</tr>
				<tr>
					<td>User Name</td>
					<td><?php echo $user_row['username'] ?></td>
					
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo $user_row['email'] ?></td>
					
				</tr>
				<tr>
					<td>Status</td>
					<td><?php echo ucwords($user_row['status']); ?></td>
					
				</tr>
				<tr>
					<td>SignUp Date</td>
					<td><?php echo $user_row['datetime'] ?></td>
					
				</tr>
			</tbody>
		</table>
		<a class="btn btn-success float-right" href="">Edit Profile</a>
	</div>
	<div class="col-sm-6">
		<a href=""><img style="width: 40%;" class="img-thumbnail" src="images/<?= $user_row['photo'] ?>" alt=""></a>
		<br/>
		<br/>

		<?php 

			if (isset($_POST['upload'])) {
				$photo = explode('.', $_FILES['photo']['name']);
				$photo = end($photo);
				$photo_name  = $session_user.'.'.$photo;

				$upload = mysqli_query($link, "UPDATE `users` SET `photo`='$photo_name' WHERE `username`='$session_user'");

				if ($upload) {
					move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
				}
			}

		 ?>

		<form action="" enctype="multipart/form-data" method="POST">
			<div class="form-group">
				<label for="photo">Update Profile Picture</label>
				<br/>
				<input class="form-control-file" type="file" name="photo" id="photo" required="">
				
				<br />
				<input class="btn btn-primary" type="submit" name="upload" value="Upload">
			</div>
		</form>
	</div>
</div>