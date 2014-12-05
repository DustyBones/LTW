<?php
function userExists($username) {
  global $db;

  $stmt = $db->prepare('SELECT * FROM users WHERE username = ?');
  $stmt->execute($username);

  return $stmt->fetch() !== false;
}

function userIsValid($username, $password){
  global $db;

  $stm->prepare('SELECT * FROM users WHERE username = ?');
  $stm->execute($username);
  $user = $stm->fetch();
  if ($user !== false){
    return password_verify($password, $user['password']);
  } else {
    return false;
  }
}

function userRegister($username, $password){
  global $db;
  if(userExists($username)){
    return false;
  }else{
    $stm->prepare('INSERT INTO users VALUES (?, ?)');
    $stm->execute(array($username, password_hash($password, PASSWORD_DEFAULT)));
    return true;
  }
}
?>
