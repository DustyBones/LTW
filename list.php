<? include_once('template/header.php'); ?>
<? include_once('template/nav.php'); ?>
<div id="results_list">
  <p>Listagem</p>
  <div id="results">
    <ul>
      <?
      $db = new PDO('sqlite:database/poll.db');
      $stmt = $db->prepare("SELECT * FROM polls WHERE public = 'true'");
      $stmt->execute();
      while($results = $stmt->fetch()){
        echo '<li><a id=result'.$results['ID'].' href=poll.php?id='.$results['ID'].'>'.$results['name'].'</a></li>';
      }
      ?>
    </ul>
  </div>
</div>

<? include_once('template/footer.php'); ?>
