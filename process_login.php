<?
include_once('input.php');
require_once('lib/password.php');

session_start();

$db = new PDO('sqlite:database/poll.db');
$stmt = $db->prepare('SELECT * FROM users WHERE username = ?');
$stmt->execute(array(cleanInput($_POST['username'])));

if (($user = $stmt->fetch())){
  if(password_verify($_POST['password'], $user['password'])){
    header( "refresh: 1; url=home.php" );
    $_SESSION['username'] = $_POST['username'];
    echo 'Logging you in...';
  } else {
    header( "refresh: 1; url=login.php" );
    echo 'Login failed. Please check the password provided and try again.';
  }
} else {
  header( "refresh: 1; url=login.php" );
  echo 'Login failed. Please check the details provided and try again.';
}

?>
