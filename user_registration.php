<?php 

include('./db_connection/db_connection.php');


?>


<?php 
$file_name="";
$email=$phone=$name=$dofb=$radio=$address=$city=$zipcode=$picture=$password=$cpassword="";
$emailerror=$phoneerror=$nameerror=$dofberror=$radioerror=$addresserror=$cityerror=$zipcodeerror=$pictureerror=$passworderror=$cpassworderror="";
$vali_code=1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {




//email
  if (empty($_POST["email"])) {
    $emailerror = "Email is required";
    $vali_code=0;
  } else {
    $email= test_input($_POST["email"]);
   
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailerror = "Invalid email format";
      $vali_code=0;
    }
   // echo $email;
  }
//phone
  if (empty($_POST["phone"])) {
    $phoneerror = "Phone is required";
    $vali_code=0;
  } else {
    $phone = test_input($_POST["phone"]);
     
    if(!preg_match('/[0-9]{11}$/',$phone)) {
       $phoneerror='the phone number is Invalid!';
       $vali_code=0;
    }
  }
//name
if (empty($_POST["name"])) {
$nameerror = "name is required";
$vali_code=0;
} else {
  $name = test_input($_POST["name"]);
   
  if(!preg_match('/(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,50}$/',$name)) {
      $nameerror='the name does not meet the requirements!';
      $vali_code=0;
  }
}

//dof
if (empty($_POST["dofb"])) {
  $dofberror = "Birth date is required";
  $vali_code=0;
  } else {
    $dofb = test_input($_POST["dofb"]);
     
    if(!preg_match('/[0-9!@#$%]{6,12}$/',$dofb)) {
      // $dofberror='Invaild !';
    }
  // echo $dofb;
 // echo date_format($dofb,"m/d/Y"," ");
  
  }

  //radio

 
  if (!isset(($_POST["optradio"]))) {
    $radioerror = "Field is required";
    $vali_code=0;
    } else {
      $radio = test_input($_POST["optradio"]);
       
    //  if(!preg_match('/[0-9!@#$%]{6,12}$/',$dofb)) {
        // $dofberror='Invaild !';
     // }
    // echo $dofb;
   // echo date_format($dofb,"m/d/Y"," ");
    //echo $radio;
    }





  //address
  if (empty($_POST["address"])) {
    $addresserror = "Address is required";
    $vali_code=0;
    } else {
      $address = test_input($_POST["address"]);
       
      if(!preg_match('/(?=.*[A-Za-z])[0-9A-Za-z.,;!@#$%]{2,100}$/',$address)) {
          $addresserror='Invaild !';
          $vali_code=0;
      }
    
    }
  //city
  if (empty($_POST["city"])) {
    $cityerror = "City is required";
    $vali_code=0;
    } else {
      $city = test_input($_POST["city"]);
       
      if(!preg_match('/(?=.*[A-Za-z])[0-9A-Za-z.,;!@#$%]{1,100}$/',$city)) {
          $cityerror='Invaild !';
          $vali_code=0;
      }
    
    }
  //zipcode
  if (empty($_POST["zipcode"])) {
   $zipcodeerror= "Zip code is required";
   $vali_code=0;
    } else {
      $zipcode = test_input($_POST["zipcode"]);
       
      if(!preg_match('/[0-9A-Za-z.,;!@#$%]{1,100}$/',$zipcode)) {
          $zipcodeerror='Invaild !';
          $vali_code=0;
      }
    
    }
  //picture













  //password
  if (empty($_POST["password"])) {
    $passworderror = "Password is required";
    $vali_code=0;
  } else {
    $password = test_input($_POST["password"]);
     
    if(!preg_match('/(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z@#$%]{6,12}$/',$password)) {
       $passworderror='the password does not meet the requirements!';
       $vali_code=0;
    }
  }
  //cpassword

  if (empty($_POST["cpassword"])) {
    $cpassworderror = "confirm Password is required";
    $vali_code=0;
  } else {
    $cpassword = test_input($_POST["cpassword"]);
     if ($password!=$cpassword) {
      $cpassworderror='password does not match!';
      $vali_code=0;
     }
    if(!preg_match('/(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z@#$%]{6,12}$/',$cpassword)) {
       $cpassworderror='password does not meet the requirements!';
       $vali_code=0;
    }
  }



















 
  $sql_query="SELECT email FROM `user_details` WHERE email='abc';";
  $result=mysqli_query($con,$sql_query);
  if (mysqli_num_rows($result)>0) {
          
   $emailerror=" This email is already registered ";
   $vali_code=0;
         // header("Location: http://localhost/library%20management%20systems/all/admin/adminpanel.php");
     
  }
  else {
     // $emailErr="The email that you've entered is incorrect.";
    // $emailerror=" ";
  }

 if ($vali_code) {


  if (isset($_FILES['picture'])) {
  
    $files=$_FILES['picture'];
    //print_r($files);
    $file_name=$files['name'];
    $file_size=$files['size'];
    $file_tmp_location=$files['tmp_name'];
    $file_error=$files['error'];
    // allowed only jpg jpeg ping
   // print_r($file_name);
    $f=explode('.',$file_name);
    if (isset($f[1])) {

      $fileExt=strtolower($f[1]);
      $alowedExt=['jpg','jpeg','ping'];
      if (in_array($fileExt,$alowedExt)) {
        if ($file_size<700000 && $vali_code) {
        $dest='userPhotos/'.$file_name;
        move_uploaded_file($file_tmp_location,$dest);
        } else {
        $pictureerror="File size exceeded";
        $vali_code=0;
        
        }
        
    }
    else {
      $pictureerror="File type not supported";
      $vali_code=0;
      
    }
    }
    else {
      $vali_code=0;
    }
  
   


  //catch exception

  
  

 // print_r($f);

}
else {
  $vali_code=0;
  $pictureerror="choose a image";
}
  



 }

 
 if ($vali_code) {
  $sql_query="SELECT * FROM user_details WHERE email='$email';";
  $result=mysqli_query($con,$sql_query);
  if (mysqli_num_rows($result)>0) {
   //$passErr=" ";
   $emailerror="This email already Registered. please login!!!!!";
   $vali_code=0;
  // echo "<script>alert('Your are registered please login !!!!.')</script>";
   //echo "<script>window.open('user_login.php','_self')</script>";
         // header("Location: http://localhost/library%20management%20systems/all/admin/adminpanel.php");
     
  }
  else {
  
     
  }
}





