<?php
include_once('template/header.php');
?>

<?php
include_once('template/nav.php');
?>

<div id="login_form">
  <form action="login.php" method="post">
    <br>Username: <input type="text" name="username">
    <br>Password: <input type="text" name="password">
    <br>
    <br><input type="submit">
  </form>
</div>

<?php
include_once('template/footer.php');
?>
