<?php
session_start();                                             // starts the session

include_once('database/database.php');                       // connects to the database
include_once('database/user.php');                           // loads the functions responsible for the users table
include_once('input.php');
$user_clean = cleanInput($_POST['username']);
$pass_clean = cleanInput($_POST['password1']);//?
if ((password1==password2) && (userRegister($_POST['user_clean'], $_POST['pass_clean']))){  // if registration was successful
  echo 'Registration complete. Logging you in...';
  $_SESSION['username'] = $_POST['user_clean'];                // store the username
  header('Location: ' . $_SERVER['home.php']);
}else{
  echo 'Registration failed. Please check the details provided and try again.';
  header('Location: ' . $_SERVER['register_form.php']);
}

?>
