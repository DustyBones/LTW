<?php
session_start();                                             // starts the session

include_once('database/database.php');                       // connects to the database
include_once('database/user.php');                           // loads the functions responsible for the users table

if (userIsValid($_POST['username'], $_POST['password'])){    // test if the user credentials are valid
  $_SESSION['username'] = $_POST['username'];                // store the username
}

header('Location: home.php']);
?>
