<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include 'config.php';
//Load Composer's autoloader
require 'mailer/vendor/autoload.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$test = $_POST['email'];

$sql = "SELECT * FROM users WHERE email = '$test'";
$query = mysqli_query($conn, $sql);
$fetch_email = mysqli_fetch_assoc($query);
$e_mail = $fetch_email['email'];
if($test != $e_mail){
    header("Location: invalid_email.php");
}else{




$code =  (rand(100000,999999));
$sql = "INSERT INTO resets (Email, Code) VALUES ('$test', '$code')";
$query = mysqli_query($conn, $sql);
try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mailtest8782@gmail.com';                     //SMTP username
    $mail->Password   = 'lnbiamwaqeodoffu';                               //SMTP password
    $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->SMTPAuth = true;
    //Recipients
    $mail->setFrom('mailtest8782@gmail.com', 'ADMIN');
    $mail->addAddress($test);     //Add a recipient
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Change Password';
    $mail->Body    = 'This is your OTP Code "'.$code.'"';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'OTP has been send to your email';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Confirm Reset Password</title>
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
				<h1 class="text-success">Check Your Email we sent you an OTP</h1>
				<label for="Email">Email</label>
				<input type="email" name="confirm_email" value="<?php echo $test ?>"  class="form-control form-control-sm" required onkeypress="return isNumberKey(event)" maxlength="30" disabled><br>
                <label for="Code">OTP CODE</label>
                <input type="number" name="password_code" placeholder="Enter your Reset Code" class="form-control form-control-sm" required pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;" id="password_code" name="password_code"><br>
				<button type="submit" name="submit_button" class="btn btn-success btn-sm">Submit</button>
                <p style="text-align: center;">Start Over Again! Click here |<a href="index.php"> Login</a></p>
                </div>
</form>
                <?php
                if(isset($_POST['submit_button'])){
                    session_start();
                    $message= " ";
                    $password_code = $_POST['password_code'];
                    $checker = "SELECT * FROM resets WHERE Email = '$test' AND Code = '$password_code'";
                    $chk_query = mysqli_query($conn, $checker);
                    $fetch_assoc = mysqli_fetch_assoc($chk_query);
                    $password_coded = $fetch_assoc['Code'];
                    $_SESSION['password_chk'] = $password_code;
                   
                    header("Location: change_new_password.php");
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