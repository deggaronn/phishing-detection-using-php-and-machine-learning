<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '','php_project_db');

// REGISTER USER
if (isset($_POST['register'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['fname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lname']);
  $username = mysqli_real_escape_string($db, $_POST['user']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['pass1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['pass2']);
  $contact = mysqli_real_escape_string($db, $_POST['phone']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM registration WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
//   if (count($errors) == 0) {
//     $password = md5($password_1);//encrypt the password before saving in the database

//     $query = "INSERT INTO registration (username, email, address,contact,password) 
//           VALUES('$username', '$email', '$address','$contact','$password_1')";
//     $q=mysqli_query($db, $query);
//               if($q)
//        {
//         echo"<script>alert('Sucessfully Register')</script>";
//        }
//    else
//   {
// echo"<script>alert('Error')</script>";
// }


//   }
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    if (isset($_POST['user_type'])) {
      $user_type = e($_POST['user_type']);
      $query = "INSERT INTO registration (firstname, lastname, username, email, contact, password, user_type) 
      VALUES('$firstname', '$lastname', '$username', '$email', '$contact', '$password', '$user_type')";
      mysqli_query($db, $query);
      $_SESSION['success']  = "New user successfully created!!";
      header('location: MAIN.php');
    }else{
      $query = "INSERT INTO registration (firstname, lastname, username, email, contact, password, user_type) 
      VALUES('$firstname', '$lastname', '$username', '$email', '$contact', '$password', 'user')";
      mysqli_query($db, $query);

      // get id of the created user
      $logged_in_user_id = mysqli_insert_id($db);

      $_SESSION['username'] = getUserById($logged_in_user_id); // put logged in user in session
      header('location: login.php');        
    }
  }

}
  // return user array from their id
function getUserById($id){
  global $db;
  $query = "SELECT * FROM registration WHERE id=" . $id;
  $result = mysqli_query($db, $query);

  $user = mysqli_fetch_assoc($result);
  return $user;
}

function isAdmin()
{
  if (isset($_SESSION['username']) && $_SESSION['username']['user_type'] == 'admin' ) {
    return true;
  }else{
    return false;
  }
}

// USER LOGIN
if (isset($_POST['login'])) 
{
  // $passwordl=md5($_POST['pass']);
  $username = mysqli_real_escape_string($db, $_POST['user']);
  $password = md5(mysqli_real_escape_string($db, $_POST['pass'])); 

  if (count($errors) == 0) 
  {
    $query = "SELECT * FROM registration WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) 
    {
      $logged_in_user = mysqli_fetch_assoc($results);
      if ($logged_in_user['user_type'] == 'admin') 
      {

        $_SESSION['username'] = $username;
        $_SESSION['success']  = "You are now logged in";
        $user_check= $_SESSION['user'];
        $sec_ql=mysqli_query($db, "SELECT username FROM registration WHERE username='$user_check'");
        $row=mysqli_fetch_assoc($sec_ql);
        $log_sec=$row['username']; 
        header('location: admin.php');    
      }
      else
      {
        $_SESSION['username'] = $username;
        $_SESSION['success']  = "You are now logged in";
        header('location: loggedin.php');
      }
    }
    else 
    {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

function isLoggedIn()
{
  if (isset($_SESSION['username'])) {
    return true;
  }else{
    return false;
  }
}


if (isset($_POST['send'])) {
    // receive all input values from the form
  $rate = mysqli_real_escape_string($db, $_POST['experience']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $comment = mysqli_real_escape_string($db, $_POST['comments']);
  
    // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

    $query = "INSERT INTO user_feedback (rate, name, email, comment) 
          VALUES('$rate', '$name','$email', '$comment')";
    mysqli_query($db, $query);
        echo"<script>alert('feedback has been sucessfully send')</script>";
}
}
?>

