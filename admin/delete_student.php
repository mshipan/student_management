<?php 

	require_once './dbcon.php';

	$id = base64_decode($_GET['id']);

	mysqli_query($link, "DELETE FROM `student_info` WHERE id = '$id'");

	header("location: index.php?page=all-students");

 ?>


<!--  

Database auto increment problem code
------------------------------------

set @autoid :=0; 
update student_info set id = @autoid := (@autoid+1);
alter table student_info Auto_Increment = 1; 

-->