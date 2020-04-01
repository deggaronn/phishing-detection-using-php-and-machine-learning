<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">

	<meta name="descripton" content="free website check">
	<meta name="keyword" content="phishing, check websites, fake websites">
	<meta name="author" content="Suzan Dhungana">
	<title>detecting phishhing website</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="./js/jquery-3.3.1.min.js">
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
	<link rel="stylesheet" type="text/css" href="./css/styles2.css">
</head>
<body>
	<header>
		<div class="container">
			<div id="logo">
				<h1><span class="highlight" onclick="location='main.php'">Phishing</span> <span class="second" onclick="location='main.php'">Detection</span></h1>
			</div>
			<nav>
				<ul>
					<li><a href="main.php">Home</a></li>
					<li><a href="register.php">Register</a></li>
					<li class="current"><a href="login.php">Login</a></li>
				</ul>
			</nav>			
		</div>
	</header>

	<section id="logins">
		<div class="login-form">
			<form action="" method="POST" id="login">
				<span style="color: red"><?php include('errors.php'); ?></span>
				<input type="text" placeholder="  username" name="user" id="button" required=""><br><br>
				<input type="password" placeholder="  password" name="pass" id="button" required=""><br><br>
				<button type="submit" name="login" id="butt">login</button><br>
				<p style="color: white"><input type="checkbox" name="remember"> Remember Me &nbsp; <span><a href="forgetpass.php"> Forgot Pasword?</a></span></p>
				<p style="color: white">Not yet member? <a href="register.php"> <u> sign up</u></a></p>
			</form>
		</div>
	</section>

	<section id="check">
		<div class="container">
			<h1>Check URL</h1>
			<form action="" method="POST">
				<input type="text" placeholder="Paste URL..." name="url" required="paste url first">
				<button type="submit" name="submit" class="button1"><span>CHECK</span></button><span id="result"><?php 

// initializing variables
				$username = "";
				$email    = "";
				$errors = array(); 

// connect to the database
				$db = mysqli_connect('localhost', 'root', '', 'php_project_db');


				if (isset($_POST['submit'])) {
					$url = mysqli_real_escape_string($db, $_POST['url']);

					if (count($errors) == 0) {
						$query = "SELECT * FROM urls WHERE url='$url'";
						$results = mysqli_query($db, $query);
						if (mysqli_num_rows($results) == 1) {
							$check_url = mysqli_fetch_assoc($results);
							if ($check_url['type'] == '1') {
								echo "<font color='red'>THIS IS PHISHING URL</font>";     
							}else{
								echo "<font color='green'>THIS IS NOT PHISHING URL</font>";
							}
						}else {
							echo("Not Found, Please Login");
						}
					}
				}?>

			</span>
			</form>
		</div>
	</section>

	<section class="">
		<div>
			
		</div>
	</section>

	<footer>
		<p>Phishing Website Detection System, Copyright &copy, 2018<br></p>
		<p>Contact us:<br>Phone no: 9813225420<br>Email: sujan.dhungana321@hotmail.com</p>
	</footer>
</body>
</html>