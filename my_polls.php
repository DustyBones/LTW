<? include_once('template/header.php'); ?>
<? include_once('template/nav.php'); ?>

<div id=results>
  <?
  $db = new PDO('sqlite:database/poll.db');
  $stmt = $db->prepare("SELECT * FROM polls WHERE author = ?");
  $stmt->execute(array($_SESSION['username']));
  $str="";
  while($results = $stmt->fetch()){
    $str = '<br><a id=result'.$results['ID'].' href=poll.php?id='.$results['ID'].'>'.$results['name'].'</a>';
    echo $str;
  }
  if($str===""){
    echo 'You did not create any polls.';
  }
  ?>
</div>

<? include_once('template/footer.php'); ?>
