<? include_once('template/header.php'); ?>
<? include_once('template/nav.php'); ?>

<?
$db = new PDO('sqlite:database/poll.db');
$stmt = $db->prepare('SELECT * FROM polls WHERE ID = ?');
$stmt->execute(array(htmlspecialchars($_GET['id'])));
if(!($results=$stmt->fetch())) {
  echo 'Poll with id ' . htmlspecialchars($_GET['id']) . ' not found!</p>';
}else{
  echo '<div id="poll-details">';
  echo '<form action="vote_poll.php" method="post">';
  echo '<h1>'.$results['name'].'</h1>';
  echo '<h5>by '.$results['author'].'</h5>';
  echo '<br><img src="'.$results['image'].'" alt="img"><br>';

  $stmt1 = $db->prepare('SELECT * FROM questions WHERE pollID = ?');
  $stmt2 = $db->prepare('SELECT * FROM answers WHERE questionID = ?');
  $stmt3 = $db->prepare('SELECT * FROM votes WHERE questionID = ? AND answerID = ?');
  $stmt1->execute(array(htmlspecialchars($_GET['id'])));
  while($questions=$stmt1->fetch()){
    echo '<p id=question'.$questions['ID'].'>'.$questions['question'].'</p><br>';
    $stmt2->execute(array($questions['ID']));
    while($answers=$stmt2->fetch()){
      echo '<input type="radio" name="answer'.$answers['ID'].'" value="'.$answers['ID'].'"';
      $stmt2->execute(array($questions['ID'], $answers['ID']));
      while($votes=$stmt3->fetch()){
        if(isset($_SESSION['username']) && $_SESSION['username']==$votes['username']){
          echo 'checked';
        }
      }
      echo '>'.$answers['answer'].'><br>';
    }
  }
  echo '<br><input class="button" type="submit" value="Vote">';

}
?>

<? include_once('template/footer.php'); ?>
