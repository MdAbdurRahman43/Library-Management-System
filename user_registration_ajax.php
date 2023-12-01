<?php 

if (isset($_GET['id'])&&$_GET['id']=='email') {
    if (($_GET['value'])=="") {
        echo "Email is required";
      } 
      else {
        $admin_email= $_GET['value'];
       
        if (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
          echo "Invalid email format";
        }
      }
}


?>