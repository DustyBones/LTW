<? include_once('template/header.php'); ?>
<? include_once('template/nav.php'); ?>

<?
$db = new PDO('sqlite:database/poll.db');
$stmt = $db->prepare('SELECT * FROM polls WHERE ID = ?');
$stmt->execute(array(htmlspecialchars($_GET['id'])));
if(!($results=$stmt->fetch())) {
  echo 'Poll with id ' . htmlspecialchars($_GET['id']) . ' not found!</p>';
}else{
  //$_SESSION['return']=htmlspecialchars($_SERVER["PHP_SELF"]);
  echo '<div id="poll-details">';
  echo '<form action="vote_poll.php" method="post">';
  echo '<h1>'.$results['name'].'</h1>';
  echo '<h4>by '.$results['author'].'</h4>';
  echo '<br><img src="'.$results['image'].'" alt="img"><br>';

  $stmt1 = $db->prepare('SELECT * FROM questions WHERE pollID = ?');
  $stmt1->execute(array(htmlspecialchars($_GET['id'])));
  while($questions=$stmt1->fetch()){
    echo '<p id=question'.$questions['ID'].'>'.$questions['question'].'</p><br>';

    $stmt2 = $db->prepare('SELECT * FROM answers WHERE questionID = ?');
    $stmt2->execute(array($questions['ID']));
    while($answers=$stmt2->fetch()){
      echo '<input type="radio" name="answer" value="'.$answers['ID'].'"';

      $stmt3 = $db->prepare('SELECT * FROM votes WHERE answerID = ?');
      $stmt3->execute(array($answers['ID']));
      while($votes=$stmt3->fetch()){
        if(isset($_SESSION['username']) && $_SESSION['username']==$votes['username']){
          echo 'checked';
          $voted='true';
        }else{
          $voted='false';
        }
      }
      echo '>'.$answers['answer'].'<br>';
    }
  }
  if($voted){
    echo '<br><input class="button" value="Results">';
  }else{
    echo '<br><input class="button" type="submit" value="Vote">';
  }
  echo '</form>';
  echo '</div>';
}
?>

<? include_once('template/footer.php'); ?>
