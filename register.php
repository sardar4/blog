
<?php
	include 'batadese/conect.php';

	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\PHPMailer;
	
	
	
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

	$error = "";
	$lenthe = "";
	$msg = "";
	$exist = "";

	if(isset($_POST['submit'])){
		$name = mysqli_escape_string($conn,$_POST['name']);
		$mobile = mysqli_escape_string($conn,$_POST['mobile']);
		$email = mysqli_escape_string($conn,$_POST['email']);
		$password = mysqli_escape_string($conn,$_POST['pas']);
		$confirmPassword = mysqli_escape_string($conn,$_POST['confirmpassword']);
		$email_exist = "SELECT 	email FROM user WHERE 	email = '$email'";
		$query = mysqli_query($conn,$email_exist);

		if(mysqli_num_rows($query)>0){
			$exist = "Your email alredy exist";
		}

		if( empty($name) || empty($mobile) || empty($email) || empty($password) || empty($confirmPassword) ){
			$error = "Full Filup";
		}
		else if(strlen($name)<5){
			$lenthe = "Your name is sort minmum 6";
		}
		else if($password != $confirmPassword){
			$msg = "passwords doesn't match";
	    }
	    else{
			$password = md5($password);
			$v_key = md5(time().$email);
			$sql = "INSERT INTO user (name,email,mobile,password,v_key,v_status	) VALUES ('$name','$email','$mobile','$password','$v_key',0)";
			$query = mysqli_query($conn,$sql);

			if($query){

				$mail = new PHPMailer ;

				$mail->isSMTP();
				$mail->Host = "smtp.gmail.com";
				$mail->SMTPAuth = true; 
				$mail->Username = "sardarasik170@gmail.com";
				$mail->Password = "asik1234";
				$mail->SMTPSecure = "tls";
				$mail->Port = 587;
				$mail->From = "sardarasik170@gmail.com";
				$mail->FromName = "Asik";

				$mail->addAddress($email,"Recepient Name");
				
				$mail->isHTML(true);

				$mail->Subject = "verify now";
				$mail->Body = "<a href='http://localhost/smolldevelop/blog/verify.php?v_key=$v_key'>Click the link</a>";

				if(!$mail->send()){
					echo "Mailer Error: " . $mail->ErrorInfo;
				} 
				else{
					echo "<script>alert('done')</script>";
				}
				header('location:success.php');
			}
			else{
				echo mysqli_error($conn);
			}
	    }
	}


?>


<!doctype html>
<html lang="en" class="fullscreen-bg">

<?php
	include 'layout/css-layout/css-layout.php';
?>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box " style="height: 540px;">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="assets/img/logo-dark.png" alt="Klorofil Logo"></div>
								<p class="lead">Register to your account</p>
							</div>
							<form class="form-auth-small" method="POST" action="?">
								<div class="form-group">
									<label for="name" class="control-label sr-only">Name</label>
									<input type="text" class="form-control" id="name" name="name" value="" placeholder="Name" >
									<span class="text-success"><?= $error;?><?= $lenthe; ?></span>
                                </div>
								<div class="form-group">
									<label for="mobile" class="control-label sr-only">Mobile</label>
									<input type="mobile" class="form-control" id="mobile" name="mobile" value="" placeholder="Mobile Number" >
									<span class="text-success"><?= $error;?></span>
								</div>                                
								<div class="form-group">
									<label for="-email" class="control-label sr-only">Email</label>
									<input type="email" class="form-control" id="email" name="email" value="" placeholder="Email" >
									<span class="text-success"><?= $error;?><?=$exist;?></span>
								</div>                                
								<div class="form-group">
									<label for="password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="password" name="pas" value="" placeholder="Password" >
									<span class="text-success"><?= $error;?></span>
								</div>
								<div class="form-group">
									<label for="confirmpassword" class="control-label sr-only"> confirm Password</label>
									<input type="password" class="form-control" id="cpassword" name="confirmpassword" value=""  placeholder="Confirm Password" >
									<span class="text-success"><?= $error;?><?= $msg; ?></span>
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">SIBMIT</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Free Bootstrap dashboard template</h1>
							<p>by The Develovers</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