if ($vali_code) {

 $token=bin2hex(random_bytes(15));

  $sql_query="INSERT INTO `user_details` (`user_id`, `email`, `phone`, `name`, `birthdate`, `gender`, `address`, `city`, `zipcode`, `picture`, `password`, `cpassword`, `rdate`, `token`, `status`) VALUES (NULL, '$email', '$phone', '$name', '$dofb', '$radio', '$address', '$city', '$zipcode', '$file_name', '$password', '$cpassword', now(), '$token', 'inactive');";
  $result=mysqli_query($con,$sql_query);
  if ($result) {

$subject="Email activation ";
$body="Hi , $name.click here to active your account http;";
$sender_email="From: rehandudk34@gmail.com";
if (mail($email,$subject,$body,$sender_email)) {
  $_SESSION['msg']="check your email to active your account $email";
  echo " <script>alert('email sending ')</script>";
} else {
echo " <script>alert('email sending failed')</script>";
}

echo " <script>alert('Registered succcessfully')</script>";
echo " <script>window.open('user_login.php','_self')</script>";

   //echo " <script>alert('registered successfully')</script>";

         // header("Location: http://localhost/library%20management%20systems/all/admin/adminpanel.php");
     
  }
  else {
    //echo " <script>alert('Filled all the fields')</script>";
  }
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    form{
        margin:70px auto 70px auto;
   
       max-width:800px;
     box-shadow: 3px 5px 4px gray;
        padding:20px 20px 200px 20px;
    }
    span{
        color: red;
    }
   h1{
       text-align: center;
       color: green;
   }
   p{
     color:red;
   }
textarea{
  resize: none;
}
.login-p{
  padding-top: 10px;
  color: green;
}
    </style>
   
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
 <h1>Register With Us !</h1>
  <div class="form-group">
    <label for="email">Email address:<span> *</span></label>
    <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter email">
    <p id="emailhint"><?php echo $emailerror; ?></p>
  </div>
  <div class="form-group">
    <label for="email">Phone:<span> *</span></label>
    <input type="text" name="phone" id="phone"  class="form-control" value="<?php echo $phone; ?>"  placeholder="Enter phone number">
    <p id="phonehint"><?php echo $phoneerror; ?></p>
  </div>
  <div class="form-group">
    <label for="email">Full Name:<span> *</span></label>
    <input type="text" name="name" id="name"  class="form-control" value="<?php echo $name; ?>"  placeholder="Eneter your name">
   <p id="namehint"><?php echo $nameerror; ?></p>
  </div>
  <div class="form-group">
    <label for="email">Date of Birth:<span> *</span></label>
    <input type="date" name="dofb" id="dofb" data-date-format="DD MMMM YYYY" value="<?php echo $dofb; ?>"
         class="form-control">
    <p id="dofbhint"><?php echo $dofberror; ?></p>
  </div>

  <div class="form-check-inline">
  <label class="form-check-label">
    Gender:<span> *  &nbsp; </span>
    
  </label>
  
  <label class="form-check-label">
    <input type="radio" id="radio"  class="form-check-input" name="optradio" value="male">Male
  </label>
</div>
<div class="form-check-inline">
   
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="optradio" value="female">Female
  </label>
</div>
<div class="form-check-inline disabled">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="optradio" value="others">Others
  </label>
 
</div>
<p id="genderhint"><?php echo $radioerror; ?></p>
  <div class="form-group">
    <label for="email">Addres:<span> *</span></label>

    <input name="address" id="address"  class="form-control" value=" <?php echo $address; ?> "  placeholder="Eneter your Address">
   
  </input>
    <p id="addresshint"><?php echo $addresserror; ?></p>
  </div>
  <div class="form-group">
    <label for="email">City:<span> *</span></label>
    <input type="text" name="city" id="city" value="<?php echo $city; ?>"  class="form-control" placeholder="Eneter your city">
    <p id="cityhint"><?php echo $cityerror; ?></p>
  </div>
  <div class="form-group">
    <label for="email">Zip Code:<span> *</span></label>
    <input type="text" name="zipcode" id="zipcode" value="<?php echo $zipcode; ?>"  class="form-control" placeholder="Eneter your Zip code">
    <p id="ziphint"><?php echo $zipcodeerror; ?></p>
  </div>
  <div class="form-group">
    <label for="email">Your Picture: <span>*</span></label>
    <input type="file" name="picture" id="picyure" class="form-control-file">
    <p id="picturehint"><?php echo $pictureerror; ?></p>
  </div>
  <div class="form-group">
    <label for="pwd">Password:<span> *</span></label>
    <input type="password" name="password" id="password" value="<?php echo $password; ?>"  class="form-control" placeholder="password">
    <p id="passwordhint"><?php echo $passworderror; ?></p>
  </div>
  <div class="form-group">
    <label for="pwd">Confirm Password:<span> *</span></label>
    <input type="password" name="cpassword" id="cpassword" value="<?php echo $cpassword; ?>"  class="form-control" placeholder="Confirm password">
    <p id="cpasswordhint"><?php echo $cpassworderror; ?></p>
  </div>
  <input type="submit" name="submit" class="btn btn-primary">
 <p class="login-p">
 If you already registered. please <a href="user_login.php">Login</a>

  </p>
</form>
</body>
</html>






