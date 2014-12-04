<?php
include_once('db.php');
include_once('db_polls.php');

$resultls = getPollsByName($_GET['q']);
if(count($results)==0){
  echo "<br>Could not find any poll named $_GET['q']";
}else{
  foreach($results as $r){
    echo "<br><a id="result".$r['id'] href="poll.php?id=".$r['id']> $r['name'] </a><br>";
  }
}
?>
