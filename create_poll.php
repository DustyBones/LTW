<? include_once('template/header.php'); ?>
<script>
$(document).ready(function(){
  $("#btnQ").click(function(){
    $("form").append(
    '<p>Question: <input type="text" name="question"></p>
    <ol>
    <li><input type="text" name="answer1"></li>
    <li><input type="text" name="answer2"></li>
    <li><input type="text" name="answer3"></li>
    <li><input type="text" name="answer4"></li>
    <li><input type="text" name="answer5"></li>
    </ol>');
  });
});
</script>

<? include_once('template/nav.php'); ?>
<div id="create_poll_form">
  <form action="process_create_poll.php" method="post">
    <p>Name: <input type="text" name="pollname"></p>
    <p>Availability:
    <input type="radio" name="availability" value="Private">Private
    <input type="radio" name="availability" value="Public">Public
    </p>
    <p>Question: <input type="text" name="question1"></p>
    <ol>
    <li><input type="text" name="answer1"></li>
    <li><input type="text" name="answer2"></li>
    <li><input type="text" name="answer3"></li>
    <li><input type="text" name="answer4"></li>
    <li><input type="text" name="answer5"></li>
    </ol>
    <p><input class="button" type="submit" value="Create"></p>
  </form>
</div>

<? include_once('template/footer.php'); ?>
