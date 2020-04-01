<?php
//establish connection with server
$connection=mysqli_connect("localhost", "root", "");

//selecting database
$db = mysqli_select_db("php_project_db", $connection);
session_start();  //starting session

//storing session
$user_check=$_SESSION['username'];

// sql query to fetch complete info
$ses_sql=mysqli_query("select username from registration where username='$user_check'", $connection);
$row= mysqli_fetch_assoc($ses_sql);
$login_session = $row['username'];

if (!isset($login_session)) {
	mysqli_close($connection);
	header('location: loggedin.php');
}

?>