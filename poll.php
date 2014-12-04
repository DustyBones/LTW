<?php
include_once('template/header.php');
?>

<?php
include_once('template/nav.php');
include_once('db.php');
include_once('db_polls.php');
if(!getPollByID(htmlspecialchars($_GET['id']))) {
  echo '<p>Poll with id ' . $_GET["id"] . ' not found!</p>';
}else{

}
?>

<?php
include_once('template/footer.php');
?>
