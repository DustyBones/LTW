<?php
function cleanInput($input) {
  $input_clean = trim($input);
  $input_clean = stripslashes($input);
  $input_clean = htmlspecialchars($input);
  return $input_clean;
}
?>
