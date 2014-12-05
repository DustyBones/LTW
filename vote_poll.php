<?
$db = new PDO('sqlite:database/poll.db');
$stmt = $db->prepare('UPDATE answers SET count = count + 1 WHERE ID = ?');
$stmt->execute(array($_POST['value']));
if(isset($_SESSION['username'])){
  $user=$_SESSION['username'];
}else{
  $user='guest';
}
$stmt = $db->prepare('INSERT INTO votes VALUES (?,?)');
$stmt->execute(array( $user, $_POST['value']));
header("Location: ".$_SESSION['return']);
?>
