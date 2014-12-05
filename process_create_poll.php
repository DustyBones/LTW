<?
include_once('input.php');

session_start();

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
// Allow certain file formats
if(($imageFileType != "jpg") && ($imageFileType != "png") && ($imageFileType != "jpeg")
&& ($imageFileType != "gif") ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
if(isset($_SESSION['username'])){
  $author = $_SESSION['username'];
}else{
  $author = 'guest';
}
if(!$_POST['availability']){
  $public='true';
}else{
  $public='false';
}
$db = new PDO('sqlite:database/poll.db');
$stmt = $db->prepare('INSERT INTO polls VALUES (?,?,?,?,?)');
$stmt->execute(array(NULL, cleanInput($_POST['pollname']), $author, $public, $target_file));

$stmt = $db->prepare('SELECT * FROM polls WHERE name = ?');
$stmt->execute(array(cleanInput($_POST['pollname'])));
$poll = $stmt->fetch();

$stmt = $db->prepare('INSERT INTO questions VALUES (?,?,?)');
$stmt->execute(array(NULL, cleanInput($_POST['question']), $poll['ID']));

$stmt = $db->prepare('SELECT * FROM questions WHERE question = ?');
$stmt->execute(array(cleanInput($_POST['question'])));
$question = $stmt->fetch();

if(cleanInput($_POST['answer1'])){
  $stmt = $db->prepare('INSERT INTO answers VALUES (?,?,?,?)');
  $stmt->execute(array(NULL, cleanInput($_POST['answer1']), $question['ID'], 0));
}
if(cleanInput($_POST['answer2'])){
  $stmt = $db->prepare('INSERT INTO answers VALUES (?,?,?,?)');
  $stmt->execute(array(NULL, cleanInput($_POST['answer2']), $question['ID'], 0));
}
if(cleanInput($_POST['answer3'])){
  $stmt = $db->prepare('INSERT INTO answers VALUES (?,?,?,?)');
  $stmt->execute(array(NULL, cleanInput($_POST['answer3']), $question['ID'], 0));
}
if(cleanInput($_POST['answer4'])){
  $stmt = $db->prepare('INSERT INTO answers VALUES (?,?,?,?)');
  $stmt->execute(array(NULL, cleanInput($_POST['answer4']), $question['ID'], 0));
}
if(cleanInput($_POST['answer5'])){
  $stmt = $db->prepare('INSERT INTO answers VALUES (?,?,?,?)');
  $stmt->execute(array(NULL, cleanInput($_POST['answer5']), $question['ID'], 0));
}

header( "refresh: 1; url=home.php" );
echo 'Great success!';
?>
