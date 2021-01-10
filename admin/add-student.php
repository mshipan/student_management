

<h1 class="text-primary"><i class="fas fa-user-plus"></i> Add Student <small style="color: #6c757d;">add new student</small> </h1>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
	<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-plus"></i> Add Student</li>
</ol>


<?php 

	if (isset($_POST['add-student'])) {
		$name = $_POST['name'];
		$roll = $_POST['roll'];
		$city = $_POST['city'];
		$pcontact = $_POST['pcontact'];
		$class = $_POST['class'];
		
		$photo = explode('.', $_FILES['photo']['name']);

		$photo_ext = end($photo);
		$photo_name = $roll.'.'.$photo_ext;

		$query = "INSERT INTO `student_info`(`name`,`roll`,`class`,`city`,`pcontact`,`photo`) VALUES('$name','$roll','$class','$city','$pcontact','$photo_name')";

		$result = mysqli_query($link, $query);

		if ($result) {
			$success = "Data Insert Success!";
			move_uploaded_file($_FILES['photo']['tmp_name'], 'student_images/'.$photo_name);
		} else{
			$error = "Data Not Insert";
		}
	}

 ?>

<div class="row">
	<?php if (isset($success)) {
		echo '<p class="alert alert-success col-sm-6">'.$success.'</p>';
	} ?>
	<?php if (isset($error)) {
		echo '<p class="alert alert-danger col-sm-6">'.$erro.'</p>';
	} ?>
	
</div>


<div class="row">
	<div class="col-sm-6">
		<form action="" class="form" method="POST" enctype="multipart/form-data">
			<div class="form-group">
              <label for="name" class="col-form-label">Student Name</label>
              
                <input type="text" placeholder="Student Name" name="name" id="name" class="form-control" required="">
              
  			</div>

  			<div class="form-group">
              <label for="roll" class="col-form-label">Student Roll</label>
              
                <input type="text" placeholder="Student Roll" name="roll" id="roll" class="form-control" pattern="[0-9]{1,6}" required="">
              
  			</div>
  			
  			<div class="form-group">
              <label for="city" class="col-form-label">City</label>
              
                <input type="text" placeholder="City" name="city" id="city" class="form-control" required="">
              
  			</div>
  			
  			<div class="form-group">
              <label for="pcontact" class="col-form-label">Parent Contact</label>
              
                <input type="text" placeholder="01*********" name="pcontact" id="pcontact" class="form-control" pattern="01[1|3|5|6|7|8|9][0-9]{8}" required="">
              
  			</div>
  			
  			<div class="form-group">
              <label for="class" class="col-form-label">Student Class</label>
              
                <select name="class" id="class" class="form-control" required="">
                	<option value="">Select</option>
                	<option value="1st">1st</option>
                	<option value="2nd">2nd</option>
                	<option value="3rd">3rd</option>
                	<option value="4th">4th</option>
                	<option value="5th">5th</option>
                </select>
              
  			</div>

  			<div class="form-group">
              <label for="photo" class="col-form-label">Photo</label>
              
                <input type="file" name="photo" id="photo" class="form-control-file">
              
  			</div>

  			<input type="submit" value="Add Student" name="add-student" class="btn btn-success float-right"></input>
  			
		</form>
	</div>
</div>