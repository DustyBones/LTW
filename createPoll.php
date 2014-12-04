<?php
include_once('template/header.php');
?>

<?php
include_once('template/nav.php');
?>
<div id="create_poll_form">
  <form action="processCreatePoll.php" method="post">
    <br>Name: <input type="text" name="pollname">
    <br>Availability:
    <input type="radio" name="availability" value="Private">Private
    <input type="radio" name="availability" value="Public">Public
    <br>
    <br>Question: <input type="text" name="question">
    <br>
    <br>Answer 1: <input type="text" name="answer1">
    <br>Answer 2: <input type="text" name="answer2">
    <br>Answer 3: <input type="text" name="answer3">
    <br>
    <br>Image File:
    <br><input type="submit">
  </form>
</div>

<?php
include_once('template/footer.php');
?>
