<?php include('config.php');
session_start();
$id = $_GET['MnoQtyPXZORTE'];
$message = $Home = '';
$_SESSION['users'] = $id;
if ($_SESSION['users'] == '') {
		header("location:forgot.php");
}
else
{
if(isset($_POST['submit'])) {
	$password = $_POST['password'];
	$Repassword = $_POST['Repassword'];

	if ($password !== $Repassword) {
		$message = "<div class='alert alert-danger'>Password Not Match..!!</div>";
	}
	else{
	$id = base64_decode($id);
	$query = "UPDATE users SET password = '$password' WHERE aid = '$id' ";
	$result = $conn->query($query);
		if($result){
			$message = "<div class='alert alert-success'>Your Password Successfully Change</div>";
			$Home = "<a href='login.php' class='btn btn-success btn-sm'>Login</a>";
	}else{
		$message = "<div class='alert alert-danger'>Failed to Reset Password..!!</div>";
	}
	}
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
		<div class="container w-50 mt-5">
			<form class="bg-light p-5 shadow-lg" method="post">
				<?php echo $message; ?>
				<h1 class="text-success">Change Password</h1>
				<label for="password">Password</label>
				<input type="password" name="password" placeholder="Password" class="form-control form-control-sm" required onkeypress="return isNumberKey(event)" maxlength="30"><br>
				<label for="password">Retype Password</label>
				<input type="password" name="Repassword" placeholder="Retype Password" class="form-control form-control-sm" class="btn btn-primary" required onkeypress="return isNumberKey(event)" maxlength="30"><br>
				<button type="submit" name="submit" class="btn btn-primary" class="btn btn-success btn-sm">Submit</button> <?php echo $Home; ?>
			</form>
		</div>
</body>
</html>