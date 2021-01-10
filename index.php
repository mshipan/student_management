<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Student Management System</title>
  </head>
  <body>
    <div class="container">
    	<br />
    	<a class="btn btn-primary float-right" href="admin/login.php">Login</a>
    	<br />
    	<br />
    	<h1 class="text-center font-weight-lighter">Welcome to Shipan's Student Management System</h1>
<br />
    	<div class="row">
    		<div class="col-sm-5 offset-sm-4">
    			<form action="" method="POST">
    		<table class="table table-bordered">
    			<tr>
    				<td class="text-center" colspan="2"><label>Student Information</label></td>
    			</tr>

    			<tr>
    				<td><label for="choose">Choose Class</label></td>
    				<td><select class="form-control" name="choose" id="choose">
    					<option value="">Select</option>
    					<option value="1">1st</option>
    					<option value="2">2nd</option>
    					<option value="3">3rd</option>
    					<option value="4">4th</option>
    					<option value="5">5th</option>
    				</select></td>
    			</tr>

    			<tr>
    				<td><label for="roll">Roll No.</label></td>
    				<td><input class="form-control" type="text" name="roll" pattern="[0-9]" placeholder="Roll Number"></td>
    			</tr>

    			<tr>
    				<td class="text-center" colspan="2"><input type="submit" value="Show Info" name="show_info"></td>
    			</tr>
    		</table>
    	</form>
    		</div>
    	</div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>