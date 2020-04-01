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
					<li><a href="admin.php">users</a></li>
					<li class="current"><a href="feedbacks.php">feedbacks</a></li>
					<li><a href="main.php">logout</a></li>
				</ul>
			</nav>			
		</div>
	</header>

	<section>
		<div class="container">
			<?php
			$db=mysqli_connect('localhost','root','','php_project_db');
			$sql="SELECT * FROM user_feedback";
			$records=mysqli_query($db,$sql);
			?>
			<div class="container middle">
				<br>
				<div id="formt" align="center">
					<table width="550" border="1" cellpadding="1" cellspacing="1" id="registration" style="margin-bottom: 20px;"> 
						<tr>
							<!-- <th>User_id</th> -->
							<th>Rate</th>
							<th>Name</th>
							<th>email</th>
							<th>Comment</th>
						</tr>
						<?php 
						while($user_feedback= mysqli_fetch_assoc($records)){
							echo "<tr>";
 	// echo "<td>".$user_feedback['user_id']."</td> " ;
							echo "<td>".$user_feedback['rate']."</td>";
							echo "<td>".$user_feedback['name']."</td>";
							echo "<td>".$user_feedback['email']."</td>";
							echo "<td>".$user_feedback['comment']."</td>";
							echo "</tr>";
						}
						?>

					</table>
				</div>
			</div>
			
		</div>
	</section>
</body>
</html>