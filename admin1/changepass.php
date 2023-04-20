<?php 
include('connection.php');
session_start();
if(isset($_POST['change'])){

$name=$_POST['txtn'];
$email=$_POST['txte'];
$pwd=md5($_POST['txtp']);

$query="select *from admin where name='$name' AND email='$email'";

$result=mysqli_query($conn,$query);
$num=mysqli_fetch_array($result);
if($num>0){
mysqli_query($conn,"update admin set password='$pwd' where email='$email' AND name='$name'");
$_SESSION['email']=$email;
header('location:index.php');
}else{
echo"<script>alert('Wrong Name or Email Please Try Again')</script>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Change Password</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body class="bg-secondary">
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Online Leave Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


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
					<h1><i class="fa fa-user-secret"></i> Admin Changepass</h1>
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
<form method="post" action="">
Name
<input type="text" name="txtn" placeholder="Type your Name" class="form-control" required onkeypress="return isNumberKey(event)" maxlength="30"><p>

Email
<input type="email" name="txte" placeholder="Email Address" class="form-control" required onkeypress="return isNumberKey(event)" maxlength="30"><p>

New password
<input type="password" name="txtp" placeholder="Enter Password" class="form-control" required onkeypress="return isNumberKey(event)" maxlength="30"><p>
<input type="submit" name="change" value"Reset" class="btn btn-success btn-sm ">
</div>
</body>
</html>
