<? include_once('template/header.php'); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#btnA").click(function(){
    $("p").append(" ");
  });

  $("#btnQ").click(function(){
    $("ol").append(
    '<br>Question: <input type="text" name="question">
    <br>
    <br>Answer 1: <input type="text" name="answer1">
    <br>Answer 2: <input type="text" name="answer2">');
  });
});
</script>

<? include_once('template/nav.php'); ?>
<div id="create_poll_form">
  <form action="process_create_poll.php" method="post">
    <br>Name: <input type="text" name="pollname">
    <br>Availability:
    <input type="radio" name="availability" value="Private">Private
    <input type="radio" name="availability" value="Public">Public
    <br>
    <br>Question: <input type="text" name="question">
    <br>
    <br>Answer 1: <input type="text" name="answer1">
    <br>Answer 2: <input type="text" name="answer2">

    <button id="btn1">Add answer</button>
    <button id="btn2">Add question</button>
    <br>
    <br>Image File:
    <br><input type="submit">
  </form>
</div>

<? include_once('template/footer.php'); ?>
