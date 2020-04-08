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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
	<link rel="stylesheet" type="text/css" href="./css/styles2.css">

</head>
<body>
	<header>
		<div class="container">
			<div id="logo">
				<h1><span class="highlight" onclick="location='main.php'">Phishing</span><span class="second" onclick="location='main.php'">Detector</span></h1>
			</div>
			<nav>
				<ul>
					<li class="current"><a href="main.php">Dashboard</a></li>
					<li><a href="register.php">Register</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</nav>			
		</div>
	</header>

	<section id="showcase">
		<div class="container"><br><br>
		<h1>Do Not Make Mistake - Check Every Website</h1>
			<p>Stay Alert!!!, Be Safe From The Phishers</p>
		</div>
	</section>

	<section id="check">
		<div class="container">
			<h1>Check URL</h1>
			<form action="" method="POST">
				<input type="text" placeholder="Paste URL..." name="url" required="">
				<button type="submit" name="submit" class="button1"><span>CHECK</span></button><span id="result"><?php 

				$username = "";
				$email    = "";
				$errors = array(); 

				$db = mysqli_connect('localhost', 'root', '', 'php_project_db');


				if (isset($_POST['submit'])) {
					$url = mysqli_real_escape_string($db, $_POST['url']);

					if (count($errors) == 0) {
						$query = "SELECT * FROM urls WHERE url='$url'";
						$results = mysqli_query($db, $query);
						if (mysqli_num_rows($results) >= 1) {
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

<section class="slide">
	<div class="slideshow-container">

<div class="mySlides fade">
  <img src="css/img/Capture.PNG" style="width:100% height:100%">
</div>

<div class="mySlides fade">
  <img src="css/img/Capture2.PNG" style="width:100% height:100%">
</div>

<div class="mySlides fade">
  <img src="css/img/Capture3.PNG" style="width:100% height:100%">
</div>

<div class="mySlides fade">
  <img src="css/img/Capture4.PNG" style="width:100% height:100%">
</div>

<div class="mySlides fade">
  <img src="css/img/Capture5.PNG" style="width:100% height:100%">
</div>

<div class="mySlides fade">
  <img src="css/img/Capture6.PNG" style="width:100% height:100%">
</div>

<div class="mySlides fade">
  <img src="css/img/Capture7.PNG" style="width:100% height:100%">
</div>

<div class="mySlides fade">
  <img src="css/img/Capture8.PNG" style="width:100% height:100%">
</div>

<div class="mySlides fade">
  <img src="css/img/Capture9.jpg" style="width:100% height:100%">
</div>

<div class="mySlides fade">
  <img src="css/img/Capture10.jpg" style="width:100% height:100%">
</div>

<div class="mySlides fade">
  <img src="css/img/Capture11.jpg" style="width:100% height:100%">
</div>

<div class="mySlides fade">
  <img src="css/img/Capture12.jpg" style="width:100% height:100%">
</div>

<div class="mySlides fade">
  <img src="css/img/Capture13.png" style="width:100% height:100%">
</div>

</div>
<br>

<div style="text-align:center">
	<span class="dot"></span> 
	<span class="dot"></span> 
	<span class="dot"></span> 
	<span class="dot"></span> 
	<span class="dot"></span> 
	<span class="dot"></span>
	<span class="dot"></span> 
	<span class="dot"></span> 
	<span class="dot"></span>
	<span class="dot"></span> 
	<span class="dot"></span> 
	<span class="dot"></span>
	<span class="dot"></span> 
</div>

</section>

<section style="background-color: #F2F2F2">
	<div class="container">
		<div class="imagebg"></div>
		<div class="row " style="margin-top: 50px">
			<div class="col-md-6 col-md-offset-3 form-container">
				<h2>Feedback</h2> 
				<p> Please provide your feedback below: </p>
				<form role="form" method="post" id="reused_form">
					<div class="row">
						<div class="col-sm-12 form-group">
							<label>How do you rate your overall experience?</label>
							<p>
								<label class="radio-inline">
									<input type="radio" name="experience" id="radio_experience" value="bad" required="">
									Bad 
								</label>
								<label class="radio-inline">
									<input type="radio" name="experience" id="radio_experience" value="average" >
									Average 
								</label>
								<label class="radio-inline">
									<input type="radio" name="experience" id="radio_experience" value="good" >
									Good 
								</label>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 form-group">
							<label for="comments"> Comments:</label>
							<textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Comments" maxlength="6000" rows="7" required=""></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 form-group">
							<label for="name"> Your Name:</label>
							<input type="text" class="form-control" id="name" name="name" required>
						</div>
						<div class="col-sm-6 form-group">
							<label for="email"> Email:</label>
							<input type="email" class="form-control" id="email" name="email" required>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 form-group">
							<button type="submit" class="btn btn-lg btn-warning btn-block" name="send">Post </button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<footer>
	<p>Phishing Website Detection System, Copyright &copy, 2020<br></p>
	<p>Github:<br>github.com/genialkartik<br>Email: kartik.11702672@lpu.in</p>
</footer>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 5000); 
}
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
</script>
</body>
</html>
