<?php

//ob_start();//tostart header
session_start();
unset($_SESSION['username']) ;
header("Location:logIn.php?msg=logout");
?>

