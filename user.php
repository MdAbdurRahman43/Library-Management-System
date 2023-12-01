<?php 
session_start();
include("./db_connection/db_connection.php");
$picture_name="";
$user_email='';
$user_name='';

if (isset($_SESSION['user_email'])) {
    $user_email=$_SESSION['user_email'];
    
    $sql_query="SELECT * FROM user_details WHERE email='$user_email';";
    $result=mysqli_query($con,$sql_query);
    if (mysqli_num_rows($result)>0) {
          $row=mysqli_fetch_assoc($result);
             $picture_name=$row['picture'];
             $user_name=$row['name'];
           // header("Location: http://localhost/library%20management%20systems/all/admin/adminpanel.php");
        //  echo $picture_name;
    }
    else {
      //  echo " <script>alert($picture_name)</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Paragraphia</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="user_style.css" rel="stylesheet">
    <link href="./fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet">
    <script src="./user_script.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <header>
        <div class="head">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark ">
                <!-- Brand -->
                <a class="navbar-brand" href="#"><i class="fas fa-book-open"></i> Paragraphia</a>

                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav mr-auto  text-uppercase  ">
                        <li class="nav-item">
                            <a class="nav-link" href="/library%20management%20systems/all/user2/user.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">about</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">event</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">books</a>
                        </li>
                    </ul>
                        <ul class="navbar-nav ml-auto  text-uppercase">
                            <li class="nav-item">
                        
                                <?php
                                 if (isset($_SESSION['user_email'])) {
                                    
                                   // echo "<img src='./userPhotos/".$picture_name."' >";
                            
                                   echo '<a class="nav-link" href="userpanel.php"> <img height="30px" width="30px" style="border-radius: 50%;" src="./userPhotos/'.$picture_name.'" alt=" "> '.$user_name.'</a>';
                           
                              
                              } 
                            
                                else {
                                   
                                 
                                    echo '<a class="nav-link" href="user_login.php">user login</a>';
                                }
                                ?>
                               
                            </li>
                            <li class="nav-item">
                               
                               
                                 <a class="nav-link"  href="/library%20management%20systems/all/admin/admin_login.php">admin</a>
                             
                                
                            </li>
                        </ul>
                  
                </div>
            </nav>
        </div>
        <div class="h-1">
            <h1>More Than 458,948 Book Over
                <br> Here</h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut gravida, quam vitae est Sed non eros elementum nulla sodales ullamcorper.</p>
            <div class="h-r">
                <div class="circle"></div>
            </div>

            <div class="from">
                <form action="" method="get">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter book name">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </header>
    <main>
        <div class="main-content-1">
            <h1>About Us</h1>
            <div class="h-r">
                <div class="circle"></div>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Ut gravida, quam vitae est Sed non eros elementum nulla sodales ullamcorper.

            </p>

            <div class="grid-container">
                <div class="grid-item1">
                    <div class="h-r-c">
                        <div class="h-r"></div>
                        <div class="h-r"></div>
                        <div class="h-r"></div>
                    </div>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultricies <br> eros pellentesque eros interdum, a efficitur tellus malesuada.Nunc non <br> metus quis elit dictum ultricies. Quisque ultricies
                        <br> aliquam arcu.</p>

                </div>
                <div class="grid-item2">
                    <img height="300px" width="300px" src="./assets/img4.jpg" alt="">
                </div>
                <div class="grid-item3">
                    <div><i class="fas fa-address-card"></i>

                    </div>
                    <h3>Member Card</h3>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Nullam ultricies eros pellentesque</p>
                </div>
                <div class="grid-item4">
                    <div><i class="fas fa-cubes"></i>

                    </div>
                    <h3>High Quality Books</h3>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Nullam ultricies eros pellentesque</p>
                </div>
                <div class="grid-item5">
                    <div><i class="fas fa-book-reader"></i>

                    </div>
                    <h3>Free All Books</h3>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Nullam ultricies eros pellentesque</p>
                </div>
                <div class="grid-item6">
                    <div><i class="fas fa-book"></i>

                    </div>
                    <h3>Up To Date Books</h3>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Nullam ultricies eros pellentesque</p>
                </div>

            </div>
        </div>
        <div class="main-content-1" style="background-color: rgb(255, 255, 255);">
            <h1>Our <span style="color: rgb(46, 43, 43,0.8);">Catagory</span></h1>
            <div class="h-r">
                <div class="circle"></div>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Ut gravida, quam vitae est Sed non eros elementum nulla sodales ullamcorper.

            </p>
            <div class="card-container">
                <div class="card1">
                    <div class="rectan-container">
                        <div class="rectan">

                        </div>
                        <i class="fas fa-music"></i>
                    </div>
                    <div class="hr-container">
                        <div class="border-left">

                        </div>
                        <div class="h-r">

                        </div>

                    </div>
                    <div class="button">
                        <a href="">Music & Art</a>
                    </div>
                </div>
                <div class="card1">
                    <div class="rectan-container">
                        <div style=" background-color: #8a1d60;
                        box-shadow: 2px 2px 2px #8a1d60;" class="rectan">

                        </div>
                        <i class="fas fa-funnel-dollar"></i>
                    </div>
                    <div class="hr-container">
                        <div class="border-left">

                        </div>
                        <div class="h-r">

                        </div>

                    </div>
                    <div class="button">
                        <a href="">Marketing</a>
                    </div>
                </div>
                <div class="card1">
                    <div class="rectan-container">
                        <div style=" background-color: #888a1d;
                        box-shadow: 2px 2px 2px #888a1d;" class="rectan">

                        </div>
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="hr-container">
                        <div class="border-left">

                        </div>
                        <div class="h-r">

                        </div>

                    </div>
                    <div class="button">
                        <a href="">Poltic</a>
                    </div>
                </div>
                <div class="card1">
                    <div class="rectan-container">
                        <div style=" background-color: #1d8a41;
                        box-shadow: 2px 2px 2px #1d8a41;" class="rectan">

                        </div>
                        <i class="fas fa-atlas"></i>
                    </div>
                    <div class="hr-container">
                        <div class="border-left">

                        </div>
                        <div class="h-r">

                        </div>

                    </div>
                    <div class="button">
                        <a href="">Geography</a>
                    </div>
                </div>
            </div>
            <div style=" display: flex; justify-content: center; margin-bottom: 50px;"><button type="button" class="btn btn-outline-primary">See More</button></div>
        </div>
        <div class="main-content-1" style="background-color: rgb(255, 255, 255);">
            <h1>Most <span style="color: rgb(46, 43, 43,0.8);">Popular</span></h1>
            <div class="h-r">
                <div class="circle"></div>
            </div>
            <div class="card-container">

                <div style="border-radius: 0px; height: 350px; width: 270px;" class="card1">
                    <img height="80%" width="100%" style="margin-bottom: 5px;" src="./assets/book1.jpg" alt="">
                    <h6 style="color: rgb(71, 39, 39); margin-left: 5px;">THE ROAD</h6>
                    <h6 style="margin-left: 5px; color: rgb(7, 58, 49);">BY CORMAC MCCARTHY</h6>
                </div>
                <div style="border-radius: 0px; height: 350px; width: 270px;" class="card1">
                    <img height="80%" width="100%" style="margin-bottom: 5px;" src="./assets/book1.jpg" alt="">
                    <h6 style="color: rgb(71, 39, 39); margin-left: 5px;">THE ROAD</h6>
                    <h6 style="margin-left: 5px; color: rgb(7, 58, 49);">BY CORMAC MCCARTHY</h6>
                </div>
                <div style="border-radius: 0px; height: 350px; width: 270px;" class="card1">
                    <img height="80%" width="100%" style="margin-bottom: 5px;" src="./assets/book1.jpg" alt="">
                    <h6 style="color: rgb(71, 39, 39); margin-left: 5px;">THE ROAD</h6>
                    <h6 style="margin-left: 5px; color: rgb(7, 58, 49);">BY CORMAC MCCARTHY</h6>
                </div>
                <div style="border-radius: 0px; height: 350px; width: 270px; margin-bottom: 30px;" class="card1">
                    <img height="80%" width="100%" style="margin-bottom: 5px;" src="./assets/book1.jpg" alt="">
                    <h6 style="color: rgb(71, 39, 39); margin-left: 5px;">THE ROAD</h6>
                    <h6 style="margin-left: 5px; color: rgb(7, 58, 49);">BY CORMAC MCCARTHY</h6>
                </div>



            </div>


        </div>
        <div style=" display: flex; justify-content: center; margin-bottom: 50px;"><button type="button" class="btn btn-outline-primary">See More</button></div>
        <div class="main-content-1">
            <h1>Events</h1>
            <div class="h-r">
                <div class="circle"></div>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Ut gravida, quam vitae est Sed non eros elementum nulla sodales ullamcorper.

            </p>
            <div class="card-container">
                <div style=" width: 25%; height: 300px;">
                    <img height="100%" width="100%" src="./assets/seminar.jpg" alt="">
                </div>
                <div style=" width: 55%; height: 500px;">
                    <div class="card-container" style="padding: 0;">
                        <div style="border-radius: 7px; height: 150px; width: 100%; margin-bottom: 50px; display: flex;" class="card1 box-shadow" id="card-id" onmousemove="shadow_card()">
                            <div style=" width: 15%; height: 70%; margin:auto 10px auto 10px;">
                                <img height="100%" width="100%" src="./assets/even-1.jpg" alt="">
                            </div>
                            <div style=" width: 75%; height: 90%; margin:auto 10px auto 10px;">
                                <a style="display: block; text-decoration: none; font-size: 1.3em;" href="">Tuesday Networking & Lecture
                                </a>
                                <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut gravida, quam vitae est Sed non eros elementum nulla sodales ullamcorper.</h6>
                            </div>
                        </div>
                        <div style="border-radius: 7px; height: 150px; width: 100%; margin-bottom: 50px; display: flex;" class="card1">
                            <div style=" width: 15%; height: 70%; margin:auto 10px auto 10px;">
                                <img height="100%" width="100%" src="./assets/event-2.jpg" alt="">
                            </div>
                            <div style=" width: 75%; height: 90%; margin:auto 10px auto 10px;">
                                <a style="display: block; text-decoration: none; font-size: 1.3em;" href="">Tuesday Networking & Lecture
                                </a>
                                <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut gravida, quam vitae est Sed non eros elementum nulla sodales ullamcorper.</h6>
                            </div>
                        </div>

                        <button style="margin-left: auto;" type="button" class="btn btn-outline-primary">View More</button>

                    </div>
                </div>
            </div>
            <div class="main-content-1" style="background-color: rgb(6, 9, 41); padding-top: 0;">
                <div class="card-container">
                    <h2 style="margin-right: auto;">Lets Take Your Book</h2>
                    <hr>
                </div>

            </div>

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