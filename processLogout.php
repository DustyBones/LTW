<?php
  session_start();
  session_destroy();

  header('Location: ' . $_SERVER['home.php']);
?>
