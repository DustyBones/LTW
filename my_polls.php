<? include_once('template/header.php'); ?>
<? include_once('template/nav.php'); ?>

<div id=results>
  <?php
  include_once('db.php');
  include_once('db_polls.php');
  $resultls = getPollByID($_SESSION['username']);
  if(count($results)==0){
    echo '<br>You don\'t have any polls.';
  }else{
    foreach($results as $r){
      echo "<br><a id='result'.$r['id'] href='poll.php?id='.$r['id']> $r['name'] </a><br>";
    }
  }
  ?>
</div>

<? include_once('template/footer.php'); ?>
