<?php
  session_start();

  if(!isset($_SESSION['id'])) header('Location: ./index.php?error=4015');
?>