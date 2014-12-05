<? include_once('template/header.php'); ?>

<? include_once('template/nav.php'); ?>

<? session_start(); ?>

<div id="register_form">
  <form action="process_register.php" method="post">
    <br>Username: <input type="text" name="username">
    <br>Password: <input type="password" name="password1">
    <br>Confirm Password: <input type="password" name="password2">
    <br>
    <br><input class="button" type="submit" value="Register">
  </form>
</div>

<? include_once('template/footer.php'); ?>
