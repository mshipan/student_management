

<h1 class="text-primary"><i class="fas fa-users"></i> All Student <small style="color: #6c757d;">all students</small> </h1>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
	<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-users"></i> All Students</li>
</ol>

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
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$db_sinfo = mysqli_query($link, "SELECT * FROM `student_info`");
			while ($row = mysqli_fetch_assoc($db_sinfo)) {?>
			
			
			
			<tr>
				<td><?php echo $row['id'];?></td>
				<td><?php echo ucwords($row['name']);?></td>
				<td><?php echo $row['roll'];?></td>
				<td><?php echo $row['class'];?></td>
				<td><?php echo ucwords($row['city']);?></td>
				<td><?php echo $row['pcontact'];?></td>
				<td><img style="width: 100px;" src="student_images/<?php echo $row['photo']; ?>" alt=""></td>
				<td>
					<a class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Edit" href="index.php?page=update_student&id=<?php echo base64_encode($row['id']);?>"><i class="fas fa-user-edit"></i></a>
					<a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" href="delete_student.php?id=<?php echo base64_encode($row['id']);?>"><i class="fas fa-user-minus"></i></a>
				</td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>