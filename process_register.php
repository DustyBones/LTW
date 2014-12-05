<?
include_once('input.php');
require_once('lib/password.php');

session_start();

$db = new PDO('sqlite:database/poll.db');
$stmt = $db->prepare('SELECT * FROM users WHERE username = ?');
$stmt->execute(array(cleanInput($_POST['username'])));

if($stmt->fetch()){
  header( "refresh: 2; url=register.php" );
  echo 'Registration failed. Username is not available, please change the details provided and try again.';
}else{
  if($_POST['password1']==$_POST['password2']){
    $stmt = $db->prepare('INSERT INTO users VALUES (?, ?)');
    $stmt->execute(array(cleanInput($_POST['username']), password_hash($_POST['password1'], PASSWORD_DEFAULT)));
    header( "refresh: 2; url=home.php" );
    echo 'Registration complete. Logging you in...';
  }else{
    header( "refresh: 2; url=register.php" );
    echo 'Registration failed. Please make sure the passwords provided match and try again.';
  }
}

?>
