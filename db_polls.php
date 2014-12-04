<?php

function addPoll($name, $author, $public, $image, $question, $answer) {
  global $db;
  //add poll
  $stmt = $db->prepare('INSERT INTO polls VALUES (?, ?, ?, ?)');
  $stmt->execute(array($name, $author, $public, $image));
  //add questions
  $stmt = $db->prepare('SELECT ID FROM polls WHERE name = ?');
  $stmt = $db->execute($name);
  $pollID = $stmt->fetch();
  $stmt = $db->prepare('INSERT INTO questions VALUES (?, ?)');
  $stmt = $db->execute(array($pollID, $question));
  //add answers
  $stmt = $db->prepare('SELECT ID FROM questions WHERE pollID = ?');
  $stmt = $db->execute($pollID);
  $questionID = $stmt->fetch();
  $stmt = $db->prepare('INSERT INTO answers VALUES (?, ?)');
  $stmt = $db->execute(array($questionID, $answer));

  return true;
}

function removePoll($pollID) {
  global $db;

  $stmt = $db->prepare('SELECT ID FROM questions WHERE pollID = ?');
  $stmt = $db->execute($pollID);
  $questionID = $stmt->fetch();
  //remove votes
  $stmt = $db->prepare('DELETE FROM votes WHERE questionID = ?');
  $stmt = $db->execute($questionID);
  //remove answers
  $stmt = $db->prepare('DELETE FROM answers WHERE questionID = ?');
  $stmt = $db->execute($questionID);
  //remove questions
  $stmt = $db->prepare('DELETE FROM questions WHERE pollID = ?');
  $stmt = $db->execute($pollID);
  //remove poll
  $stmt = $db->prepare('DELETE FROM polls WHERE id = ?');
  $stmt->execute($pollID);

  return true;
}

function votePoll($pollID, $questionID, $answerID) {
  global $db;

  $stmt = $db->prepare('INSERT INTO votes VALUES (?, ?, ?)');
  $stmt->execute(array($pollID, $questionID, $answerID));

  $stmt = $db->prepare('UPDATE answers SET count = count+1 WHERE id = ? ');
  $stmt->execute($answerID);
}

function getPolls() {
  global $db;

  $stmt = $db->prepare("SELECT * FROM polls WHERE public = 'true'");
  $stmt->execute();

  return $stmt->fetchAll();
}

function getPollsByName($name) {
  global $db;

  $stmt = $db->prepare("SELECT * FROM polls WHERE name LIKE '%?%' AND public = 'true'");
  $stmt->execute($name);

  return $stmt->fetchAll();
}

function getPollByID($id) {
  global $db;

  $stmt = $db->prepare('SELECT * FROM polls WHERE id = ?');
  $stmt->execute($id);

  return $stmt->fetch();
}

function getPollByAuthor($author) {
  global $db;

  $stmt = $db->prepare('SELECT * FROM polls WHERE author = ?');
  $stmt->execute($author);

  return $stmt->fetchAll();
}

?>
