

<h1 class="text-primary"><i class="fas fa-user-edit"></i> Update Student <small style="color: #6c757d;">update student</small> </h1>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
	<li class="breadcrumb-item"><a href="index.php?page=all-students"><i class="fas fa-users"></i> All Students</a></li>
	<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-edit"></i> Update Student</li>
</ol>


<?php 

	$id = base64_decode($_GET['id']);

	$db_data = mysqli_query($link, "SELECT * FROM `student_info` WHERE `id` = '$id'");

	$db_row = mysqli_fetch_assoc($db_data);

  if (isset($_POST['update_student'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $city = $_POST['city'];
    $pcontact = $_POST['pcontact'];
    $class = $_POST['class'];
    

    $query = "UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`pcontact`='$pcontact' WHERE `id` = '$id'";

    $result = mysqli_query($link, $query);

    if ($result) {
      header('location: index.php?page=all-students');
    }

    
  }

 ?>


<div class="row">
	<div class="col-sm-6">
		<form action="" class="form" method="POST" enctype="multipart/form-data">
			<div class="form-group">
              <label for="name" class="col-form-label">Student Name</label>
              
                <input type="text" placeholder="Student Name" name="name" id="name" class="form-control" required="" value="<?= $db_row['name'] ?>">
              
  			</div>

  			<div class="form-group">
              <label for="roll" class="col-form-label">Student Roll</label>
              
                <input type="text" placeholder="Student Roll" name="roll" id="roll" class="form-control" pattern="[0-9]{1,6}" required="" value="<?= $db_row['roll'] ?>">
              
  			</div>
  			
  			<div class="form-group">
              <label for="city" class="col-form-label">City</label>
              
                <input type="text" placeholder="City" name="city" id="city" class="form-control" required="" value="<?= $db_row['city'] ?>">
              
  			</div>
  			
  			<div class="form-group">
              <label for="pcontact" class="col-form-label">Parent Contact</label>
              
                <input type="text" placeholder="01*********" name="pcontact" id="pcontact" class="form-control" pattern="01[1|3|5|6|7|8|9][0-9]{8}" required="" value="<?= $db_row['pcontact'] ?>">
              
  			</div>
  			
  			<div class="form-group">
              <label for="class" class="col-form-label">Student Class</label>
              
                <select name="class" id="class" class="form-control" required="">
                	<option value="">Select</option>
                	<option <?php echo $db_row['class']=='1st' ? 'selected=""':'';?> value="1st">1st</option>
                	<option <?php echo $db_row['class']=='2nd' ? 'selected=""':'';?> value="2nd">2nd</option>
                	<option <?php echo $db_row['class']=='3rd' ? 'selected=""':'';?> value="3rd">3rd</option>
                	<option <?php echo $db_row['class']=='4th' ? 'selected=""':'';?> value="4th">4th</option>
                	<option <?php echo $db_row['class']=='5th' ? 'selected=""':'';?> value="5th">5th</option>
                </select>
              
  			</div>

  			

  			<input type="submit" value="Update Student" name="update_student" class="btn btn-success float-right"></input>
  			
		</form>
	</div>
</div>