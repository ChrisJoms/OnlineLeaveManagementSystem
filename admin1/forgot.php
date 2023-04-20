<?php include('connection.php');
session_start();
$message = $link = '';
if(isset($_POST['submit'])) {
	$email = $_POST['email'];
	$query = "SELECT * FROM admin WHERE email = '".$email."'";
	$result = $conn->query($query);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$id = $row['id'];
		$id_encode = base64_encode($id);
		$link = "<a href='changepass.php?MnoQtyPXZORTE=$id_encode' class='btn btn-info btn-sm'>Confirm</a>";
	}
	}else{
		$message = "<div class='alert alert-danger'>Invalid Email..!!</div>";
	}
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
			<form class="bg-light p-5 shadow-lg" method="post">
				<?php echo $message; ?>
				<h1 class="text-success">Click Submit and to Confirm</h1>
				<label for="Email">Email</label>
				<input type="email" name="email" placeholder="Input your Email Address" class="form-control form-control-sm" required onkeypress="return isNumberKey(event)" maxlength="30"><br>
				<button type="submit" name="submit" class="btn btn-success btn-sm">Submit</button>
				<?php echo $link; ?>
                <a href="index.php">Login</a><br>
			</form>
		</div>

        <br><br><br><br><br><br><br><br><br>

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

</body>
</html>
