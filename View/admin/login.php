<?php include '../classes/admin_login.php';
	$class = new admin_login();
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$admin_user = $_POST['admin_user'];
		$admin_pass = md5($_POST['admin_pass']);

		$login_Check = $class->login_admin($admin_user,$admin_pass);
	}
 ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div><span>
				<?php 
					if (isset($login_Check)) {
						echo $login_Check;
					}
				 ?>
			</span></div>
			<div>
				<input type="text" placeholder="Username" required="" name="admin_user"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="admin_pass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>