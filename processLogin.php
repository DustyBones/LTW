<?php
session_start();                                             // starts the session

include_once('database/database.php');                       // connects to the database
include_once('database/user.php');                           // loads the functions responsible for the users table
include_once('input.php');
$user_clean = cleanInput($_POST['username']);
$pass_clean = cleanInput($_POST['password']);//?
if (userIsValid($_POST['user_clean'], $_POST['pass_clean'])){    // test if the user credentials are valid
  $_SESSION['username'] = $_POST['user_clean'];                // store the username
}

header('Location: ' . $_SERVER['home.php']);
?>
