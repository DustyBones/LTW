<?
session_start();

$db = new PDO('sqlite:database/poll.db');
$stmt = $db->prepare('SELECT * FROM users WHERE username = ?');
$stmt->execute(array(cleanInput($_POST['username'])));
