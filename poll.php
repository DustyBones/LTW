<?php
include_once('template/header.php');
?>

<?php
include_once('template/nav.php');
include_once('database/database.php');
include_once('database/poll_management.php')
if(!getPollByID(htmlspecialchars($_GET["id"]))) {
  echo 'Poll with id ' . $_GET["id"] . ' not found!';
}else{

}
?>

<?php
include_once('template/footer.php');
?>
