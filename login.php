<? include_once('template/header.php'); ?>

<? include_once('template/nav.php'); ?>

<? session_start(); ?>

<div id="login_form">
  <form action="process_login.php" method="post">
    <br>Username: <input type="text" name="username" placeholder="Username" autofocus>
    <br>Password: <input type="password" name="password" placeholder="Password">
    <br>
    <br><input class="button" type="submit" value="Log in">
  </form>
</div>

<? include_once('template/footer.php'); ?>
