<? include_once('template/header.php'); ?>
<? include_once('template/nav.php'); ?>

<?
$db = new PDO('sqlite:database/poll.db');
$stmt = $db->prepare('SELECT * FROM polls WHERE ID = ?');
$stmt->execute(array(htmlspecialchars($_GET['id'])));
if(!($results=$stmt->fetch())) {
  echo 'Poll with id ' . htmlspecialchars($_GET['id']) . ' not found!</p>';
}else{

}
?>

<? include_once('template/footer.php'); ?>
