<h1 class="text-primary"><i class="fas fa-tachometer-alt"></i> Dashboard <small style="color: #6c757d;">Statics Overview</small> </h1>
<ol class="breadcrumb">
	<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-tachometer-alt"></i> Dashboard</li>
</ol>

<?php 

	$count_student = mysqli_query($link, "SELECT * FROM `student_info`");

	$total_student = mysqli_num_rows($count_student);

	$count_user = mysqli_query($link, "SELECT * FROM `users`");

	$total_user = mysqli_num_rows($count_user);

 ?>
<div class="row">
	<div class="col-sm-4">
		<div class="card bg-primary">
			<div class="card-body">
				<div class="card-tittle text-white">
					<div class="row">
						<div class="col-md-3"><i class="fas fa-users" style="font-size: 75px;"></i></div>
						<div class="col-md-9">
							<div class="text-right" style="font-size: 45px;"><?= $total_student; ?></div>
							<div class="text-right">All Students</div>
						</div>
						
					</div>
				</div>
				
			</div>
			<a class="bg-white" href="index.php?page=all-students">
				<div class="card-footer">
					<div class="float-left">All Students</div>
					<div class="float-right"><i class="fas fa-arrow-circle-right"></i></div>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="card bg-success">
			<div class="card-body">
				<div class="card-tittle text-white">
					<div class="row">
						<div class="col-md-3"><i class="fas fa-users" style="font-size: 75px;"></i></div>
						<div class="col-md-9">
							<div class="text-right" style="font-size: 45px;"><?= $total_user; ?></div>
							<div class="text-right">All Users</div>
						</div>
						
					</div>
				</div>
				
			</div>
			<a class="bg-white text-success" href="index.php?page=all-users">
				<div class="card-footer">
					<div class="float-left">All Users</div>
					<div class="float-right"><i class="fas fa-arrow-circle-right"></i></div>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	
</div>
<hr />
<h3>New Students</h3>
<div class="table-responsive">
	<table id="data" class="table table-hover table-bordered">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Name</th>
				<th scope="col">Roll</th>
				<th scope="col">Class</th>
				<th scope="col">City</th>
				<th scope="col">Contact</th>
				<th scope="col">Photo</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$db_sinfo = mysqli_query($link, "SELECT * FROM `student_info`");
			while ($row = mysqli_fetch_assoc($db_sinfo)) {?>
			
			
			
			<tr>
				<td><?php echo $row['id'];?></td>
				<td><?php echo ucwords($row['name']);?></td> <!-- use ucwords function for Uppercase first letter of an words -->
				<td><?php echo $row['roll'];?></td>
				<td><?php echo $row['class'];?></td>
				<td><?php echo ucwords($row['city']);?></td>
				<td><?php echo $row['pcontact'];?></td>
				<td><img style="width: 100px;" src="student_images/<?php echo $row['photo']; ?>" alt=""></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>