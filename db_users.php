<?
include_once('input.php');
include_once('db.php');
require_once('lib/password.php');

function userExists() {
  global $db;

  $stmt = $db->prepare('SELECT * FROM users WHERE username = ?');
  $stmt->execute(array(cleanInput($_POST['username'])));

  return $stmt->fetch() !== false;
}

function userIsValid(){
  global $db;
  $stmt= $db->prepare('SELECT * FROM users WHERE username = ?');
  $stmt->execute(cleanInput($_POST['username']));

  die('here');
  if (($user = $stmt->fetch())){
    return password_verify($_POST['password'], $user['password']);
  } else {
    return false;
  }
}

function userRegister(){
  global $db;
  $password = $_POST['password'];
  if(userExists(cleanInput($_POST['username']))){
    return false;
  }else{
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt->prepare('INSERT INTO users VALUES (?, ?)');
    $stmt->execute(array(cleanInput($_POST['username']), $hash));
    return true;
  }
}
?>
