<!DOCTYPE html>
<html lang="em">
	<head>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">
</head>
<?php include('inc/head.php'); 
	if (isset($_POST['adduser'])){
		$name = $_POST['name'];
		$department = $_POST['department'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$password = md5($_POST['password']);


		$sql = "INSERT INTO users(name,department,email,password)VALUES('$name','$department','$email','$password')";

		$run = mysqli_query($con,$sql);

		if($run == true){
			
			echo "<script> 
					alert('User Successful Registered');
					window.open('index.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Failed');
			</script>";
		}
	}
 ?>
<body>

<nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse p-0">
		<div class="container">
			<button class="navbar-toggler toggler-right" data-target="#mynavbar" data-toggle="collapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a href="index.php" class="navbar-brand mr-3">Online Leave Management System</a>
			
		</div>

	</nav>

	<!--This Is Header-->
	<header id="main-header" class="bg-primary py-2 text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1><i class="fa fa-users"></i> User Registration</h1>
				</div>
			</div>
		</div>
	</header>

	<!--This is section-->
	<section id="sections" class="py-4 mb-4 bg-faded">
		<div class="container">
			<div class="row">
				<div class="col-md"></div>
				<div class="col-md-2">
					<a href="#" class="btn btn-danger btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addEmpModal"> Click Here</a>
				</div>
				<div class="col-md"></div>
			</div>
		</div>
	
	</section>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<!----Section3 footer ---->
	<section id="main-footer" class="text-center text-white bg-inverse mt-4 p-4">
		<div class="container">
			<div class="row">
				<div class="col">
				<p class="lead">&copy; <?php echo date("Y")?> SOLM</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Add Users Modal -->
	<div class="modal fade" id="addEmpModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-danger text-blue">
					<div class="modal-title">
						<h5>Fill Upp</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label class="form-control-label">Name</label>
							<input type="text" name="name" class="form-control" required  onkeypress="return isNumberKey(event)" maxlength="30"/>
							<label class="form-control-label">Department</label>
							<select name="department" class="form-control" required>
								<option value="HR">HR</option>
								<option value="Marketing">Marketing</option>
								<option value="Development">Development</option>
								<option value="UX">UX</option>
								<option value="Test Team">Test Team</option>
								<option value="Finance">Finance</option>
								<option value="Customer Support">Customer Support</option>
							</select>
						</div>

						<div class="form-group">
							<label class="form-control-label">Email</label>
							<input type="email" name="email" class="form-control" required  onkeypress="return isNumberKey(event)" maxlength="50"/>
						</div>
						<div class="form-group">
							<label class="form-control-label">Password</label>
							<input type="password" name="password" class="form-control" required  onkeypress="return isNumberKey(event)" maxlength="30"/>
						</div>
					</div>
					<div class="modal-footer">

						<input type="submit" class="btn btn-success" style="border-radius:0%;" name="adduser"  value="Submit">
					</div>
				</form>
			</div>
		</div>
	</div>

  <script src="js/jquery.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>


<script type="text/javascript">
	$(document).ready(function () {

    $('#datatableid').DataTable({
		
	});
	
});
</script>
 
</body>
</html>