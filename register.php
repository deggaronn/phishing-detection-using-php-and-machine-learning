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
					<li class="current"><a href="register.php">Register</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</nav>			
		</div>
	</header>

	<section id="register">
		<div class="reg-form">
			<form name="reg" id="registration" action="" method="POST">
				<input type="text" name="fname" id="button" placeholder="first name" required=""><br><br>
				<input type="text" name="lname" id="button" placeholder="last name" required=""><br><br>
				<input type="text" name="user" id="button" placeholder="username" required=""><br><br>
				<input type="email" name="email" id="button" id="email" placeholder="email" required=""><br><br>
				<input type="password" name="pass1" id="passf" placeholder="password" required="" minlength="8"><br><br>
				<input type="password" name="pass2" id="passs" placeholder="confirm password" required="" minlength="8"><span id="verify"></span><br><br>
				<select id="ph"><option>+977</option><option>+67</option><option>+97</option><option>+132</option><option>+47</option><option>+93</option><option>+135</option><option>+57</option><option>+556</option><option>+171</option><option>+556</option><option>+297</option><option>+61</option><option>+65</option><option>+47</option><option>+77</option><option>+778</option></select>
				<input type="number" name="phone" id="phone" placeholder="phone number" min="10000000" maxlength="15" required=""><br><br>
				<input type="submit" value="register" id="butt" name="register"><br><br>
				<p style="color: white">already member? <a href="login.php"> <u> sign in</u></a></p>
			</form>
		</div>
	</section>

	<footer>
		<p>Phishing Website Detection System, Copyright &copy, 2018<br></p>
		<p>Contact us:<br>Phone no: 9813225420<br>Email: sujan.dhungana321@hotmail.com</p>
	</footer>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">

			$('#passf, #passs').on('keyup', function () {
				if ($('#passf').val() == $('#passs').val()) {
					$('#verify').html('Matching').css('color', 'green');
				} else 
				$('#verify').html('Not Matching').css('color', 'red');
			});
</script>

</body>
</html>