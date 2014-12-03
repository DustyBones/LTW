<?php
include_once('template/header.php');
?>

<?php
include_once('template/nav.php');
?>

<div id="register_form">
  <form action="register.php" method="post">
    <br>Username: <input type="text" name="username">
    <br>Password: <input type="text" name="password1">
    <br>Confirm Password: <input type="text" name="password2">
    <br>
    <br><input type="submit">
  </form>
</div>

<?php
include_once('template/footer.php');
?>
