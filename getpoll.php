<?php
include_once('db.php');
include_once('db_polls.php');

$resultls = getPollsByName($_GET['q']);
foreach($results as $r){
  echo "<br><a id="result".$r['id'] href="poll.php?id=".$r['id']> $r['name'] </a><br>";
}
?>
