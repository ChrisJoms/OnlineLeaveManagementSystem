<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Confirmation of Email Address to send OTP CODE</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">


<script src="js/jquery.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body  class="bg-secondary">
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
					<h1><i class="fa fa-user"></i> User Email</h1>
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
		<div class="container w-50 mt-5">
        <form action="forgot.php" method="post">
				<h1 class="text-danger">The you entered Email Not Found in our records.</h1>
				<button type="submit" name="submit_button" class="btn btn-success btn-sm">Return</button>
                </div>
</form>


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