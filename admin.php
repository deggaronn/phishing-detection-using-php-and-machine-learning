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
	<link rel="stylesheet" type="text/css" href="./js/jquery-3.3.1.min.js">
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
	<link rel="stylesheet" type="text/css" href="./css/styles2.css">
</head>
<body id="show">
	<header>
		<div class="container">
			<div id="logo">
				<h1><span class="highlight">Phishing</span> <span class="second">Detection</span></h1>
			</div>
			<nav>
				<ul>
					<li class="current"><a href="admin.php">users</a></li>
					<li><a href="feedbacks.php">feedbacks</a></li>
					<li><a href="main.php">logout</a></li>
				</ul>
			</nav>			
		</div>
	</header>

	<section>
		<div class="container">
			<?php
			$db=mysqli_connect('localhost','root','','php_project_db');
			$sql="select * from registration";
			$users=mysqli_query($db,$sql);
			?>
			<div class="container middle">
				<br>
				<div id="formt" align="center">
					<table cellpadding="1" cellspacing="1" 	width="600" border="1" id="registration" style="margin-bottom: 20px;">
						<tr>
							<th>firstname</th>
							<th>lastname</th>
							<th>username</th>
							<th>email</th>
							<th>contact_no</th>
							<th>user type</th>
							<tr>
								<?php
								while ($registration=mysqli_fetch_assoc($users)) {
									echo "<tr>";
									echo "<td>".$registration['firstname']."</td>";
									echo "<td>".$registration['lastname']."</td>";
									echo "<td>".$registration['username']."</td>";
									echo "<td>".$registration['email']."</td>";
									echo "<td>".$registration['contact']."</td>";
									echo "<td>".$registration['user_type']."</td>";
									echo "</tr>";
								}
								?>
							</tr>
						</tr>
					</table>
				</div>
			</div>
			
		</div>
	</section>
</body>
</html>