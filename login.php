
<?php
	include 'batadese/conect.php';
	$error ='';
	$invalid ='';
	
	session_start();
	if(isset($_SESSION['loging_user'])){
		header('location:index.php');
	}

	if(isset($_POST['login'])){
		$email = mysqli_escape_string($conn,$_POST['email']);
		$password = mysqli_escape_string($conn,$_POST['password']);

		if(empty($email) || empty($password)){
			$error = "<span>the feild is reqied</span>";
		}
		else{
			$password = md5($password);
			$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
			$query = mysqli_query($conn,$sql);
			if(mysqli_num_rows($query)>=1){
				$_SESSION ['loging_user']=$email;
				header ('location:index.php');
			}
			else{
				$invalid = "invalid email or password";
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
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="assets/img/logo-dark.png" alt="Klorofil Logo"></div>
								<p class="lead">Login to your account</p>
							</div>
							<form class="form-auth-small" method="POST" action="?">
								<div class="form-group">
									<label for="email" class="control-label sr-only">Email</label>
									<input type="email" class="form-control" name="email" id="email" value="" placeholder="Email">
										<?=$error;?>
										<?=$invalid;?>
								</div>
								<div class="form-group">
									<label for="password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" name="password" id="password" value=""  placeholder="Password">
										<?=$error;?>
										<?=$invalid;?>
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block" name="login">LOGIN</button>
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
