<?php include('inc/head.php'); 
session_start();
$message = '';
if(isset($_POST['submit']) != '') {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query = "SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Online Leave Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/font-awesome.min.css">


<script src="js/jquery.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</head>
<body class="bg-secondary">

<nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse p-0">
		<div class="container">
			<button class="navbar-toggler toggler-right" data-target="#mynavbar" data-toggle="collapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a href="index.php" class="navbar-brand mr-3">Online Leave Management System</a>
			
		</div>
	</nav>
	<!--This Is Header-->
	<header id="main-header" class="bg-danger py-2 text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1><i class="fa fa-user-secret"></i> Admin Login</h1>
				</div>
			</div>
		</div>
	</header>
	<!--This is section-->
	<section id="sections" class="py-4 mb-4 bg-faded">
		<div class="container">
			<div class="row">
				
				
			</div>
		</div>
	
	</section>
		<div class="container w-50 mt-5">
			<form method="post" class="bg-light p-5 shadow-lg">
				<?php echo $message; ?>
				<label class="form-control-label">Email</label>
				<input type="email" name="email" class="form-control" placeholder="Email Address" required onkeypress="return isNumberKey(event)" maxlength="30" />
				<br />
				<label class="form-control-label">Password</label>
				<input type="password" name="password" class="form-control" placeholder="Enter Password" required onkeypress="return isNumberKey(event)" maxlength="30" />
				<br />
				<button type="submit" name="submit" class="btn btn-success btn-sm">Login</button>
				<a href="forgot.php" style="margin-left: 150px">Forgot Password?</a>
			</form>
		</div>

		<br><br><br><br><br><br><br><br><br>

	<!----Section3 footer <a href="forgot.php" style="margin-left: 150px">Forgot Password?</a> ---->
	<section id="main-footer" class="text-center text-white bg-inverse mt-4 p-4">
		<div class="container">
			<div class="row">
				<div class="col">
					<p class="lead">&copy; <?php echo date("Y")?> SOLM</p>
				</div>
			</div>
		</div>
	</section>
</body>
</html>

<?php 
	if(isset($_POST['submit'])){
		$user = $_POST['email'];
		$password = $_POST['password'];

		$password = md5($_POST['password']);

		include 'inc/config.php';

		$sql = "SELECT * FROM admin WHERE email = '$user' AND password = '$password'";

		$run = mysqli_query($con,$sql);
		$check = mysqli_num_rows($run);

		if($check == 1){
			session_start();
			$_SESSION['email'] = $user; 
			echo "<script> 
					window.open('dashboard.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Email or Password Invaild');
			window.open('index.php','_self');
			</script>";
		}
	}
 ?>