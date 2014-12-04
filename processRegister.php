<?php
session_start();     
include_once('database/database.php');                       // connects to the database
include_once('database/user.php');                           // loads the functions responsible for the users table


if($_POST['password1']==$_POST['password2']){
  if (userRegister($_POST['username'], $_POST['password'])){  // if registration was successful
    header('Location: home.php']);
    echo 'Registration complete. Logging you in...';
  }else{
    header('Location: register.php']);
    echo 'Registration failed. Please check the details provided and try again.';
  }
}else{
  header( "refresh: 5; url=register.php" );
  echo 'Registration failed. Please check the details provided and try again.';
}

?>
