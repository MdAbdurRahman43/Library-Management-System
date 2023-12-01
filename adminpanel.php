
<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
    <link rel="stylesheet" href="styleadmin.css">
    <link rel="stylesheet" href="./assets/fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<header>
<div class="head">
<h5>admin</h5>
<!--<div class="toggler-2">

       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-sliders-h"></i>
  </button>-->
       </div>

</div>
</header>
<main>
    <div class="flex_container">
        <div class="nav_section">
     
            <div class="admin_design">
                <img height="50" width="50" src="./assets/images.png" alt="admin">
                <span style="font-weight: bold;"><a style="text-decoration: none; color:white; padding-left:10px;" href="">admin</a> </span><span><img height="10" width="10" src="./assets/active.png" alt=""></span><span> online</span>
               
            </div>
            <h5> header</h5> 
            
        <ul class="nav flex-column">
  <li class="nav-item">
  
    <a class="nav-link" href="adminpanel.php?id=dashboard">
    <i class="fas fa-tachometer-alt"></i>
  
    Dashboard</a>
  </li>
  <li class="nav-item">
  
    <a class="nav-link" href="adminpanel.php?id=users">
    <i class="fas fa-users"></i>
    Members
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="adminpanel.php?id=books">
    <i class="fas fa-book"></i>  
    Books</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="adminpanel.php?id=magazines">
    <i class="far fa-file-word"></i>  
    Magazines</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="adminpanel.php?id=newspapers">
    <i class="fas fa-newspaper"></i>  
    Newspapers</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="adminpanel.php?id=issued">
    <i class="fas fa-plane"></i>
    Issued</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="adminpanel.php?id=returned">
    <i class="fas fa-thumbs-up"></i>  
    Returned</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="adminpanel.php?id=not_returned">
    <i class="fas fa-thumbs-down"></i>  
    Not Returned</a>
  </li>
  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         
        <i class="fas fa-cogs"></i>  
        Action
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item nav-link" href="admin_login.php">Sign Out</a>
        </div>
      </li>
</ul>
         
        </div>
        <div class="content_section">
      <div class="content_section_head">
        <p>    <i style="padding: 0 5px 0 5px;" class="fas fa-tachometer-alt"></i>admin > dashboard</p>
      </div>





























     
<?php 

if (isset($_GET['id'])) {
  $dashboard=$_GET['id'];
 if ($dashboard=='dashboard') {
  include('./functions/contetnt_section_include.php');
 }
 if ($dashboard=='users') {
  include('./functions/user_section_include.php');
 }
 if ($dashboard=='books') {
  include('./functions/books_section_include.php');
 }
 if ($dashboard=='magazines') {
  include('./functions/magazines_section_include.php');
 }
 if ($dashboard=='newspapers') {
  include('./functions/newspapers_section_include.php');
 }
 if ($dashboard=='issued') {
  include('./functions/issued_section_inlude.php');
 }
 if ($dashboard=='returned') {
  include('./functions/returned_section_include.php');
 }
 if ($dashboard=='not_returned') {
  include('./functions/not_returned_section_include.php');
 }

}
else {
  include('./functions/contetnt_section_include.php');
}


?>
   

        </div>
    </div>
</main>
<footer>

</footer>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>