<?php
include('server.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_POST['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: login.php");
}
?>

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
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
	<header>
		<div class="container">
			<div id="logo">
				<h1><span class="highlight" onclick="location='loggedin.php'">Phishing</span> <span class="second" onclick="location='loggedin.php'">Detection</span></h1>
			</div>
			<nav>
				<ul>
					<li class="current"><a href="loggedin.php">Home</a></li>
					<li style="	color: #ffff80;
					text-decoration: none;
					text-transform: uppercase;
					font-size: 16px;"><?php
					echo ("Welcome ".$_SESSION['username']);
					?></li>
					<li><a href="main.php">Logout</a></li>
				</ul>
			</nav>			
		</div>
	</header>

	<section id="showcase">
		<div class="container">
			<h1>Do Not Make Mistake - Check Every Website</h1>
			<p>Stay Alert!!!, Be Safe From The Phishers</p>
		</div>
	</section>

	<section id="check">
		<div class="container">
			<h1>Check URL</h1>
			<form action="" method="POST">
				<input type="text" placeholder="Paste URL..." name="url" required="">
				<button type="submit" name="check" class="button1"><span>CHECK</span></button><span id="result"><?php 


				$username = "";
				$email    = "";
				$errors = array(); 


				$db = mysqli_connect('localhost', 'root', '', 'php_project_db');


				if (isset($_POST['check'])) {
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
							set_time_limit(0);


							if(isset($_POST['check']))
							{
								$a=$_POST['url'];

								if (filter_var($a, FILTER_VALIDATE_URL) === FALSE) {
									echo "Enter Proper URL";
								}

								else{
									$result=exec('index.py '.$a);

  
									if ($result===' THIS IS NOT PHISHING URL') {
										echo "<font color='green'>THIS IS NOT PHISHING URL</font>";
									}
									else{
										echo "<font color='red'>THIS IS PHISHING URL</font>";
									}
									
								}
							}
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
	<p>Phishing Website Detection System, Copyright &copy, 2020<br></p>
	<p>Github:<br>github.com/genialkartik<br>Email: kartik.11702672@lpu.in</p>
</footer>
</body>
</html>