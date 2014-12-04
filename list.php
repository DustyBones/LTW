<?php include_once('template/header.php'); ?>
<?php include_once('template/nav.php'); ?>

<div id=results>
<?php
include_once('db.php');
include_once('db_polls.php');
$resultls = getPolls();
foreach($results as $r){
  echo "<br><a id="result".$r['id'] href="poll.php?id=".$r['id']> $r['name'] </a><br>";
}
?>
</div>

<?php include_once('template/footer.php'); ?>
