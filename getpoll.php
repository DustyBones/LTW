<?
include_once('input.php');

$db = new PDO('sqlite:database/poll.db');
$stmt = $db->prepare("SELECT * FROM polls WHERE name LIKE ? AND public = 'true'");
$stmt->execute(array('%'.cleanInput($_GET['q']).'%'));
$str="";
while($results = $stmt->fetch()){
  $str = '<br><a id=result'.$results['ID'].' href=poll.php?id='.$results['ID'].'>'.$results['name'].'</a>';

  echo $str;
}
if($str===""){
  echo 'Could not find any poll named '.$_GET['q'];
}
?>
