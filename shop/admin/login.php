<?php include '../classes/adminlogin.php';?>
<?php
	$al = new Adminlogin();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$a_username = $_POST['a_username'];
		$a_password = md5($_POST['a_password']);
		$loginchk = $al->adminLogin($a_username,$a_password);
	}

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<h2 style="color:red;font-size: 18px;">
				<?php
					if(isset($loginchk)){
						echo $loginchk;
					}
				?>
			</h2>
			<div>
				<input type="text" placeholder="username" name="a_username"/>
			</div>
			<div>
				<input type="password" required="" placeholder="password" name="a_password"/>
			</div>
			<div>
				<input type="submit" value="Login" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>