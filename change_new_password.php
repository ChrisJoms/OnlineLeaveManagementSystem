<?php
include 'config.php';
session_start();
echo $_SESSION['password_chk']; 
$verified = $_SESSION['password_chk'];

$checker = "SELECT * FROM resets WHERE Code = '$verified'";
$chk_query = mysqli_query($conn, $checker);
$fetch_assoc = mysqli_fetch_assoc($chk_query);
$password_coded = $fetch_assoc['Code'];
if ($verified == $password_coded){

}else{
    header("Location: invalid_otp.php");
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Change Password form</title>
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
        <form action="" method="post">
				<h1 class="text-success" style="text-align: center">Change Password</h1>
				<input type="text" name="new_password2" value="<?php echo $verified ?>" placeholder="Enter New Password" class="form-control form-control-sm" maxlength="30" hidden><br>
                <label for="Password">Password</label>
				<input type="password" name="new_password"  placeholder="Enter New Password" class="form-control form-control-sm" maxlength="30"><br>
                <label for="Password2">Retype Password</label>
                <input type="password" name="confirm_password" placeholder="Enter Retype Password" class="form-control form-control-sm"  maxlength="30"><br>
				<button type="submit" name="submit_button" class="btn btn-success btn-sm">Submit</button>
                <p style="text-align: center;">When you done to change your password? |<a href="index.php" style="text-decoration:none"> Click here</a></p>
                </div>
        </form>
                <?php
                if(isset($_POST['submit_button'])){
                    $newpassword = $_POST['new_password'];
                    $confirmpassword = $_POST['confirm_password'];
                    $fetchNum       = $_POST['new_password2'];
                    $checker = "SELECT * FROM resets WHERE Code = '$fetchNum'";
                    $chk_query = mysqli_query($conn, $checker);
                    $Chk_fetch = mysqli_fetch_assoc($chk_query);
                    $md5_password = md5($newpassword);
                    $emails = $Chk_fetch['Email'];
                    $update_account = "UPDATE users SET password = '$md5_password' WHERE email = '$emails'";
                    $update_query = mysqli_query($conn, $update_account);

                    if($newpassword == $confirmpassword){
                        echo '<script>alert("Password has been change succesfully")</script>';
                    }else{
                        echo '<script>alert("Both Password Do Not Matched")</script>';
                    }
                }
                ?>
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