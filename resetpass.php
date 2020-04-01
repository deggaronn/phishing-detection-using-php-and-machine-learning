<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
	$statusMsg = $sessData['status']['msg'];
	$statusMsgType = $sessData['status']['type'];
	unset($_SESSION['sessData']['status']);
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
	<link rel="stylesheet" type="text/css" href="./js/jquery-3.3.1.min.js">
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
	<link rel="stylesheet" type="text/css" href="./css/styles2.css">
	<link rel="stylesheet" type="text/css" href="./css/fogpas.css">
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
		<h2 style="color: blue">Reset Your Account Password</h2>
		<?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'" style="background-color: #051019;
		opacity: 0.6;">'.$statusMsg.'</p>':''; ?>
		<div class="container1">
			<div class="regisFrm">
				<form action="userAccount.php" method="post">
					<input type="password" name="password" placeholder="PASSWORD" required="">
					<input type="password" name="confirm_password" placeholder="CONFIRM PASSWORD" required="">
					<div class="send-button">
						<input type="hidden" name="fp_code" value="<?php echo $_REQUEST['fp_code']; ?>"/>
						<input type="submit" name="resetSubmit" value="RESET PASSWORD">
					</div>
				</form>
			</div>
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

<footer>
	<p>Phishing Website Detection System, Copyright &copy, 2018<br></p>
	<p>Contact us:<br>Phone no: 9813225420<br>Email: sujan.dhungana321@hotmail.com</p>
</footer>
</body>
</html>