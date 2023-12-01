<?php 
session_start();
session_unset();
session_destroy();
echo "<script>alert(you are logout now!)</script>";

header('location:user.php');




?>