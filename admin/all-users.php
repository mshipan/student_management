

<h1 class="text-primary"><i class="fas fa-users"></i> All Users <small style="color: #6c757d;">all users</small> </h1>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
	<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-users"></i> All Users</li>
</ol>

<div class="table-responsive">
	<table id="data" class="table table-hover table-bordered">
		<thead>
			<tr>
			
				<th scope="col">ID</th>
				<th scope="col">Name</th>
				<th scope="col">Email</th>
				<th scope="col">Username</th>
				<th scope="col">Photo</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
				$db_sinfo = mysqli_query($link, "SELECT * FROM `users`");
			while ($row = mysqli_fetch_assoc($db_sinfo)) {?>
			
			
			
			<tr>
				
				<td><?php echo $row['id'];?></td>
				<td><?php echo ucwords($row['name']);?></td>
				<td><?php echo $row['email'];?></td>
				<td><?php echo $row['username'];?></td>
				<td><img style="width: 100px;" src="images/<?php echo $row['photo']; ?>" alt=""></td>
				
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>