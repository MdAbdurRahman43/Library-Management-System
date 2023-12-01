<?php 

include('./db_connection/db_connection.php');
session_start();
$_SESSION['user_email']='';

?>


<?php 
$admin_password='';
$admin_email='';
$passErr = $emailErr ="";
$valid_code=1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["admin_email"])) {
    $emailErr = "Email is required";
    $valid_code=0;
  } else {
    $admin_email= test_input($_POST["admin_email"]);
   
    if (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $valid_code=0;
    }
  }

  if (empty($_POST["admin_password"])) {
    $passErr = "Password is required";
    $valid_code=0;
  } else {
    $admin_password = test_input($_POST["admin_password"]);
     
    if(!preg_match('/(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z@#$%]{6,12}$/',$admin_password)) {
        $passErr='the password does not meet the requirements!';
        $valid_code=0;
    }
  }
  if ($valid_code) {
    $sql_query="SELECT * FROM user_details WHERE email='$admin_email';";
    $result=mysqli_query($con,$sql_query);
    if (mysqli_num_rows($result)>0) {
            
      $emailErr=" ";
           // header("Location: http://localhost/library%20management%20systems/all/admin/adminpanel.php");
       
    }
    else {
        $emailErr="The email that you've entered is incorrect.";
        $valid_code=0;
    }




  }
if ($valid_code) {
    $sql_query="SELECT * FROM user_details WHERE cpassword='$admin_password';";
    $result=mysqli_query($con,$sql_query);
    if (mysqli_num_rows($result)>0) {
     $passErr=" ";
             
           // header("Location: http://localhost/library%20management%20systems/all/admin/adminpanel.php");
       
    }
    else {
        $passErr="The password that you've entered is incorrect.";
        $valid_code=0;
    }
}
if ($valid_code) {
    $sql_query="SELECT * FROM user_details WHERE status='active';";
    $result=mysqli_query($con,$sql_query);
    if (mysqli_num_rows($result)>0) {
     //$passErr=" ";
             
           // header("Location: http://localhost/library%20management%20systems/all/admin/adminpanel.php");
       
    }
    else {
        $passErr="Your account is inactive!.";
        $valid_code=0;
    }
}
  
if ($valid_code) {
    $sql_query="SELECT * FROM user_details WHERE email='$admin_email' AND cpassword='$admin_password';";
    $result=mysqli_query($con,$sql_query);
    if (mysqli_num_rows($result)>0) {
  
    if (isset($_POST['remember_me'])) {
      setcookie('email_cookie', $admin_email, time() + (86400), "/"); 
      $pass_cookie = 'pass_cookie';
      $admin_ps = $admin_password;
      setcookie('password_cookie', $admin_password, time() + (86400), "/"); 
    }
             $_SESSION['user_email']=$admin_email;
            // echo $_SESSION['user_email'];
            header("Location: user.php");
       
    }
    else {
        
    }
}
else {
    //echo "<script>alert('something is wrong!!')</script>";
}
 


 
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }



 


  
 
  
   //echo " <script>window.open('http://localhost/library%20management%20systems/all/admin/adminpanel.php','_self');</script>";
   
       //echo " <script>window.location.replace('http://localhost/library%20management%20systems/all/admin/adminpanel.php');</script>";
     //exit;
  








?>










<!DOCTYPE html>
<html lang="en">

<head>
    <title>Paragraphia</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="user_style.css" rel="stylesheet">
    <link href="./fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
main{
    margin: 200px 500px 200px 500px;
    padding: 20px 20px 0px 20px;
    border: 2px solid gray;

}
h4{
    text-align: center;
    font-weight: bold;
    color: blue;
}
button{
    margin-left: auto;
}
.forget_pass{
    text-align: center;
    color: blue;
    margin: 20px 0px 5px 0px;
}

    </style>
</head>


<body>
    <header>
       
    
    </header>
   <main>
   <h4>Member Login</h4>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" name="admin_email" class="form-control" placeholder="Enter email" id="email" value="<?php if (isset($_COOKIE['email_cookie'])) {echo $_COOKIE['email_cookie'];}else {echo ' ';}?>" >
  </div>
  <p style="color: red;"><?php echo $emailErr; ?></p>
    <label for="pwd">Password:</label>
    <input type="password" name="admin_password" class="form-control" placeholder="Enter password" id="pwd" value="<?php if (isset($_COOKIE['password_cookie'])) {echo $_COOKIE['password_cookie'];}else {echo ' ';}?>">
  </div>
  <p style="color: red;"><?php echo $passErr; ?></p>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" name="remember_me" type="checkbox"> Remember me
    </label>
  </div>
  <button  type="submit" name="submit" class="btn btn-primary">Login</button>
  <p class="forget_pass">forgot your password ? <a href="">click here</a></p>
  <p class="forget_pass">If you not registered ? <a href="user_registration.php">click here</a></p>
</form>
   </main>
       
    <footer>

    </footer>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php 



/*if (isset($_POST['submit'])) {
   
  }
*/
//

?>
<?php //if (isset($_COOKIE['email_cookie'])) {echo $_COOKIE['email_cookie'];}else {echo " ";}?>

